<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all data
     *
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Find related record by value
     *
     * @return mixed
     */
    public function findBy($key, $value)
    {
        return $this->model->where($key, $value)->first();
    }

    /**
     * Get total records count
     *
     * @return mixed
     */
    public function total()
    {
        return $this->model->count();
    }

    /**
     * Insert a new record
     *
     * @return mixed
     */
    public function create($data)
    {
        try {
            //            DB::beginTransaction();

            return $this->model->firstOrCreate($data);
        } catch (Exception $e) {
            //            DB::rollBack();

            return $e->getMessage();
        }

    }

    /**
     * @return mixed
     */
    public function update($id, $data)
    {
        try {
            //            DB::beginTransaction();

            return $this->model->where('id', $id)->update($data);
        } catch (Exception $e) {
            //            DB::rollBack();

            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function delete($key, $value)
    {
        try {
            return $this->model->where($key, $value)->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function firstOrCreate($key, $data)
    {
        return $this->model->firstOrCreate([$key => $data[$key]], $data);
    }

    public function exists($key, $value)
    {
        return $this->model->where($key, $value)->exists();
    }
}
