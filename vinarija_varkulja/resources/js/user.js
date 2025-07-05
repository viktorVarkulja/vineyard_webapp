// Application module
var crudApp = angular.module('user_list',[]);
crudApp.controller("UserController",function($scope,$http, $timeout){
    // Function to get employee details from the database
    getInfo();
    function getInfo(){
        // Sending request to EmpDetails.php files 
        $http.get('json/user.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.users = response.data;
        });
    }
    $scope.formToggle =function(){
        $('#user_form_card').slideToggle("slow");//prikaz prazne forme
        $('#user_list').slideToggle("slow");//skrivanje (podizanje) forme za edit
    }
    
    $scope.insertInfo = function(info){
        $http.post('user/store',
        {
            "name":info.name,
            "email": info.email,
            "password":info.password,
            "is_admin":info.is_admin,
            "address": info.address
        }).
        then(function(response){
            $('#user_form_card').slideUp();//prikaz prazne forme
            $('#user_list').slideDown();//skrivanje (podizanje) forme za edit
            $("#user_form")[0].reset();//da se posle unosa podataka sa forme ona resetuje
            
            messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
            
            refresh();
            
            
        });
    }
    
    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
        //alert(info.is_admin);
        $('#user_form_card').slideUp();//prikaz prazne forme
        $('#edit_user').slideToggle("slow");

        if(info.is_admin == 1)
        {
           // $("#user_admin").prop( "checked", true );
           $scope.currentUser.is_admin = true;
            //alert(info.is_admin);
        }else{
           // $("#user_admin").prop( "checked", false );
           $scope.currentUser.is_admin = false;
        }
    }
    
    $scope.updateInfo = function(info){
        $http.put(`user/${info.id}`,
        {
            "id":info.id,
            "name":info.name,
            "email": info.email,
            "is_admin":info.is_admin,
            "address": info.address
        }).
        then(function(response){
            $('#edit_user').slideUp();//prikaz prazne forme
            $('#user_list').slideDown();//skrivanje (podizanje) forme za edit
            $('#edit_user_form')[0].reset();//da se posle unosa podataka sa forme ona resetuje

            messageBox(response, 'Uspesno azurirali podatke', 'Doslo je do greske!');
            refresh();
        });
    }
    
    $scope.deleteInfo = function(info){
        if(confirm("Are you sure that you want to delete?\n" + info.id+" "+info.name)){
            $http.delete(`user/${info.id}`).
            then(function(response){
                messageBox(response, 'Uspesno brisali iz baze', 'Doslo je do greske!');
                refresh();
            });
        }
        
    }
    
    function refresh(){
        $http.post('user');
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

