<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 07.12.18
 * Time: 08:45
 */

namespace App\Entity;


class IndexTask
{
    protected $task;
    protected $btnAdd;
    protected $btnShow;
    protected $btnEdit;
    protected $btnDel;

    public function getTask(){
        return $this->task;
    }

    public function setTask($task){
        $this->task=$task;
    }

    public function getBtnAdd(){
        return $this->btnAdd;
    }

    public function setBtnAdd($add){
        $this->btnAdd=$add;
    }

    public function getBtnShow(){
        return $this->btnShow;
    }

    public function setBtnShow($show){
        $this->btnShow = $show;
    }

    public function getBtnEdit(){
        return $this->btnEdit;
    }

    public function setBtnEdit($edit){
        $this->btnEdit=$edit;
    }

    public function getBtnDel(){
        return $this->btnDel;
    }

    public function setBtnDel($del){
        $this->btnDel=$del;
    }




}