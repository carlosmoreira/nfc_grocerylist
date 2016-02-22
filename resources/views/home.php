<!doctype html>
<html lang="en" ng-app="groceryList">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grocery List</title>
    <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css" />
    <script src="/libs/angular/angular.min.js"></script>
    <script src="js/app/app.js"></script>
    <style>
        #finishShopping{
            margin-top: 17px;
        }
        ul#groceryItems{
            padding:0px;
            margin:0px;
        }
        ul#groceryItems li{
            border: 1px solid gainsboro;
            list-style-type: none;
            padding: 15px 0px;
            padding-left: 10px;
        }
        .inCart{
            text-decoration: line-through;
        }
        .pull-to-refresh{
            margin:auto !IMPORTANT;
        }

    </style>
    <link rel="stylesheet" href="/libs/angular-pull-to-refresh/dist/angular-pull-to-refresh.min.css">
    <script src="/libs/angular-pull-to-refresh/dist/angular-pull-to-refresh.min.js"></script>
</head>
<body ng-controller="GroceryList as gl" ng-init="gl.init()">
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2 class="">Grocery List Items
                    <i class="glyphicon glyphicon-plus" ng-if="!gl.showAddForm" ng-click="gl.showAddForm=true"></i>
                    <i class="glyphicon glyphicon-minus" ng-if="gl.showAddForm" ng-click="gl.showAddForm=false"></i>
                </h2>
            </div>
            <div ng-if="!gl.showAddForm" class="col-md-3 text-center">
                <button ng-click="gl.finishShopping()" id="finishShopping" class="btn btn-primary">Finish Shopping</button>
            </div>
        </div>
    </div>

    <div ng-if="gl.showAddForm" class="row">
        <div class="col-md-12">

            <form ng-submit="gl.saveGroceryItem(glModel)">
                <div class="form-group">
                    <input type="text" ng-model="glModel.name" placeholder="Grocery Item" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success"/>
                </div>
            </form>

        </div>
    </div>

    <div class="row" ng-if="!gl.showAddForm">
        <div class="col-md-12">
            <div pull-to-refresh="gl.init()">
                <ul id="groceryItems" ng-repeat="item in gl.groceryList" >
                    <li ng-class="{ 'inCart'  : item.inCart }"
                        ng-click="gl.setIncart(item)">
                        <i ng-if="item.inCart" class="glyphicon glyphicon-shopping-cart"></i>
                        {{item.name}}
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

</body>
</html>