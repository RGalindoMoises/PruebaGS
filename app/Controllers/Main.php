<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Main extends BaseController
{
    public function index()
    {
        $db =Database::connect();
        d($db->query('show databases')->getResultArray());
        return view('main/index');
    }
}
