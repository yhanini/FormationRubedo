blocksConfig['navigation-inverted'] = {
        "template": "/templates/blocks/navigation-inverted.html",
        "internalDependencies":["/src/modules/rubedoBlocks/controllers/MenuController.js"]
}

blocksConfig['formation'] = {
    "template": "/templates/blocks/formation.html",
    "internalDependencies":["/src/modules/rubedoBlocks/controllers/FormationController.js"]
}


angular.module("rubedoDataAccess").factory('Formation',['$http',function($http){
    var serviceInstance = {};
    serviceInstance.getList=function(){
        return ($http.get("/api/v1/formation"));
    };
    serviceInstance.addFormation=function(titre){
        return ($http({
            url:"/api/v1/formation",
            method:"POST",
            data:{
                titre:titre
            }
        }));
    };
    return serviceInstance;
}]);