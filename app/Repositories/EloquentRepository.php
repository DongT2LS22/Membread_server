<?php

namespace App\Repositories;

abstract class EloquentRepository implements RepositoryInterface{
    
    protected $_model;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel(){
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    abstract function getModel();

    public function getAll()
    {
        return $this->_model->all();
    }

    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->_model->find($id);
        if($result){
            $result->delete();
            return true;
        }
        return false;
    }

    public function update(array $attributes,$id){
        $result = $this->find($id);
        if($result){
            $result->update($attributes);
            return true;
        }
        return false;
    }
    public function create(array $attributes){
        return $this->_model->create($attributes);
    }
}