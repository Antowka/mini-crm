<?php
	class CompanyController extends BaseController{
		
		private $CompaniesUserModel;
		private $Company;

		public function __construct(){
			$this->CompaniesUserModel = new CompaniesUser;
			$this->Company = new Company;
		}

	    public function getIndex(){
	        return View::make('company/index', array('name' => 'INDEX'));
	    }

	    public function getListClientsCompany(){
	    	$listClientsCompany = $this->CompaniesUserModel->find(Auth::id())->userCompanies()->orderBy('id', 'DESC')->get();
	    	return Response::json($listClientsCompany);
	    }

	    public function postRemove(){
	    	$this->CompaniesUserModel->find(Input::get('id'))->delete();
	    	return Response::json(array('status'=>'removed'));
	    }

	    public function getOurdeps(){
	 		$departments = $this->CompaniesUserModel->find(Auth::id())->departmentsInComapnyByUser()->where('user_companies.status_in_company_id', '=', 2)->get();

	 		foreach($departments as $value){
	 			$depsOurCompany[] = array(
	 				'id'=>$value['original']['id'],
	    	 		'name'=>$value['original']['name'],
	 			);
	 		}

	    	 return Response::json($depsOurCompany);
	    }

	}