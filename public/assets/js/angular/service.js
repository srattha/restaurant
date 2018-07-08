app.service('dataService', function ($http) {
	return {
		getData: (url) => {
			return $http.get(API_URL + url);
		},
		postData: (url, jsondata) => {
			let first = true;
			return $http.post(API_URL + url, jsondata).then(response => response, error => {
				if(first){
					console.log("%c    Internal Server Error 500 call again    ",'background: #f44336; color: #fff')
					first = false;
					return $http.post(API_URL + url, jsondata).then(response => { console.log("%c    Call service again Success!!    ",'background: #00e207; color: #fff');return response; });
				}else{
					return error;
				}
			});
		},
		putData: (url, jsondata) => {
			return $http.put(API_URL + url, jsondata);
		},
		deleteData: (url, json) => {
			return $http.post(`${API_URL + url}/delete`,json);
		}
	}
});

app.service('fn', function ($http,$timeout) {
	return {
		datetotext: (date) => {
			const yyyy = date.getFullYear().toString();
			const mm = (date.getMonth() + 1).toString();
			const dd = date.getDate().toString();

			const mmChars = mm.split('');
			const ddChars = dd.split('');

			return `${yyyy}-${mmChars[1] ? mm : "0" + mmChars[0]}-${ddChars[1] ? dd : "0" + ddChars[0]}`;
		},
		randomcolor: () => {
			function c() {
				const hex = Math.floor(Math.random() * 256).toString(16);
				return (`0${String(hex)}`).substr(-2);
			}
			return "#" + c() + c() + c();
		},
		alertSuccess: (title,desc) => {
			alertSuccess(title,desc);
		},
		alertError: (title,desc) => {
			alertError(title,desc);
		},
		alertConfirm: (callback) =>{
			noty({
				text: '<h5><i class="icon-warning2"></i> Are you sure?</h5><p>You will not be able to recover this data!</p>',
				layout: 'center',
				modal: true,
				theme: 'metroui',
				closeWith: ['button'],
				animation: {
					open: 'noti-duration animated zoomIn',
					close: 'noti-duration animated zoomOut',
				},
				buttons: [
				{
					addClass: 'btn bg-cakebox', text: '<i class="icon-checkmark3"></i> Yes', onClick: function($noty) {
						$noty.close();
						callback(true);
					}
				},
				{
					addClass: 'btn bg-cakebox-2', text: '<i class="icon-cross2"></i> No&nbsp;', onClick: function($noty) {
						$noty.close();
						callback(false)
					}
				}
				]
			});
		},
		alertDelete: (url,params,callback) => {
			noty({
				text: '<h5><i class="icon-warning2"></i> Are you sure?</h5><p>You will not be able to recover this data!</p>',
				layout: 'center',
				modal: true,
				theme: 'metroui',
				closeWith: ['button'],
				animation: {
					open: 'noti-duration animated zoomIn',
					close: 'noti-duration animated zoomOut',
				},
				buttons: [
				{
					addClass: 'btn bg-cakebox', text: '<i class="icon-checkmark3"></i> Yes', onClick: function($noty) {
						$noty.close();
						$http.post(`${API_URL + url}/delete`,params).then(response => {
							callback(response);
							alertSuccess();
						}).catch(err => {
							callback(error)
							alertError()
						});
					}
				},
				{
					addClass: 'btn bg-cakebox-2', text: '<i class="icon-cross2"></i> No&nbsp;', onClick: function($noty) {
						$noty.close();
						callback({"data":{"status":false}})
					}
				}
				]
			});
		},
		makePagination:(current_page,last_page)=>{
			const url = "/api/v1/gallery";
			const perpage = 4;
			let page  = [];
			let start = (perpage * (Math.floor((current_page-1)/perpage))) + 1;
			let count = 0;
			console.log(last_page)
			for (start; start <= last_page; start++) {
				page.push({page:start, url:url+"?page="+start})
				count++;
				if(count == perpage + 1){break;}
			}
			return page;
		},
		makeArray:data => {
			let arr = [];
			angular.forEach(data,(val, key) => {
				arr.push(val.id+"");
			})
			return arr;
		},
		makeDataTable:(ele,orderable) => {
			makeDataTable(ele,orderable);
		},
		makePage:(totalItems, currentPage, pageSize) => {
			return GetPager(totalItems, currentPage, pageSize);
		}
	}
})

function alertSuccess(title = "Success !", desc = "Your request has completed."){
	return noty({
		text: `<h5><i class="icon-checkmark3"></i> ${title}</h5><p>${desc}</p>`,
		type: "success",
		timeout: 5000,
		progressBar: true,
		layout: 'bottomRight',
		theme: 'metroui',
		killer: true,
		animation: {
			open: 'noti-duration animated slideInUp',
			close: 'noti-duration animated slideOutRight',
		},
	});
}

function alertError(title = "Error !",desc = "Your request has failed."){
	return noty({
		text: `<h5><i class="icon-cross2"></i> ${title}</h5><p>${desc}</p>`,
		type: "error",
		timeout: 30000,
		progressBar: true,
		layout: 'bottomRight',
		theme: 'metroui',
		killer: true,
		animation: {
			open: 'noti-duration animated slideInUp',
			close: 'noti-duration animated slideOutRight',
		},
	});
}




function randomString(_length = 5) {
	var text = "";
	var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	for (var i = 0; i < _length; i++)
		text += possible.charAt(Math.floor(Math.random() * possible.length));

	return text;
}

function makeDataTable(ele,orderable){
	$(function() {
		// Table setup
		// ------------------------------
		// Setting datatable defaults
		$.extend( $.fn.dataTable.defaults, {
			autoWidth: false,
			responsive:false,
			columnDefs: [
			{
				orderable: false,
				targets: orderable
			}
			],
			order: [[ 0, "asc" ]],
			lengthMenu: [ 15, 30, 50, 100 ],
			displayLength: 15,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			},
			drawCallback: function () {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
			},
			preDrawCallback: function() {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
			}
		});
		// Initialize table
		ele.DataTable();

		// External table additions
		// ------------------------------
		// Lightbox
		$('[data-popup="lightbox"]').fancybox({
			padding: 3
		});
		// Styles checkboxes, radios
		$('.styled').uniform({
			radioClass: 'choice'
		});
		// Add placeholder to the datatable filter option
		$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
		// Enable Select2 select for the length option
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
}


function GetPager(totalItems, currentPage, pageSize) {
	currentPage = currentPage || 1;
	pageSize = pageSize || 10;
	var totalPages = Math.ceil(totalItems / pageSize);
	var startPage, endPage;
	if (totalPages <= 10) {
		startPage = 1;
		endPage = totalPages;
	} else {
		if (currentPage <= 6) {
			startPage = 1;
			endPage = 10;
		} else if (currentPage + 4 >= totalPages) {
			startPage = totalPages - 9;
			endPage = totalPages;
		} else {
			startPage = currentPage - 5;
			endPage = currentPage + 4;
		}
	}
	var startIndex = (currentPage - 1) * pageSize;
	var endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);
	var pages = _.range(startPage, endPage + 1);
	return {
		totalItems: totalItems,
		currentPage: currentPage,
		pageSize: pageSize,
		totalPages: totalPages,
		startPage: startPage,
		endPage: endPage,
		startIndex: startIndex,
		endIndex: endIndex,
		pages: pages
	};
}

app.filter('convertToDate', function () {
	return (str) => {
		return new Date(str);
	};
})

app.filter('viewURL', function ($sce) {
	return (url) => {
		return $sce.trustAsResourceUrl(url);
	};
});

app.filter('noCache', function ($sce) {
	return (url) => {
		return $sce.trustAsResourceUrl(url + "?r=" + Math.floor((Math.random() * 999) + 1));
	};
});

app.filter('to_trusted', ['$sce', function($sce){
	return (text) => {
		return $sce.trustAsHtml(text);
	};
}]);

app.filter('htmlToPlaintext', function() {
	return (text) => {
		return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
	};
});

app.filter('bytesToSize', function() {
	return (bytes) => {
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	};
});

app.directive('convertToNumber', function () {
	return {
		require: 'ngModel',
		link: (scope, element, attrs, ngModel) => {
			ngModel.$parsers.push((val) => {
				return val != null ? parseInt(val, 10) : null;
			});
			ngModel.$formatters.push((val) => {
				return val != null ? '' + val : null;
			});
		}
	};
});

app.directive('errSrc', function() {
	return {
		link: function(scope, element, attrs) {

			var watcher = scope.$watch(function() {
				return attrs['ngSrc'];
			}, function (value) {
				if (!value) {
					element.attr('src', attrs.errSrc);  
				}
			});

			element.bind('error', function() {
				element.attr('src', attrs.errSrc);
			});

      //unsubscribe on success
      element.bind('load', watcher);

  }
}
})
app.directive('ngFileModel', ['$parse', function ($parse) {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var model = $parse(attrs.ngFileModel);
      var isMultiple = attrs.multiple;
      var modelSetter = model.assign;
      element.bind('change', function () {
        var values = [];
        angular.forEach(element[0].files, function (item) {
          // console.log(item)
          var value = {
                       // File Name 
                       name: item.name,
                        //File Size 
                        size: item.size,
                        //File URL to view 
                        url: URL.createObjectURL(item),
                        // File Input Value 
                        _file: item
                      };
                    // console.log(item)
                    // console.log(value)
                    values.push(value);
                  });
        scope.$apply(function () {
          if (isMultiple) {
            modelSetter(scope, values);
          } else {
            modelSetter(scope, values[0]);
          }
        });
      });
    }
  };
}]);

app.directive('ripple', function(){
	return {
		restrict: "A",
		link: (scope,elem,attrs) => {
			$(elem).ripple({
				dragging: false,
				adaptPos: false,
				scaleMode: false
			});
		}
	}
});