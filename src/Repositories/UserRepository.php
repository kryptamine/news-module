<?php

namespace App\Repositories;

use App\Models\Users;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
{
    /**
     * @param string $email
     *
     * @return mixed
     */
    public function create(string $email)
    {
        return $this->db->save(Users::class, ['email' => $email]);
    }
}