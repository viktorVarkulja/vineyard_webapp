// Application module
var crudApp = angular.module('wine_list',[]);
crudApp.controller("WineController",function($scope,$http, $timeout){
    // Function to get employee details from the database
    getInfoWine();
    function getInfoWine(){
        // Sending request to EmpDetails.php files 
        $http.get('json/wine.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.wines = response.data;
        });
    }

    getInfoGrape();
    function getInfoGrape(){
        // Sending request to EmpDetails.php files 
        $http.get('json/grape.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.grapes = response.data;
        });
    }

    $scope.formToggle =function(){
        $('#wine_form_card').slideToggle("slow");//prikaz prazne forme
        $('#wine_list').slideToggle("slow");//skrivanje (podizanje) forme za edit
    }
    
    $scope.insertInfo = function(info){
        $http.post('wine/store',
        {
            "name":info.name,
            "year":info.year,
            "grapeId":info.grapeId.id
        }).
        then(function(response){
            $('#wine_form_card').slideUp();//prikaz prazne forme
            $('#wine_list').slideDown();//skrivanje (podizanje) forme za edit
            $("#wine_form")[0].reset();//da se posle unosa podataka sa forme ona resetuje
            
            messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
            
            refresh();
            
            
        });
    }
    
    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
        $('#wine_form_card').slideUp();//prikaz prazne forme
        $('#edit_wine').slideToggle("slow");
        $scope.currentUser.grapeId = info.grape_id;
        //$("#edit_select option[value="+info.grape_id+"]").attr('selected','selected');
        //$('#edit_select').val(info.grape_id).change();
    }
    
    $scope.updateInfo = function(info){
        $http.put(`wine/${info.id}`,
        {
            "id":info.id,
            "name":info.name,
            "year":info.year,
            "grapeId":info.grapeId
        }).
        then(function(response){
            $('#edit_wine').slideUp();//prikaz prazne forme
            $('#wine_list').slideDown();//skrivanje (podizanje) forme za edit
           // $("#edit_wine")[0].reset();//da se posle unosa podataka sa forme ona resetuje

            messageBox(response, 'Uspesno azurirali podatke', 'Doslo je do greske!');
            refresh();
        });
    }
    
    $scope.deleteInfo = function(info){
        if(confirm("Are you sure that you want to delete?\n" + info.id+" "+info.name)){
            $http.delete(`wine/${info.id}`).
            then(function(response){
                messageBox(response, 'Uspesno brisali iz baze', 'Doslo je do greske!');
                refresh();
            });
        }
        
    }
    
    function refresh(){
        $http.post('wine');
        getInfoWine();
    }

    function messageBox(response, $success_msg, $fail_msg)
    {
        $(".message-box").show();
            
            if(response.data == true)
            {
                $(".alert.alert-success").html($success_msg).show();
                $(".alert.alert-danger").hide();
            }
            else{
                $(".alert.alert-danger").html($fail_msg).show();
                $(".alert.alert-success").hide();
            }
            
            $timeout(function(){
                $(".message-box").hide();
            }, 5000);
    }
    
});

