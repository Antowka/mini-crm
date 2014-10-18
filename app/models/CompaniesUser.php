<?php
class CompaniesUser extends Eloquent{
	protected $table = 'user_companies';
	protected $primaryKey = 'company_id';
	public $timestamps = false;
	protected $fillable = array('company_id', 'user_id', 'profession_id', 'departments_id', 'status_in_company_id');
	
	public function userCompanies(){
		return $this->belongsToMany('Company', 'user_companies', 'user_id');
	}
}