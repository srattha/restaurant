app.service('dataService', function($http,$log) {
  return {
    //- getData
    getData: function(api){
      return $http.get(domain + api)
        .then(getDataComplete)
        .catch(getDataFailed);

      function getDataComplete(response){
        return response;
      }

      function getDataFailed(error){
        $log.error('XHR failed for getData.'+ error);
        return "recursion";
      }
    },

//- postData
    postData: function(api,data){
      return $http({
        method:'POST',
        url:domain + api,
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        data:$.param(data)
      });
    }
  }
});