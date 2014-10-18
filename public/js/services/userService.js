angular.module('userService', []).factory('User', function($http) {

		return {
			// get all the comments
			get : function() {
				return $http.get('/user/get');
			},

			// save a comment (pass in comment data)
			save : function(user) {
				return $http({
					method: 'POST',
					url: '/user/set',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(user)
				});
			},
			
			createClient: function(client){
				return $http({
					method: 'POST',
					url: '/user/create-new-client',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(client)
				});
			},
			
			checkEmail: function(email){
				return $http({
					method: 'POST',
					url: '/user/check-email',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param({new_user_email:email})
				});
			},
		}

	});