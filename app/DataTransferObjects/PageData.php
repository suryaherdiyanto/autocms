<?php

namespace App\DataTransferObjects;

class PageData {

    public function __construct(
        public readonly string $title,
        public readonly ?string $slug,
        public readonly ?string $content,
        public readonly bool $isPublished,
        public readonly ?string $metaTitle,
        public readonly ?string $metaDescription
    )
    {

    }

    public static function fromRequest(array $data)
    {
        return new self(
            title: $data['title'],
            slug: $data['slug'] ?? null,
            content: $data['content'] ?? null,
            isPublished: $data['is_published'],
            metaTitle: $data['meta_title'] ?? null,
            metaDescription: $data['meta_description'] ?? null
        );
    }

}
