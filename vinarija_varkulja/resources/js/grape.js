// Application module
var crudApp = angular.module('grape_list',[]);
crudApp.controller("GrapeController",function($scope,$http, $timeout){
    // Function to get employee details from the database
    getInfo();
    function getInfo(){
        // Sending request to EmpDetails.php files 
        $http.get('json/grape.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.grapes = response.data;
        });
    }
    $scope.formToggle =function(){
        $('#grape_form_card').slideToggle("slow");//prikaz prazne forme
        $('#grape_list').slideToggle("slow");//skrivanje (podizanje) forme za edit
    }
    
    $scope.insertInfo = function(info){
        $http.post('grape/store',
        {
            "name":info.name
        }).
        then(function(response){
            $('#grape_form_card').slideUp();//prikaz prazne forme
            $('#grape_list').slideDown();//skrivanje (podizanje) forme za edit
            $("#grape_form")[0].reset();//da se posle unosa podataka sa forme ona resetuje
            
            messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
            
            refresh();
            
            
        });
    }
    
    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
        $('#grape_form_card').slideUp();//prikaz prazne forme
        $('#edit_grape').slideToggle("slow");
    }
    
    $scope.updateInfo = function(info){
        $http.put(`grape/${info.id}`,
        {
            "id":info.id,
            "name":info.name
        }).
        then(function(response){
            $('#edit_grape').slideUp();//prikaz prazne forme
            $('#grape_list').slideDown();//skrivanje (podizanje) forme za edit
            $("#edit_grape")[0].reset();//da se posle unosa podataka sa forme ona resetuje

            messageBox(response, 'Uspesno azurirali podatke', 'Doslo je do greske!');
            refresh();
        });
    }
    
    $scope.deleteInfo = function(info){
        if(confirm("Are you sure that you want to delete?\n" + info.id+" "+info.name)){
            $http.delete(`grape/${info.id}`).
            then(function(response){
                messageBox(response, 'Uspesno brisali iz baze', 'Doslo je do greske!');
                refresh();
            });
        }
        
    }
    
    function refresh(){
        $http.post('grape');
        getInfo();
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

