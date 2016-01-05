<!doctype html>
<html lang="en" ng-app="groceryList">
<head>
    <meta charset="UTF-8">
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
    </style>
</head>
<body ng-controller="GroceryList as gl" ng-init="gl.init()">
<div>
    <div class="container">
        <h2 class="pull-left">Grocery List Items</h2>
        <button ng-click="gl.finishShopping()" id="finishShopping" class="btn btn-primary pull-right">Finish Shopping</button>
    </div>

    <ul id="groceryItems" ng-repeat="item in gl.groceryList">
        <li ng-class="{ 'inCart'  : item.inCart }"
            ng-click="gl.setIncart(item)">
            <i ng-if="item.inCart" class="glyphicon glyphicon-shopping-cart"></i>
            {{item.name}}
        </li>
    </ul>
</div>

</body>
</html>