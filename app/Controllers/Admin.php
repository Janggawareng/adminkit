<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->app = new \App\Models\AppModel();
        $this->user = new \App\Models\UserModel();
    }

    // Dashboard
    public function index()
    {
        $data =
            [
                'title' => "Dashboard - Features | $this->nama_pos",
                'user'  => $this->session->get('user'),
            ];

        return view('admin/index', $data);
    }

    // Aplikasi
    public function app()
    {
        // Keyword
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $app = $this->app->search($keyword)->orderBy('nama_app ASC')->paginate(10, 'app');
        } else {
            $app = $this->app->orderBy('id_app ASC')->paginate(10, 'app');
        }

        // Pagination
        $pager = $this->app->pager;
        $no_page = $this->request->getVar('page_app') ? $this->request->getVar('page_app') : 1;

        // Set Last URL
        $this->session->set('last_url', site_url(current_url('page_app')));

        $data =
            [
                'title' => "Aplikasi - Database | $this->nama_pos",
                'user'  => $this->session->get('user'),
                'app' => $app,
                'pager' => $pager,
                'no_page' => $no_page,
            ];

        return view('admin/app', $data);
    }

    // Detail Aplikasi
    public function app_detail($id_app)
    {
        $app = $this->app->where('id_app', $id_app)->first();
        $no_page = $this->request->getVar('page_app') ? $this->request->getVar('page_app') : 1;

        $data =
            [
                'title' => "Detail Aplikasi - Database | $this->nama_pos",
                'user'  => $this->session->get('user'),
                'app' => $app,
                'no_page' => $no_page,
                'last_url' => $this->session->get('last_url'),
            ];

        return view('admin/app_detail', $data);
    }

    // Create App
    public function app_create()
    {
        $data =
            [
                'nama_app' => ucwords($this->get['nama_app']),
                'status_app' => $this->get['status_app'],
                'slug_app' => url_title($this->get['nama_app']),
            ];

        $this->app->save($data);

        session()->setFlashdata('true', 'Berhasil');
        return redirect()->to('/admin');
    }

    // Update App
    public function app_update($id_app)
    {
        $data =
            [
                'id_app' => $id_app,
                'nama_app' => ucwords($this->get['nama_app']),
                'status_app' => $this->get['status_app'],
            ];

        $this->app->save($data);

        session()->setFlashdata('true', 'Berhasil');
        return redirect()->to("/admin/app_detail/$id_app");
    }

    // User
    public function user()
    {
        // Keyword
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $myuser = $this->user->search($keyword)->orderBy('username ASC')->paginate(10, 'user');
        } else {
            $myuser = $this->user->orderBy('id_user ASC')->paginate(10, 'user');
        }

        // App
        $app = $this->app->where('status_app', 'Aktif')->findAll();

        // Pagination
        $pager = $this->user->pager;
        $no_page = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        // Set Last URL
        $this->session->set('last_url', site_url(current_url('page_user')));

        $data =
            [
                'title' => "User - Database | $this->nama_pos",
                'user'  => $this->session->get('user'),
                'myuser' => $myuser,
                'pager' => $pager,
                'no_page' => $no_page,
                'app' => $app,
            ];

        return view('admin/user', $data);
    }

    // Create User
    public function user_create()
    {
        $id_app = $this->get['id_app'];
        $app = $this->app->where('id_app', $id_app)->first();

        $username = strtolower($this->get['username']);

        $check_user = $this->user->where('username', $username)->first();

        if ($check_user) {
            session()->setFlashdata('false', 'Opps.. Username ini sudah digunakan.');
            return redirect()->to('/admin/user');
        }

        $data =
            [
                'username' => $username,
                'password' => $this->get['password'],
                'nama_user' => ucwords($this->get['nama_user']),
                'id_app' => $app['id_app'],
                'nama_app' => $app['nama_app'],
                'slug_app' => $app['slug_app'],
                'status_user' => $this->get['status_user'],
            ];

        $this->user->save($data);

        session()->setFlashdata('true', 'Berhasil');
        return redirect()->to('/admin/user');
    }

    // Detail User
    public function user_detail($id_user)
    {
        $myuser = $this->user->where('id_user', $id_user)->first();
        $no_page = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        // App
        $app = $this->app->where('status_app', 'Aktif')->findAll();

        $data =
            [
                'title' => "Detail User - Database | $this->nama_pos",
                'user'  => $this->session->get('user'),
                'myuser' => $myuser,
                'no_page' => $no_page,
                'last_url' => $this->session->get('last_url'),
                'app' => $app,
            ];

        return view('admin/user_detail', $data);
    }

    // Update User
    public function user_update($id_user)
    {
        $id_app = $this->get['id_app'];
        $app = $this->app->where('id_app', $id_app)->first();

        $data =
            [
                'id_user' => $id_user,
                'password' => $this->get['password'],
                'nama_user' => ucwords($this->get['nama_user']),
                'id_app' => $app['id_app'],
                'nama_app' => $app['nama_app'],
                'slug_app' => $app['slug_app'],
                'status_user' => $this->get['status_user'],
            ];

        $this->user->save($data);

        session()->setFlashdata('true', 'Berhasil');
        return redirect()->to("/admin/user_detail/$id_user");
    }
}
