<?php

namespace App;

use App\Core\DB;
use App\Models\Category;
use App\Models\Likes;
use App\Models\News;
use App\Models\Users;

/**
 * Class NewsModule
 * @package App
 */
class NewsModule
{
    /**
     * @var DB
     */
    protected $db;

    /**
     * NewsModule constructor.
     *
     * @param DB $db
     */
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * @return News[] | boolean
     */
    public function all()
    {
        return $this->db->all(News::class);
    }

    /**
     * @param Category $category
     * @param string   $body
     *
     * @return bool
     */
    public function add(Category $category, string $body)
    {
        return $this->db->save(News::class, ['body' => $body, 'category_id' => $category->id]);
    }

    /**
     * @param News  $news
     * @param Users $user
     *
     * @return bool
     */
    public function like(News $news, Users $user)
    {
        return $this->db->save(Likes::class, ['user_id' => $user->id, 'news_id' => $news->id]);
    }

    /**
     * @param News  $news
     * @param Users $user
     *
     * @return bool
     */
    public function unlike(News $news, Users $user)
    {
        return $this->db->remove(Likes::class, ['user_id' => $user->id, 'news_id' => $news->id]);
    }

}