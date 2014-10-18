var commentApp = angular.module('userApp', [
	'userCtrl',
	'tasksCtrl',
	'companyCtrl',
	'userService',  
	'tasksService',
	'companyService',
	'formsDirectives',
	], function($interpolateProvider){
	
	$interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});