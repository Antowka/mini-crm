angular.module('tasksCtrl', []).controller('tasksController', function($scope, $http, Tasks) {

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		//ACCRUALS
		Tasks.get().success(function(data) {
			$scope.tasks = data;
			$scope.loading = true;
		});


});