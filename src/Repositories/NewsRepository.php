<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\Likes;
use App\Models\News;
use App\Models\Users;

/**
 * Class NewsModule
 * @package App
 */
class NewsRepository extends BaseRepository
{
    /**
     * @return News[] | boolean
     */
    public function all()
    {
        return $this->db->all(News::class);
    }

    /**
     * @param Categories $category
     * @param string     $body
     *
     * @return bool
     */
    public function create(Categories $category, string $body)
    {
        return $this->db->save(News::class, ['body' => $body, 'category_id' => $category->id]);
    }

    /**
     * @param News  $news
     * @param Users $user
     *
     * @return bool
     */
    public function like(News $news, Users $user) : bool
    {
        return $this->db->save(Likes::class, ['user_id' => $user->id, 'news_id' => $news->id]);
    }

    /**
     * @param News  $news
     * @param Users $user
     *
     * @return bool
     */
    public function dislike(News $news, Users $user) : bool
    {
        return $this->db->remove(Likes::class, ['user_id' => $user->id, 'news_id' => $news->id]);
    }

}