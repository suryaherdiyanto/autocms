<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BaseService {

    public function index(Request $request, Model $model, int $perPage = 10)
    {
        $fields = [];
        $eloquent = $model;

        if ($request->filled('fields')) {
            $fields = explode(',', $request->get('fields'));
        }

        if (count($fields) > 0) {
            $eloquent = $eloquent->select($fields);
        }

        return $eloquent->orderBy('id', 'desc')->paginate($perPage);
    }
}
