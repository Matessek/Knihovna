<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\ContactModel;
use App\Models\PostModel;
use App\Models\SettingsModel;

class Home extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();

        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);



        $postModel = new PostModel();
        $posts['all'] = $postModel->orderBy('created_at')->findAll(4);


        $settingsModel = new SettingsModel();
        $posts['about'] = $settingsModel->find(1);
        $posts['hours'] = explode('|',$settingsModel->find(2)['content']);
        $posts['sliderinfo'] = $settingsModel->find(3);




        //$categoriestable = $db->table('postcategory');
        

        echo view('Layout/header',$data);
        echo view('homepage',$posts);
        echo view('Layout/footer');
    }

    public function About()
    {

        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();

        $aboutModel = new SettingsModel();

        $about['about'] = $aboutModel->find(1);

        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

        //print_r($about);

        echo view('Layout/header',$data);
        echo view('about',$about);
        echo view('Layout/footer');
    }

    public function PriceList()
    {
        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();

        $aboutModel = new SettingsModel();

        $about['about'] = $aboutModel->find(1);

        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

        //print_r($about);

        echo view('Layout/header',$data);
        echo view('pricelist');
        echo view('Layout/footer');
    }

    public function Posts($id=-1){
        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();

        //print_r($data['cat']);

        // foreach($data['cat'] as $c)
        // {
        //     if($c->category_id == $id)
        //     {
        //         $c->category_color = "custom";
        //     }
        // }

        $data['customId'] = $id;

        $postModel = new PostModel();

        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

       

        if($id != -1)
        {
            $data['all'] = $postModel->join('postcategory','postcategory.post_id=post.post_id')->join('categories','postcategory.category_id=categories.category_id')->where('postcategory.category_id',$id)->find();
            //$data['all'][0]['category_color'] = '#fff8c0';
            //print_r($data['all']);
        }
        else
        {
            
            $data['all'] = $postModel->join('postcategory','postcategory.post_id=post.post_id')->join('categories','postcategory.category_id=categories.category_id')->findAll();
        }


        //print_r($data['all']);


        echo view('Layout/header',$data);
        echo view('posts',$data);
        echo view('Layout/footer');
        
    }

    public function Post($id)
    {
        $db = db_connect();
        $table = $db->table('categories');
        $query = $table->get();
        $data['cat'] = $query->getResult();

        $postModel = new PostModel();

       

        if($_GET)
        {
            $cat = $_GET['choose'];
        }
        else
        {
            
            $data['all'] = $postModel->join('postcategory','postcategory.post_id=post.post_id')->find($id);
        }


        //print_r($data['all']);

        $contactModel = new ContactModel();

        $data['cont'] = $contactModel->find(1);

        echo view('Layout/header',$data);
        echo view('postDetail',$data);
        echo view('Layout/footer');
    }

    public function Contacts()
    {
        echo("Kontakty");
    }

    public function RedirectCounter()
    {
         // Cesta k souboru pro ukládání počtu prokliků
        $file = WRITEPATH . '/uploads/' . '_clicks.txt';

        // Získání aktuálního počtu prokliků
        $clickCount = file_exists($file) ? (int)file_get_contents($file) : 0;
        
        // Zvýšení počtu prokliků o 1
        $clickCount++;

        if($clickCount > 1000000)
        {
            $clickCount = 0;
        }

        // Uložení nového počtu zpět do souboru
        file_put_contents($file, $clickCount, LOCK_EX);

        // Redirect na původní URL, kde bylo provedeno kliknutí
        return redirect()->to("https://smk.tritius.cz/library/bolatice/");
    }

}
