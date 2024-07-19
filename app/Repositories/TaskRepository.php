<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function upsert(array $data)
    {
        return Task::upsert($data, uniqueBy: ['provider_name', 'name'], update: ['duration', 'difficulty_level']);
    }

    public function getByConditionAndOrderBy(array $conditions, array $order_by)
    {
        $query = Task::query();
        foreach ($conditions as $field => $value) {
            $query->where($field, $value);
        }
        foreach ($order_by as $field => $value) {
            $query->orderBy($field, $value);
        }
        return $query->get();
    }

    public function deleteWithCondition(array $conditions)
    {
        $query = Task::query();
        foreach ($conditions as $field => $value) {
            $query->where($field, $value);
        }
        return $query->delete();
    }
}