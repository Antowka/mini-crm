<?php
class CompanyDepartments extends Eloquent{
	protected $table = 'departments_in_company';
	protected $primaryKey = 'id';
	protected $fillable = array('id', 'name', 'company_id');
}