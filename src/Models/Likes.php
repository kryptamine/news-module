<?php

namespace App\Models;

/**
 * Class Likes
 * @package App\Models
 */
class Likes extends BaseModel
{
    public $news_id;

    /**
     * @var
     */
    public $user_id;
}