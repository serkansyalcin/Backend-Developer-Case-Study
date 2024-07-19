<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function upsert(array $data);
    public function getByConditionAndOrderBy(array $conditions, array $order_by);
    public function deleteWithCondition(array $conditions);
}
