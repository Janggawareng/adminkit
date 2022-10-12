<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\AppModel;

class Api extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->app = new AppModel;
    }

    public function data_app()
    {
        $app['data_app'] = $this->app->findAll();
        return $this->respond($app);
    }
}
