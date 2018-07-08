app.controller('MediaGroupController', function ($scope, $http, dataService, fn) {
    function list(){
        dataService.postData("/api/v1/media_group").then(res => {
            $scope.lists = res.data.result;
            console.log($scope.lists)
        }).catch(err => {
             fn.alertError(err.statusText)
        })
    }

    $scope.modal = data => {
        if (data) {
            $scope.form = angular.copy(data);
            $scope.formView = angular.copy(data);
        }else{
            $scope.form = {};
        }
        $("#form").modal("show");
    }

    $scope.choose_file = () => {
        $("#cover").click();
    }

    function readFile() {
        if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.addEventListener("load", function(e) {
                $scope.form.cover = e.target.result;
                setTimeout(()=>{
                    $scope.$apply();
                    document.getElementById("cover_preview").src = e.target.result;
                },10)
            }); 
            FR.readAsDataURL( this.files[0] );
        }
    }
    document.getElementById("cover").addEventListener("change", readFile);

    $scope.submit = () => {
        let form = document.forms.namedItem("form");
        let oData = new FormData(form);
        if($scope.form.id){
            oData.append("id",$scope.form.id);
        }
        $.ajax({
            type:'POST',
            url: API_URL + '/api/v1/media_group/add',
            data: oData,
            processData: false,
            contentType: false,
            success: function (res){
                if(res.status){
                    list();
                    fn.alertSuccess();
                    $('#form').modal('hide');
                }else{
                    fn.alertError();
                }
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, err) {
                fn.alertError("Error !",XMLHttpRequest.responseJSON.message);
            }
        });
    }

    $('#form').on('hidden.bs.modal', () => {
        $("#cover").val("");
        $("#cover_preview").attr("src","");
        $scope.form = {};
        // list();
    })

    $scope.delete = id => {
        console.log(id)
        fn.alertDelete("/api/v1/media_group",{id},res => {
            if(res.data.status){
                list();
            }
        })
    }

    $scope.enter = id =>{
        window.location.href = "/media?media_group_id="+id;
    }

    function init() {
        list();
    }

    init();
})