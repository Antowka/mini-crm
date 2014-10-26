angular.module('tasksCtrl', ['ngTable']).controller('tasksController', function($scope, $http, Tasks, ngTableParams) {

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.tasks = [];

		//Update Tasks List
		$scope.updateTasksList = function(){	
			Tasks.get().success(function(data) {

				if($scope.tasks.length==0){
						//get list client on first load page
						
						$scope.tasks = data;
						
						//Start - pagination
						$scope.tableParams = new ngTableParams({
					        page: 1,            
					        count: 10      
					    },{
					        total: $scope.tasks.length, // length of data
					        getData: function($defer, params) {
					            $defer.resolve($scope.tasks.slice((params.page() - 1) * params.count(), params.page() * params.count()));
					        }
					    });
						//End - pagination
				}else{
						//for update client list
						$scope.tasks = data;
						$scope.tableParams.reload();
				}
			});

		};

		$scope.updateTasksList();
});