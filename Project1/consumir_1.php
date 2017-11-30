<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="customersCtrl"> 

<table>
  <tr ng-repeat="x in names">
    <td>{{ x.userId }}</td>
    <td>{{ x.id }}</td>
    <td>{{ x.title }}</td>
    <td>{{ x.body }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("http://localhost:8080/Project1/consumir_2.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>


<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope) {
    $scope.userId = "1";
    $scope.id = "2";
    $scope.fullName = function() {
        return $scope.firstName + " " + $scope.lastName;
    };
});
</script>

</body>
</html>