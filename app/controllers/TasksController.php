<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TasksController extends BaseController{
    
    /*
     * Show all Accruals for current user  
     */
    public function getIndex(){
        return View::make('tasks/index', array('name' => 'INDEX'));
    }
    
    /*
     * Show lines with Accruals
     */
    public function getShow() {
        $task = new Task();
        return Response::json($task->all());
    }

    /*
     * Show lines with Accruals ByDate
     */
    public function getShowByDate($from, $to) {
        return Response::json(array('from' => $from, 'to' => $to));
    }
    
    /*
     * Add new Accrual to current user
     */
    public function postAdd(){
        return View::make('transactions/add', array('name' => 'ADD'));
    }
    
    /*
     * Edit Accrual by id
     */
    public function postEdit($idAccrual){
        return View::make('transactions/edit', array('name' => 'EDIT', 'id' => $idAccrual));
    }
    
    /*
     * Remove Accrual by id
     */
    public function postRemove($idAccrual){
        return View::make('transactions/remove', array('name' => 'remove', 'id' => $idAccrual));
    }    
    
}
