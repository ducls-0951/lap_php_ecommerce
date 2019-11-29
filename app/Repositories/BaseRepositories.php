<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepositories implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function find($id)
    {
        try {
            $result = $this->model->findOrFail($id);
        } catch (\Exception $e) {
            return false;
        }

        return $result;
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        $result = $this->find($id);

        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function update($id, $data = [])
    {
        $result = $this->find($id);

        if ($result) {
            $result->update($data);

            return $result;
        }

        return false;
    }

    public function getWith($data = [])
    {
        $result = $this->model->with($data)->get();

        return $result;
    }

    public function getWithFind($id, $data = [])
    {
        try {
            return $this->model->with($data)->findOrFail($id);
        } catch (\Exception $e) {
            return false;
        }
    }
}
