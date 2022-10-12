<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    =

    [
        'username',
        'password',
        'nama_user',
        'id_app',
        'nama_app',
        'slug_app',
        'status_user',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function search($keyword)
    {
        return $this->table('user')
            ->like('nama_user', ucwords($keyword))
            ->orLike('username', ucwords($keyword));
    }
}
