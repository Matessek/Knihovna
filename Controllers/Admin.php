<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\ContactModel;
use App\Models\PostModel;
use App\Models\SettingsModel;
use App\Models\UserModel;

class Admin extends BaseController
{

    public function PermissonCheck()
    {
        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 
        
    }
    public function index()
    {

        $session = session();
        
        if($session->has('data'))
        {
            return redirect()->to('/admin/domu');
        }
        else
        {
            print_r($session->get('data'));
            //echo 'Neni setnuty session';
            return view('/admin/login');
        }
        
    }

    public function Dashboard(){

        $session = session();
        
        if($session->has('data'))
        {

        $file = WRITEPATH . '/uploads/' . '_clicks.txt';

        // Získání aktuálního počtu prokliků
        $data['clickCount'] = file_exists($file) ? (int)file_get_contents($file) : 0;

        $postModel = new PostModel();

        $data['Actions'] = $postModel->join('postcategory','postcategory.post_id=post.post_id')->where('category_id',2)->orderBy('event_date')->findAll(5);   

        $data['Posts'] = $postModel->join('postcategory','postcategory.post_id=post.post_id')->where('category_id',1)->orderBy('created_at')->findAll(5);

            echo view('/Layout/AdminHeader');
            echo view('/Layout/AdminSideBar');
            echo view('/admin/dashboard',$data);
        }
        else
        {
            print_r($session->get('data'));
            echo 'Neni setnuty session';
            return redirect()->to('/admin');
        }
        //return 'Ola amigo';
    }
    public function Login()
    { 
        echo('<pre>');
        print_r($_POST);
        echo('</pre>');
        
        if($_POST)
        {
            $data = $_POST;
            $userModel = new UserModel();
            $user = $userModel->where('username',$data['username'])->find()[0];

            $session = session();

            echo('<pre>');
            if (!empty($user)) {
                print_r($user);
            } else {
                echo 'Uživatel nenalezen.';
            }
            echo('</pre>');

            // Kombinace zadaného hesla a soli
            $saltedEnteredPassword = $user['p_salt'] . $data['password'];

            // Hashování kombinovaného hesla a soli
            $hashedEnteredPassword = password_hash($saltedEnteredPassword, PASSWORD_ARGON2I);

            // Porovnání hashů
            if (password_verify($saltedEnteredPassword, $user['password'])) {
                // Heslo je správné
                echo 'Heslo je správné.';
                $dataSes = [
                    'username' => $user['username'],
                    'id' => $user['user_id'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name']
                ];
                $session->set('data',$dataSes);

                echo('<pre>');
                print_r($session->get('data'));
                echo('</pre>');
                return redirect()->to('/admin/domu');
            } else {
                // Heslo je nesprávné
                echo 'Heslo je nesprávné.';
                return redirect()->to('/admin');
            }
        }
    }



    public function News($id_post = -1){
        
            $session = session();

            if(!$session->has('data'))
            {
                print_r($session->get('data'));
                echo 'Neni setnuty session';
                return redirect()->to('/admin');
            }
            $db = db_connect();
            $table = $db->table('categories');
    
    
            $postModel = new PostModel();
            $postData['posts'] = $postModel->join(
                'postcategory', 'postcategory.post_id=post.post_id'
                )->join(
                    'categories','categories.category_id=postcategory.category_id'
                )->findAll();
    
            $viewstable = $db->table('pageviews');

            $sumViews = $viewstable->selectSum('view_count')->get()->getRow();

            $postData['sumViews'] = $sumViews->view_count;

            $categoriestable = $db->table('postcategory');

            if($id_post >= 0)
            {
                $category = $categoriestable->where('post_id', $id_post)->get();
                $postData['category'] = $category->getResult()[0];
                $data['post_data'] = $postModel->find($id_post);
            }
         
        
            $views = $viewstable->get();
            $postData['views'] = $views->getResult();
            
    
            $query = $table->get();
            $data['cat'] = $query->getResult();

            
            //print_r($postData);
    
            echo view('Layout/AdminHeader');
            echo view('Layout/AdminSideBar');
            echo view('admin/posts',$postData);
            echo view('Layout/PostModal',$data);
            //return 'Ola amigo';

      
    }

    public function Gallery(){
        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        $AlbumModel = new AlbumModel();

        $data['albums'] = $AlbumModel->findAll();


        echo view('Layout/AdminHeader');
        echo view('Layout/AdminSideBar');
        echo view('admin/gallery',$data);
        //return 'Ola amigo';
    }

    public function GalleryDetail($id = -1){

        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 
        if($id < 0)
        {
            return redirect()->to('admin/galerie');
        }

        $AlbumModel = new AlbumModel();

        $imagesData['albumdata'] = $AlbumModel->find($id);

        // echo('<pre>');
        // print_r($AlbumData);
        // echo('</pre>');





        echo view('/Layout/AdminHeader');
        echo view('/Layout/AdminSideBar');
        echo view('/admin/galleryDetail',$imagesData);
        //return 'Ola amigo';
    }


    public function AddPhotos($id = -1)
    {
        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        $request = service('request');

        if($imagefiles = $this->request->getFiles('images')) 
        {

            $data = $request->getPost();
            


            $session = session();


             // Získání nahrávaných souborů


            //$imagefiles = $data['images'];
            

            $imageLinks = "";

            foreach($imagefiles['images'] as $image)
            {
                
                if($image->isValid())
                {
                    echo('<pre>');
                    print_r($image->getName());
                    echo('</pre>');
                    $newName = $image->getRandomName();
                    
                    echo('<pre>');
                    print_r($image->move('Assets/img/uploads', $newName));   
                    echo('</pre>');
                    $imageLinks .=  $newName . "," ;
                }
                
            }


            $AlbumModel = new AlbumModel();

            $imagesIn = $AlbumModel->find($id)['image_links'];

            echo('<pre>');
            print_r($imagesIn);
            echo('</pre>');


            $dataSes = $session->get('data');
            // echo('<pre>');
            // print_r($session);
            // echo('</pre>');

            // Získání pouze 'username'
            $username = $dataSes['username'];

            $id_post = $AlbumModel->update($id,[
                'image_links' => $imagesIn . $imageLinks,
                'author' => $username
            ]);
        }
        return redirect()->to('/admin/galerie/'.$id);
    }


    public function DeletePhotos($id) 
    {
        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        $request = service('request');

        $filesToDelete = $request->getGet('photos');

        $AlbumModel = new AlbumModel();

        $imagesIn = $AlbumModel->find($id)['image_links'];


        echo('<pre>');
        print_r($filesToDelete);
        echo('</pre>');

        echo('<pre>');
        print_r($imagesIn);
        echo('</pre>');


        // Rozdělení stringů na pole
        $existingPhotos = explode(',', $imagesIn);
        $photosToDelete = explode(',', $filesToDelete);

        // Pole pro uchování názvů fotek, které zůstanou zachovány
        $photosToKeep = implode(',',array_diff($existingPhotos, $photosToDelete));

        $AlbumModel->update($id,['image_links' => $photosToKeep]);
        

        // Smazání fotek, které jsou v poli $photosToDelete
        foreach ($photosToDelete as $photo) 
        {
            // Cesta k fotce na serveru (přizpůsobte podle potřeby)
            $filePath = 'Assets/img/uploads/' . $photo;

            // Kontrola existence souboru před smazáním
            if (file_exists($filePath)) {
                unlink($filePath); // Smazání souboru
                echo "Fotka $photo byla smazána.<br>";
            } else {
                echo "Fotka $photo nebyla nalezena.<br>";
            }
        }           
        return redirect()->to('/admin/galerie/'.$id);

    }

   
    
    public function CreateAlbum()
    {
        echo 'TEst';

        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        $AlbumModel = new AlbumModel();

        $id = $AlbumModel->insert([
            'name' => $_GET['album-name'],
            'image-links' => "",
        ]);

        return redirect()->to('/admin/galerie/'.$id);

    }


    public function NewUser()
    {
        echo 'Registrace noveho uzivatele'; // přidani noveho uživatele 
        return redirect()->to('/admin/galerie');
    }

    public function Register()
    {

         $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 
        if($_POST)
        {
            $userModel = new UserModel();
            $data = $_POST;

            echo('<pre>');
            print_r($data);
            echo('</pre>');

            $password = $data['password'];

            // Generování náhodné soli
            $salt = bin2hex(random_bytes(16));

            $data['p_salt'] = $salt;
            // Kombinace hesla a soli
            $saltedPassword = $salt . $password;

            // Hashování kombinovaného hesla a soli
            $hashedPassword = password_hash($saltedPassword, PASSWORD_ARGON2I);

            $data['password'] = $hashedPassword;

            $userModel->insert($data);
            return redirect()->to('/admin/domu');

        }
        else
        return view('admin/register');
    }

    public function Logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to('/admin');
    }

    public function Save()
    {

        $session = session();

        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        if($_POST)
        {
            $data = $_POST;

            /*echo('<pre>');
            print_r($data);
            echo('</pre>');*/


            $post = new PostModel();

            $db = db_connect();


            if($data['post_id'] != "")
            {

                $request = service('request');

                // Získání nahrávaných souborů
                $imagefiles = $request->getFiles();



                $imageLinks = "";

                foreach($imagefiles as $image)
                {
                    if($image->isValid())
                    {
                        echo('<pre>');
                        print_r($image->getName());
                        echo('</pre>');
                        $newName = $image->getRandomName();
                        $image->move('Assets/img/uploads', $newName);   
                        $imageLinks .=  $newName . "," ;
                    }
                    

                }

                $dataSes = $session->get('data');
                // echo('<pre>');
                // print_r($session);
                // echo('</pre>');
    
                // Získání pouze 'username'
                $username = $dataSes['username'];
                if($imageLinks != "")
                {
                    $id_post = $post->update($data['post_id'],[
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'image_links' => $imageLinks,
                        'event_date' => $data['date'],
                        'cost' => $data['cost'],
                        'event_location' => $data['place'],
                        'author' => $username
                    ]);
                }
                else
                {
                    $id_post = $post->update($data['post_id'],[
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'event_date' => $data['date'],
                        'cost' => $data['cost'],
                        'event_location' => $data['place'],
                        'author' => $username
                    ]);
                }
               

                $db->table('postcategory')->where('post_id',$data['post_id'])->update(['category_id ' => $data['category']]);

                return redirect()->to('/admin/prispevky');
            }
            else
            {

            

           

            $request = service('request');

            // Získání nahrávaných souborů
            $imagefiles = $request->getFiles();

            $imageLinks = "";

            foreach($imagefiles as $image)
            {
                if($image->isValid())
                {
                    echo('<pre>');
                    print_r($image->getName());
                    echo('</pre>');
                    $newName = $image->getRandomName();
                    $image->move('Assets/img/uploads', $newName);   
                    $imageLinks .=  $newName . "," ;
                }
                
            }

            $dataSes = $session->get('data');
            // echo('<pre>');
            // print_r($session);
            // echo('</pre>');

            // Získání pouze 'username'
            $username = $dataSes['username'];

            $id_post = $post->insert([
                'title' => $data['title'],
                'content' => $data['content'],
                'image_links' => $imageLinks,
                'event_date' => $data['date'],
                'cost' => $data['cost'],
                'event_location' => $data['place'],
                'author' => $username
            ]);


            $postacegorytable = $db->table('postcategory');

            $postViewsTable = $db->table('pageviews');

            $postca = [
                'post_id' => $id_post,
                'category_id ' => $data['category'],
            ];


            $postViewsTable->insert([
                'post_id' => $id_post,
                'view_count' => 0
            ]);


            $postacegorytable->insert($postca);



            echo('<pre>');
            print_r($post);
            echo('</pre>');
            //$post->insert();

            return redirect()->to('/admin/prispevky');
                
            }  
            // Zobrazit názvy souborů
          
        }
    }

    public function Delete($id) 
    {
        $session = session();

        if(!$session->has('data'))
        {
            print_r($session->get('data'));
            echo 'Neni setnuty session';
            return redirect()->to('/admin');
        } 
        
        $db = db_connect();
        $postModel = new PostModel();

        $zaznam = $postModel->find($id);

        $soubory = explode(',',$zaznam['image_links']);

        foreach ($soubory as $s) {
            if (!empty($s) && file_exists('/Assets/img/uploads/' . $s)) {
                unlink('/Assets/img/uploads' . $s);
            }
        }
        
        $db->table('pageviews')->where('post_id', $id)->delete(); /// možná nechat??
        $db->table('postcategory')->where('post_id', $id)->delete();
        $postModel->delete($id);

        return redirect()->to('/admin/prispevky');
        



    }

    public function WebSettings()
    {
        $session = session();

        if(!$session->has('data'))
        {
            return redirect()->to('/admin');
        } 

        $db = db_connect();

        $catTable = $db->table('categories');

        $settingModel = new SettingsModel();

        $contactModel = new ContactModel();

        $data['contact'] = $contactModel->find(1);

        $data['about'] = $settingModel->find(1);
        $tmp = $settingModel->find(2);
        // echo('<pre>');
        // print_r($data['contact']);
        // echo('</pre>');

        $data['hours'] = explode('|',$settingModel->find(2)['content']);
        //$data['about'] = $settingModel->find(3);
        $data['categories'] = $catTable->get()->getResult();
    
        echo view('Layout/AdminHeader');
        echo view('Layout/AdminSideBar');
        echo view('admin/webSettings',$data);
    }

    public function SaveSettings()
    {
        $this->PermissonCheck();

        $choose = $_GET['choose'];

        echo $choose;

        $request = service('request');

        

        $settingModel = new SettingsModel();
        $contactModel = new ContactModel();

        switch($choose)
        {
            case "about":
                    $values = $request->getPost()['content'];

                    print_r($values);
                    $settingModel->update(1,['content' => $values]);
                break;
            case "hours":
                    $values = implode('|',$request->getPost());
                    print_r($values);
                    $settingModel->update(2,['content' => $values]);
                break;
            case "contact":
                $contData = $request->getPost();
                echo('<pre>');
                print_r($contData);
                echo('</pre>');

                $contactModel->update(1,[
                    'library_name' => $contData['name'],
                    'library_address' => $contData['address'],
                    'library_phone' => $contData['phone'],
                    'library_email' => $contData['email'],
                    'library_contacts_persons' => $contData['persons'],
                    'library_social_media' => $contData['social'],
                ]);

                break;

            case "categories":
                    $db = db_connect();
                    $catTable = $db->table('categories');
                    $catData = $request->getPost();
                    if($catData['category_id'] == -1)
                    {
                        $catTable->insert([
                            'category_name' => $catData['category_name'],
                            'category_color' => $catData['category_color']
                        ]);
                    }
                    else
                    {
                        $catTable->update([
                            'category_name' => $catData['category_name'],
                            'category_color' => $catData['category_color']
                        ],['category_id' => $catData['category_id']]);
                    }

                break;
            case "categoriesDel":
                $db = db_connect();
                $catTable = $db->table('categories');
                $catData = $request->getPost();
                $catTable->delete(['category_id' => $catData['category_id']]);
                break;
                
        }
        return redirect()->to('/admin/nastaveni-webu');
    }

    
}