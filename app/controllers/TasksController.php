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

        $dateRange = array(
            'startDate' => date("Y-m-d H:i:s", time()-86400),
            'stopDate'  => date("Y-m-d H:i:s", time()),
        );

        $showAccrualsList = array(
            array(
                'id'=>1,
                'date' => date("Y-m-d H:i:s", time()-86400),
                'description' => "Test description on accruals",
                'amoubt' => 150,
                'type' => 'z.p',
            ),
            array(
                'id'=>2,
                'date' => date("Y-m-d H:i:s", time()),
                'description' => "Test description on accruals 2",
                'amoubt' => 180,
                'type' => 'z.p',
            ),
        );
        return Response::json($showAccrualsList);
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
