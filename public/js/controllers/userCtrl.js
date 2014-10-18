angular.module('userCtrl', []).controller('userController', function($scope, $http, User) {

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.alerts = [];
		$scope.CompanyChildScope = null;

		//USER EDIT
		User.get().success(function(data) {
			$scope.user = data;
			$scope.loading = false;
		});

		$scope.saveUser = function() {
			$scope.loading = true;
			User.save($scope.user)
			.success(function(data) {
				User.get().success(function(getData) {
					$scope.user = getData;
					$scope.loading = false;
				});

			})
			.error(function(data) {
				console.log(data);
			});
		};
		
		$scope.addClient = function(){
			User.createClient($scope.client)
			.success(function(data) {
				console.log(data);
				if(data.cmd=='success'){
					$scope.alerts.splice(0);
					$scope.alerts.push({type:data.cmd, msg:data.msg});
					
					//update company list 
					$scope.CompanyChildScope.updateCompanyList();
				}else{
					$scope.alerts.splice(0);
					$scope.alerts.push({type:data.cmd, msg:data.msg});
				}
			})
			.error(function(data) {
				console.log(data);
			});
		};
		
		$scope.checkEmail = function(){
			User.checkEmail($scope.client.new_user_email)
			.success(function(data) {
				if(data.cmd==1){
					$scope.alerts.splice(0);
					$scope.alerts.push({type:'danger', msg:data.msg});
				}else if(data.cmd==0){
					$scope.alerts.splice(0);
				}
			})
			.error(function(data) {
				console.log(data);
			});
		};
		
		$scope.closeAlert = function(index){
			$scope.alerts.splice(index, 1);
		}

	});