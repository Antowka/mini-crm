angular.module("formsDirectives", [])
//check email on exist
.directive('angUniqueEmail', ["User", function (Users) {
	  return {
		/*    require:'ngModel',
		    restrict:'A',
		    link:function (scope, el, attrs, ctrl) {
		      ctrl.$parsers.push(function (email) {
		    	  console.log(email);
		    	  if (email) {
		    		  Users.checkEmail(email).success(function(data) {
			            if (data.msg == 'Ok email') {
			              ctrl.$setValidity('angUniqueEmail', true);
			            } else {
			              ctrl.$setValidity('angUniqueEmail', false);
			            }
		    		  });
		          return email;
		        }
		      });
		    } */
		  }; 
		}])