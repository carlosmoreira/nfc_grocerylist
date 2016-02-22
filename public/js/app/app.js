var app = angular.module('groceryList', ['mgcrea.pullToRefresh']);



app.controller('GroceryList', function ($http) {

    var vm = this;

    vm.groceryList = ['1','2','3'];

    vm.showAddForm = false;

    vm.init = function(){
        $http.get('/groceryitem').then(
            function(resp){
                vm.groceryList = resp.data;
                console.log(resp);
            },
            function(err){console.log(err);}
        );
    };

    vm.saveGroceryItem = function(gitem){
        $http.post('/groceryitem', gitem).then(
            function(resp){
                if(resp.data.Success) {
                    vm.showAddForm = false;
                    vm.init();
                }
            },function(err){
                console.log('Error', err);
            }
        )
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