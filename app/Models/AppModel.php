<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'app';
    protected $primaryKey       = 'id_app';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    =

    [
        'nama_app',
        'slug_app',
        'status_app',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function search($keyword)
    {
        return $this->table('app')
            ->like('nama_app', ucwords($keyword))
            ->orLike('status_app', ucwords($keyword));
    }
}
