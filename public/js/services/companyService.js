angular.module('companyService', []).factory('Company', function($http) {

		return {
			// get all the comments
			getCompanies : function() {
				return $http.get('/company/list-clients-company');
			},
			getOurDeps : function() {
				return $http.get('/company/ourdeps');
			},

		}

	});