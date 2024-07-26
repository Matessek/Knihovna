<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index($page = 0)
    {
        echo("Vypis novinek strana " . $page);
    }

    public function Detail($id = 5)
    {
        echo("Vypis novinky  " . $id);
    }



}