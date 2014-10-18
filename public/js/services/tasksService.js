angular.module('tasksService', []).factory('Tasks', function($http) {

		return {
			// get all the comments
			get : function() {
				return $http.get('/tasks/show');
			},

			getByDate : function(dateAccrual) {
				return $http.get('/accruals/ShowByDate/'+dateAccrual.startDate+'/'+dateAccrual.stopDate+'/');
			},

			// save a comment (pass in comment data)
			save : function(accrual) {
				console.log(accrual);
				return $http({
					method: 'POST',
					url: '/accruals/set',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(accrual)
				});
			}
		}

	});