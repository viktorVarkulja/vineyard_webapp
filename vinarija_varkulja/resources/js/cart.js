var crudApp = angular.module('cart_list',[]);
crudApp.controller("CartController",function($scope,$http,$timeout){
    // Function to get employee details from the database
    getInfoBottleHome();
    function getInfoBottleHome(){
        // Sending request to EmpDetails.php files 
        $http.get('json/bottle_homepage.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            //$scope.bottles = response.data;
            $scope.home_bottles = Object.keys(response.data).map(function(key) {
                return response.data[key];
            });
            $scope.reverse = ($scope.id === response.data.id) ? !$scope.reverse : false;
            
            // Array.from($scope.bottles);
            //$scope.bottles.toArray();
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
    
    getInfoReciept();
    function getInfoReciept(){
        // Sending request to EmpDetails.php files 
        $http.get('json/reciept.json').then(function(response){
            // Stored the returned data into scope 
            //alert(response.data)
            $scope.reciepts = response.data;
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
    
    $scope.carts=[];
    $scope.fetchCart = function(){
        $http.get('shop/cartItems').then(function(response){
            $scope.carts = response.data;
        })
    }
    
    $scope.addToCart = function(item){
        //alert(item.id);
        $http({
            method: 'POST',
            url: 'shop/addItems',
            data: item
        }).then(function(data){
            $('#button_close').click();
            $scope.fetchCart();
        })
    }
    
    $scope.removeItem = function(id){
        $http({
            method: 'post',
            url: 'shop/removeItem',
            data: id
        }).then(function(data){
            $scope.fetchCart();
        })
    }
    
    //$scope.address="";
    $scope.orderItems = function(info){
        //alert(total);
        // alert(info.total);
        $http({
            method: 'post',
            url: 'invoice/store',
            data: info.total
        }).then(function(response){
            
            if(response.data == true)
            {
                $(".message-box").show();
                $timeout(function(){
                    $(".message-box").hide();
                }, 10000);
            }
            else{
                $('#cart_btn_close').click();
                if(info.address!=""||!isNull(info.address)){
                    window.location.replace("invoice?reciept_id="+response.data+"&address="+info.address);
                }
                else{
                    window.location.replace("invoice?reciept_id="+response.data);
                }
                // $('#cart_btn_close').click();
            }
            
        })
    }
    
    $scope.items=[];
    $scope.itemPreview = function(item){
        $scope.items[0] = item;
    }
    
    $scope.getTotal = function(){
        var total = 0;
        var items = $scope.carts;
        for(var count=0; count < items.length; count++)
        {
            //alert(items[count].amount);
            total = total + (items[count].amount * items[count].price);
        }
        return total;
    }
    
    $scope.address="";
    $scope.reciept_id=0;
    $scope.getParameters = function(){
        
        var tmp = [];
        var items = location.search.substr(1).split("&");
        for (var index = 0; index < items.length; index++) {
            tmp = items[index].split("=");
            if (tmp[0] === "reciept_id") $scope.reciept_id = decodeURIComponent(tmp[1]);
            if (tmp[0] === "address") $scope.address = decodeURIComponent(tmp[1]);
        }
        //alert($scope.address);
    }
});