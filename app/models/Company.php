<?php
class Company extends Eloquent{
	protected $table = 'companies';
	protected $primaryKey = 'id';
	protected $fillable = array('id', 'name', 'phone', 'email', 'description');
}