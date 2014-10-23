angular.module('companyCtrl', ['ngTable']).controller('companyController', function($scope, $http, Company, ngTableParams) {

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		$scope.companies = [];
		
		//send scope to parent UserCtrl
		$scope.$parent.CompanyChildScope = $scope;
		
		$scope.updateCompanyList = function(){
			Company.getCompanies().success(function(data) {
				$scope.companies = data;
				
				//Start - pagination
				$scope.tableParams = new ngTableParams({
			        page: 1,            
			        count: 10      
			    },{
			        total: $scope.companies.length, // length of data
			        getData: function($defer, params) {
			        	console.log(params.url());
			            $defer.resolve($scope.companies.slice((params.page() - 1) * params.count(), params.page() * params.count()));
			        }
			    });
				//End - pagination
				
			});
		};

		$scope.removeCompany = function(company_id){
			Company.removeCompany(company_id).success(function(data) {
				if(data.status=='removed'){
					Company.getCompanies().success(function(data) {
						$scope.companies = data;
						$scope.tableParams.reload();
					});
				}
			});
		};
		
		$scope.updateCompanyList();

		Company.getOurDeps().success(function(data){
			$scope.ourdeps = data;
		});

});