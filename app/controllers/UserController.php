<?php 
	Class UserController extends BaseController {

		/*
		 *Login
		 */
		public function login(){
			$login = Input::get('login');
			$password = Input::get('password');

			if (Auth::attempt(array('login' => $login, 'password' => $password))){
		        return Redirect::to('/')->with('success', 'You have been logged in');
		    }else{
		        return Redirect::to('/')->with('error', 'Login Failed');
		    }
		 
		    //return View::make('main');
		}

		/*
		 *LogOut
		 */
		public function logout(){
			Auth::logout();
    		return Redirect::to('/')->with('success', 'You have successfully logged out');
		}


		/*
		 *Create
		 */
		public function create(){
			return "create";
		}

		/*
		 *get info about user
		 */
		public function get(){
			return Response::json(Auth::user());
		}

		/*
		 *set info to user
		 */
		public function set(){
			$newDataAboutUser = Input::get('new_password');		
			$user = Auth::user();
			$user->password = Hash::make(Input::get('new_password'));
			return Response::json( array($user->password, "fdfdfd") );
		}
		
		/*
		 * Create new client
		 */
		public function createNewClient(){

			//create new user
			$user = new User;
			
			$doubleCount = $user->where('login','=', Input::get('new_user_email'))->count();
			
			if($doubleCount == 0){
				//add new user-client
				$user->login = strtolower(Input::get('new_user_email'));
				$user->password = Hash::make(Input::get('new_user_pass'));
				$user->name = Input::get('new_user_name');
				$checkUserSave = $user->save();
				
				//create new company with client
				$company = new Company;
				$company->name = Input::get('new_company');
				$company->description = Input::get('new_company_description');
				$company->email = strtolower(Input::get('new_user_email'));
				$checkCompanySave = $company->save();
				
				//added relationship with clint-user and his company
				$companiesUser['client'] = new CompaniesUser(
					array(
						'user_id'				=>	$user->id,
						'company_id'			=>	$company->id,
						'profession'			=>	'client',
						'departments_id'		=>	1,
						'status_in_company_id' 	=>	1,
					)
				);
				
				$companiesUser['manager'] = new CompaniesUser(
					array(
						'user_id'				=>	Auth::id(),
						'company_id'			=>	$company->id,
						'profession'			=>	'manager',
						'departments_id'		=>	1,
						'status_in_company_id' 	=>	2,
					)
				);
				
				if( $checkCompanySave && $checkUserSave && $companiesUser['client']->save() && $companiesUser['manager']->save() ){
					return Response::json( array('cmd'=>'success', 'msg'=>trans("alerts.sc_create_company")) );
				}else{
					return Response::json( array('cmd'=>'danger', 'msg'=>trans("alerts.unsc_create_company")) );
				}
			}else{
				return Response::json( array('cmd'=>'danger', 'msg'=>trans("alerts.exist_email")) );
			}
			
		}
		
		/*
		 * Check Email on diuble in DB
		 */
		public function checkEmail(){
			$user = new User;
			$doubleCount = $user->where('login','=', Input::get('new_user_email'))->count();
			
			if($doubleCount > 0){
				$result = array(
					'cmd'=>1,
					'msg'=>trans('alerts.exist_email')
				);
			}else{
				$result = array(
					'cmd'=>0,
					'msg'=>'good email'
				);
			}
			
			return Response::json($result);
		}

	}