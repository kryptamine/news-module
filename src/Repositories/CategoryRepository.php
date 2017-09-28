<?php

namespace App\Repositories;

use App\Models\Categories;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @param string $title
     *
     * @return bool
     */
    public function create(string $title)
    {
        return $this->db->save(Categories::class, ['title' => $title]);
    }
}