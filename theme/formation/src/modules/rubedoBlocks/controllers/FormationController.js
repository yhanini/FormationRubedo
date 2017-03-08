angular.module("rubedoBlocks").lazy.controller("FormationViewerController",["$scope","Formation",function($scope,Formation){
    var me=this;
    me.newJournalTitle="";
    var blockConfig=$scope.blockConfig;
    me.refreshJournaux=function(){
        Formation.getList().then(
            function(response){
                me.formations=response.data.formations;
            }
        );
    };

    me.createNewJournal=function(){
        if(me.newJournalTitle!=""){
            Formation.addFormation(me.newJournalTitle).then(
                function(response){
                    me.refreshJournaux();
                }
            );
            me.newJournalTitle="";
        }
    };
    me.refreshJournaux();
}]);