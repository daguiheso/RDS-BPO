/*form to submit form*/
angular.module('formulario', [])
    .controller('ExampleController', ['$scope', '$http', function($scope, $http) {
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
			console.log(this.pais);
          $scope.text = '';
		  $http.post('/action.php',  { nombre: this.name, email: this.email, telefono: this.phone, pais: this.pais }).then(function successCallback(response) {
    // this callback will be called asynchronously
    // when the response is available
	console.log(response);
  }, function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  });
		  
		  
		  
        }
      };
    }]);