<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\ContactModel;

class Gallery extends BaseController
{
    public function index($page = 0)
    {

        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();
        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

        
        $albumModel =new AlbumModel();

        $data['albs'] = $albumModel->findAll();



        
        echo view('Layout/header',$data);
        echo view('gallery');
        echo view('Layout/footer');
    }

    public function Album($id = 0)
    {
        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();
        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

        
        $albumModel =new AlbumModel();

        $data['albs'] = $albumModel->find($id);
        


        
        echo view('Layout/header',$data);
        echo view('album');
        echo view('Layout/footer');
    }

    public function Photo($id = 0)
    {
        echo("Fotka  " . $id); // možná udělat???
    }




}