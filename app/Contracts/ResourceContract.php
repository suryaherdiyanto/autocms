<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ResourceContract {
    public function all(): Collection;

    public function find(string|int $primaryKey);

    public function findOneBy(string $col, $value);

    public function create(array $data);

    public function update(string|int $primaryKey, array $data);

    public function delete(string|int $primaryKey);

    public function paginate(int $perPage);
}