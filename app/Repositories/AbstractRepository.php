<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Exception;

class DuplicatedRecordException extends Exception
{

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct('The record already exists in the database.', $code, $previous);
    }
}

class AbstractRepository
{

    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function all()
    {
        return $this->model->all();
    }

    /**
     * @return Model $model
     */
    public function randomFirst()
    {
        return $this->model->all()->random(1)->first();
    }

    /**
     * @return static
     */
    function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * @param $id
     *
     * @return Model
     */
    function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    function first()
    {
        return $this->model->first();
    }

    /**
     * @param int $count
     * @param array $params
     * 
     * @return static
     */
    public function createFactory(int $count = 1, array $params = [])
    {
        $this->model->factory()->count($count)->create($params);
    }

    /**
     * @param array $attributes
     *
     * @return static
     */
    function firstOrCreate(array $attributes = [])
    {
        return $this->model->firstOrCreate($attributes);
    }

    /**
     * @param array $search
     * @param array $attributes
     *
     * @return Model
     */
    function updateOrCreate(array $search = [], array $attributes = [])
    {
        return $this->model->updateOrCreate($search, $attributes);
    }

    /**
     * @param array $input
     *
     * @return static
     * @throws DuplicatedRouteException
     * @throws Exception
     * @throws \Exception
     */
    function create(array $input)
    {
        try {
            return $this->model->create($input);
        } catch (Exception $e) {
            if ($e->getCode() == '23000') {
                throw new DuplicatedRecordException;
            }
            throw $e;
        }
    }

    /**
     * @param array $input
     *
     * @return static
     */
    function forceCreate(array $input)
    {
        $this->model->unguard();
        $instance = $this->model->create($input);
        $this->model->reguard();

        return $instance;
    }

    /**
     * @throws \Exception
     */
    public function deleteAll()
    {
        $this->model->delete();
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    /**
     * @param Model $model
     * @param array $attributes
     * @return bool
     */
    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }

    /**
     * Delete an Eloquent Model from database
     *
     * @param Model $model
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param Model $model
     *
     * @return void
     */
    public function forceDelete(Model $model)
    {
        return $model->forceDelete();
    }

    /**
     * Truncate model table
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->model->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1 ;');
    }
}