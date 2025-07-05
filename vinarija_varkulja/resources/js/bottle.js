// Application module
var crudApp = angular.module('bottle_list',[]);
crudApp.controller("BottleController",function($scope,$http,$timeout){
    // Function to get employee details from the database
    getInfoBottle();
    function getInfoBottle(){
        // Sending request to EmpDetails.php files 
        $http.get('json/bottle.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.bottles = response.data;
        });
    }
    
    getInfoWine();
    function getInfoWine(){
        // Sending request to EmpDetails.php files 
        $http.get('json/wine.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.wines = response.data;
        });
    }
    
    $scope.formToggle =function(){
        $('#bottle_form_card').slideToggle("slow");//prikaz prazne forme
        $('#bottle_list').slideToggle("slow");//skrivanje (podizanje) forme za edit
    }
    
    $scope.insertInfo = function(info){
        
        var fd = new FormData();
        var files = document.getElementById("bottle_image").files[0];
        //alert(files.type);
        if(!files.type.startsWith("image/")){
            alert("Slika mora da bude u formatu .jpg, .jpeg, .png, .gif, .bmp!");
        }else{
            fd.append('bottleInfo', JSON.stringify(info));
            fd.append('file', files);
            //alert(files.name+" "+files.type);
            
            $http({
                method: 'post',
                url: 'bottle/store',
                data: fd,
                headers: {'Content-Type': undefined},
            }).then(function(response){
                $('#bottle_form_card').slideUp();//prikaz prazne forme
                $('#bottle_list').slideDown();//skrivanje (podizanje) forme za edit
                $("#bottle_form")[0].reset();//da se posle unosa podataka sa forme ona resetuje
                
                messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
                
                refresh();
            });
        }
        
        
    }
    
    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
        $('#bottle_form_card').slideUp();//prikaz prazne forme
        $('#edit_bottle').slideToggle("slow");
        $scope.currentUser.wineId = info.wine_id;
        //$("#edit_select option[value="+info.grape_id+"]").attr('selected','selected');
        //$('#edit_select').val(info.grape_id).change();
    }
    
    $scope.updateInfo = function(info){
        
        var fd = new FormData();
        var files = document.getElementById("bottle_image_edit").files[0];
        //alert(files.type);
        if(!!files){
            if(!files.type.startsWith("image/")){
                alert("Slika mora da bude u formatu .jpg, .jpeg, .png, .gif, .bmp!");
            }else{
                fd.append('bottleInfo', JSON.stringify(info));
                fd.append('file', files);
                //alert(files.name+" "+files.type);
                
                $http({
                    method: 'post',
                    url: 'bottle/update',
                    data: fd,
                    headers: {'Content-Type': undefined},
                }).then(function(response){
                    $('#edit_bottle').slideUp();//prikaz prazne forme
                    $('#bottle_list').slideDown();
                    $('#edit_bottle_form')[0].reset();
                    
                    messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
                    
                    refresh();
                });
            }
        }
        else{
            fd.append('bottleInfo', JSON.stringify(info));
            fd.append('file', null);
            //alert(files.name+" "+files.type);
            
            $http({
                method: 'post',
                url: 'bottle/update',
                data: fd,
                headers: {'Content-Type': undefined},
            }).then(function(response){
                $('#edit_bottle').slideUp();//prikaz prazne forme
                $('#bottle_list').slideDown();
                $('#edit_bottle_form')[0].reset();
                
                messageBox(response, 'Uspesno uneli u bazu', 'Doslo je do greske!');
                
                refresh();
            });
        }
        
    }
    
    $scope.deleteInfo = function(info){
        if(confirm("Are you sure that you want to delete?\n" + info.id+" "+info.name)){
            $http.delete(`bottle/${info.id}`).
            then(function(response){
                messageBox(response, 'Uspesno brisali iz baze', 'Doslo je do greske!');
                refresh();
            });
        }
        
    }
    
    function refresh(){
        $http.post('bottle');
        getInfoBottle();
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

