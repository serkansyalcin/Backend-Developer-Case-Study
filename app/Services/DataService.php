<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class DataService
{
    protected $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function storeData(array $data)
    {
        return $this->repository->upsert($data);
    }

    public function getByConditionAndOrderBy(array $conditions, array $order_by)
    {
        return $this->repository->getByConditionAndOrderBy($conditions, $order_by);
    }

    public function deleteWithCondition(array $conditions)
    {
        return $this->repository->deleteWithCondition($conditions);
    }
}