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
			
			//console.log(data);
			//console.log("Antes de llamar submit");
		  $http.post('/action.php', {nombre: this.name} ).then(function successCallback(response) {
    // this callback will be called asynchronously
    // when the response is available
	console.log(response);
  }, function errorCallback(response) {
    // called asynchronously if an error occurs
	console.log("error al enviar");
    // or server returns response with an error status.
  });
		  
		  
		  
        }
      };
    }]);