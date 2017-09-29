<?php

namespace App\Models;

/**
 * Class Likes
 * @package App\Models
 */
class Likes extends BaseModel
{
    /**
     * @var int
     */
    public $news_id;

    /**
     * @var int
     */
    public $user_id;
}