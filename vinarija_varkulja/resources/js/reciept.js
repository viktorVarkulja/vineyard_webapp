// Application module
var crudApp = angular.module('reciept_list',[]);
crudApp.controller("RecieptController",function($scope,$http, $timeout){
    // Function to get employee details from the database
    getInfoStatus();
    function getInfoStatus(){
        // Sending request to EmpDetails.php files 
        $http.get('json/status_reciept.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.statuses = response.data;
        });
    }

    getInfoReciept();
    function getInfoReciept(){
        // Sending request to EmpDetails.php files 
        $http.get('json/receipt.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.receipts = response.data;
        });
    }

    getInfoBottle();
    function getInfoBottle(){
        // Sending request to EmpDetails.php files 
        $http.get('json/bottle.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.bottles = response.data;
        });
    }

    getInfoUser();
    function getInfoUser(){
        // Sending request to EmpDetails.php files 
        $http.get('json/user.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.users = response.data;
        });
    }

    getInfoArticles();
    function getInfoArticles(){
        // Sending request to EmpDetails.php files 
        $http.get('json/reciept_bottle.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.articles = response.data;
        });
        
    }

   /* $scope.formToggle =function(){
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
    }*/
    
    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
       // $('#wine_form_card').slideUp();
        $('#edit_reciept').slideToggle("slow");
       // $scope.currentUser.statusId = info.status;
    }
    
    $scope.updateInfo = function(info){
        $http.put(`reciept/${info.id}`,
        {
            "id":info.id,
            "total":info.total_RSD,
            "status":info.status,
            "created_at":info.created_at
        }).
        then(function(response){
            $('#edit_reciept').slideUp();//prikaz prazne forme
            $('#reciept_list').slideDown();//skrivanje (podizanje) forme za edit
           // $("#edit_wine")[0].reset();//da se posle unosa podataka sa forme ona resetuje

            messageBox(response, 'Uspesno azurirali podatke', 'Doslo je do greske!');
            refresh();
        });
    }
    
    /*$scope.deleteInfo = function(info){
        if(confirm("Are you sure that you want to delete?\n" + info.id+" "+info.name)){
            $http.delete(`wine/${info.id}`).
            then(function(response){
                messageBox(response, 'Uspesno brisali iz baze', 'Doslo je do greske!');
                refresh();
            });
        }
        
    }*/
    
    function refresh(){
        $http.post('reciept');
        getInfoReciept();
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

