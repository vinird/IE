var app = angular.module('App', []);
app.controller('sedesController', function($scope) {

$scope.fSedeID= function (id, name) {
  $scope.sedeID= id;
  $scope.sedeName= name;
};
});
