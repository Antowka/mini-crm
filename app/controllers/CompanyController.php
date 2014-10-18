<?php
	class CompanyController extends BaseController{
		
		private $CompaniesUserModel;
		
		public function __construct(){
			$this->CompaniesUserModel = new CompaniesUser;
		}

	    public function getIndex(){
	        return View::make('company/index', array('name' => 'INDEX'));
	    }

	    public function getListClientsCompany(){
	    	$listClientsCompany = $this->CompaniesUserModel->find(Auth::id())->userCompanies()->orderBy('id', 'DESC')->get();
	    	return Response::json($listClientsCompany);
	    }

	    public function getOurdeps(){
	    	 $depsOurCompany = array(
	    	 	array(
	    	 		'id'=>1,
	    	 		'name'=>'deps 1',
	    	 	), 
	    	 	array(
	    	 		'id'=>2,
	    	 		'name'=>'deps 2',
	    	 	),
	    	 	array(
	    	 		'id'=>3,
	    	 		'name'=>'deps 3',
	    	 	),
	    	 );

	    	 return Response::json($depsOurCompany);
	    }

	}