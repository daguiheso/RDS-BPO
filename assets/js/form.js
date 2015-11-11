/*form to submit form*/
angular.module('formulario', [])
    .controller('ExampleController', ['$scope', function($scope) {
      $scope.list = [];
	  $scope.name = '';
	  $scope.email = '';
	  $scope.phone = ''; 
	  $scope.pais = ''; 
      $scope.text = 'hello';
	  
	  
      $scope.submit = function() {
        if ($scope.text) {
          $scope.list.push(this.text);
		   $scope.list.push(this.name);
		    $scope.list.push(this.email);
			$scope.list.push(this.phone);
			$scope.list.push(this.pais);
          $scope.text = '';
        }
      };
    }]);