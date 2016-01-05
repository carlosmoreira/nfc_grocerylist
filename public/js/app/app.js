var app = angular.module('groceryList', []);



app.controller('GroceryList', function ($http) {

    var vm = this;

    vm.groceryList = ['1','2','3'];

    vm.init = function(){
        $http.get('/groceryitem').then(
            function(resp){
                vm.groceryList = resp.data;
                console.log(resp);
            },
            function(err){console.log(err);}
        );
    };

    vm.finishShopping = function(){

        var itemsInCart = vm.groceryList.filter(function(item){
            if(item.inCart){
                item.bought = 1;
                return item;
            }
        });

        $http.post('/groceryitem/buyCart', {'cartItems' : itemsInCart} ).then(
            function(resp){
                vm.init();
            },
            function(err){console.log(err);}
        )

    };

    vm.setIncart = function(item){
        item.inCart = !item.inCart;
        $http.put('/groceryitem/' + item.id, item).then(
            function(resp){
                vm.init();
            },
            function(err){console.log(err);}
        )
    };



});