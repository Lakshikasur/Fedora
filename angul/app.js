angular.module("myFirstApp", ["ngRoute"])
.config(['$routeProvider', function($routeProvider) {

		$routeProvider.when('/who', {
			templateUrl:'views/who.htm'
		})
		.when('/what', {
			templateUrl:'views/what.htm'
		})
		.when('/where',{
			templateUrl:'views/where.htm',
			controller:'formCtrl'			
		})
		.otherwise({
			templateUrl:'views/who.htm'
		})
		

}])
/*
.run(['$rootScope', function() {
	$rootScope.event  = [];
}])
*/
.controller('formCtrl', ['eventFactory', '$scope', function(eventFactory, $scope) {

		//$scope.event = [];
		$scope.event = eventFactory.getAllEvents();


		$scope.submitForm = function(form) {
			//$scope.event.push(form);
			eventFactory.createEvent( angular.copy(form), $scope.event );
			console.log( angular.copy($scope.event));
		}
}])
/*
.controller( 'myCtrl', function( $scope ) {

	$scope.firstName = "lakshika";
 	$scope.lastName = "silva";

	$scope.fullName = function() {
			return $scope.firstName + ' '+ $scope.lastName;
	}
	
})

*/

