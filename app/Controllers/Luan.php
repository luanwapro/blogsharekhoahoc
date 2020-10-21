<?php namespace app\controllers;
use App\controllers\DB;
use App\Controllers\BaseController;

class Luan extends BaseController{

    public function index()
    {

        ini_set('display_errors', 1);
        print_r( DB::connection()->table('baiviet')->get(1));



    }

}