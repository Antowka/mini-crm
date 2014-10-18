<?php
class Company extends Eloquent{
	protected $table = 'companies';
	protected $primaryKey = 'id';
	protected $fillable = array('name', 'phone', 'email', 'description');
	protected $guarded = array('id');
	
	public function userRelationCompanies(){
		return $this->hasMany('CompaniesUser');
	}
}