<?php

namespace App\Services;

use App\Contracts\ResourceContract;
use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageService implements ResourceContract {

    public function __construct(private Page $page) {}

    public function all(): Collection
    {
        return $this->page->all();
    }

    public function find(string|int $primaryKey)
    {
        return $this->page->find($primaryKey);
    }

    public function findOneBy(string $col, $value)
    {
        return $this->page->where($col, $value)->first();
    }

    public function create(array $data)
    {
        return $this->page->create($data);
    }

    public function update(string|int $primaryKey, array $data)
    {
        $page = $this->find($primaryKey);
        return $page->update($data);
    }

    public function delete(string|int $primaryKey)
    {
        return $this->page->destroy($primaryKey);
    }

    public function paginate(int $perPage)
    {
        return $this->page->paginate($perPage);
    }

}
