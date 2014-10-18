angular.module('companyService', []).factory('Company', function($http) {

		return {
			// get all the comments
			getCompanies : function() {
				return $http.get('/company/list-clients-company');
			},
			getOurDeps : function() {
				return $http.get('/company/ourdeps');
			},
			removeCompany : function(id_company){
				return $http({
					method: 'POST',
					url: '/company/remove',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param({id:id_company})
				});
			}

		}

	});