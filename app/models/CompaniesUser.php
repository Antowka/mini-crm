<?php
class CompaniesUser extends Eloquent{
	protected $table = 'user_companies';
	protected $primaryKey = 'company_id';
	public $timestamps = false;
	protected $fillable = array('company_id', 'user_id', 'profession_id', 'departments_id', 'status_in_company_id');
	
	public function userCompanies(){
		return $this->belongsToMany('Company', 'user_companies', 'user_id');
	}

	//For Remove Company
	public function company(){
		return $this->belongsToMany('Company', 'user_companies', 'company_id');
	}

	public function user(){
		return $this->belongsToMany('User', 'user_companies', 'company_id');
	}

	public function delete(){
		$this->user()->where('status_in_company_id', 1)->delete();
		$this->company()->delete();
		parent::delete();
	}
}