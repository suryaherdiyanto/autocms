<?php

namespace App\Services;

use App\Models\Page;
use App\DataTransferObjects\PageData;

class PageService extends BaseService {

    public function createPage(PageData $data, Page $page)
    {
        return $page->create([
            'title' => $data->title,
            'slug' => $data->slug,
            'content' => $data->content,
            'is_published' => $data->isPublished,
            'meta_title' => $data->metaTitle,
            'meta_description' => $data->metaDescription
        ]);
    }

    public function updatePage(PageData $data, int $id)
    {
        $page = Page::findOrFail($id);
        $data = [
            'title' => $data->title,
            'slug' => $data->slug,
            'content' => $data->content,
            'is_published' => $data->isPublished,
            'meta_title' => $data->metaTitle,
            'meta_description' => $data->metaDescription
        ];


        return $page->update(array_filter($data));
    }

    public function deletePage(int $id)
    {
        Page::destroy($id);
    }

}
