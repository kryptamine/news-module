<?php

namespace App\Models;

/**
 * Class News
 * @package App\Models
 */
class News extends BaseModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $category_id;

    /**
     * @var string
     */
    public $body;
}