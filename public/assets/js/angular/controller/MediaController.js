app.controller('MediaController', function ($scope, $http, dataService, fn) {
    $scope.media_group = media_group;
    function list(){
        dataService.postData("/api/v1/media",{media_group_id: $scope.media_group.id}).then(res => {
            $scope.lists = res.data.result;
        }).catch(err => {
             fn.alertError(err.statusText)
        })
    }

    $scope.chooseImage = () =>{
        $("#image").click();
    }

    $scope.chooseVideo = () =>{
        $("#video").click();
    }


    var filesInput = document.getElementById("image");
    filesInput.addEventListener("change", function(event){
        $scope.previewImage = [];
        $("#formImage").modal("show");
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                console.log(file)
                //Only pics
                if(!file.type.match('image'))
                    continue;
                let obj = {
                    name:file.name,
                    size:file.size,
                    url:URL.createObjectURL(file)
                }
                $scope.previewImage.push(obj);
            }
            setTimeout(()=>{
                $scope.$apply();
            },100)
        });

    $('#formImage').on('hidden.bs.modal', () => {
        $("#image").val("");
        $scope.previewImage = [];
        console.log($scope.previewImage)
    })


    var filesInputvideo = document.getElementById("video");
    filesInputvideo.addEventListener("change", function(event){
        $scope.previewVideo = [];
        $("#formVideo").modal("show");
            var file = event.target.files[0]; //FileList object
                //Only pics
                let objs = {
                    name:file.name,
                    size:file.size,
                    type:file.type,
                    url:URL.createObjectURL(file)
                }
                $scope.previewVideo.push(objs);
            setTimeout(()=>{
                $scope.$apply();
                $("#videoPreview").load();
            },100)
         });

    $('#formVideo').on('hidden.bs.modal', () => {
        $("#video").val("");
        $scope.previewVideo = [];
    })


    $scope.submit = () => {

        let form = document.forms.namedItem("formImage");
        console.log(form)
        let oData = new FormData(form);
      
        oData.append("media_group_id",$scope.media_group.id);
          console.log(oData)
        oData.append("name",$scope.media_group.name);
        $.ajax({
            type:'POST',
            url: API_URL + '/api/v1/media/addImage',
            data: oData,
            processData: false,
            contentType: false,
            success: function (res){
                if(res.status){
                    list();
                    fn.alertSuccess();
                    $('#formImage').modal('hide');
                }else{
                    fn.alertError();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, err) {
                fn.alertError("Error !",XMLHttpRequest.responseJSON.message);
            }
        });
    }

    $scope.submitvideo = () => {
        var video = document.getElementById('videoPreview');
        var filename = video.src;
        var w = video.videoWidth;
        var h = video.videoHeight;
        var canvas = document.createElement('canvas');
        canvas.width = w;
        canvas.height = h;
        var ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, w, h);
        var cover = canvas.toDataURL("image/jpg");
        let form = document.forms.namedItem("formVideo");
        console.log(form)
        let Data = new FormData(form);
        console.log(Data)
        Data.append("media_group_id",$scope.media_group.id);
        Data.append("name",$scope.media_group.name);
        Data.append("cover", cover);

        $.ajax({
            type:'POST',
            url: API_URL + '/api/v1/media/addVideo',
            data: Data,
            processData: false,
            contentType: false,
            success: function (res){
                if(res.status){
                    list();
                    fn.alertSuccess();
                    $('#formVideo').modal('hide');
                }else{
                    fn.alertError();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, err) {
                fn.alertError("Error !",XMLHttpRequest.responseJSON.message);
            }
        });
    }

    $scope.delete = id =>{
        fn.alertDelete("/api/v1/media",{id:id, media_group_id:$scope.media_group.id},res => {
            if(res.data.status){
                list();
            }
        })
    }

    $scope.viewVideo = function(src){
        $("#video-container").empty();
        let video = $('<video controls style="width: 100%;height: auto;"></video>');
        let source = '<source src="'+src+'" type="video/mp4"><source src="'+src+'" type="video/ogg"><source src="'+src+'" type="video/webm">'
        video.append(source);
        $("#video-container").append(video);
        $("#viewVideo").modal("show");
    }

    function init() {
        list();
    }

init();
})