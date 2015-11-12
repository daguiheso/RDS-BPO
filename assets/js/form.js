/*form to submit form*/
angular.module('formulario', [])
    .controller('ExampleController', ['$scope', '$http', function($scope, $http) {
      $scope.list = [];
	  $scope.name = '';
	  $scope.email = '';
	  $scope.phone = ''; 
	  $scope.pais = ''; 
      $scope.submit = function() {     
            $scope.text = '';		
			var req = {
				method: 'POST',
				url: 'http://landing.reddesignsystems.com/action.php',				
				data: { name: this.name, email: this.email, phone: this.phone, pais: this.pais }
							
			}
			$http(req)
				.then(function successCallback(response) {					
					console.log(response);
 				 }, function errorCallback(response) {    				
					alert("error al enviar, intente de nuevo.");
    				
  				});
		  
		  
		  
        // }
        };
    }]);