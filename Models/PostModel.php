<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{

    protected $table = 'post';
    protected $primaryKey = 'post_id';

    protected $useAutoIncrement = true;

    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Sloupec, který bude sloužit pro měkké mazání
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['title','content','image_links','event_date','cost','event_location','author'];




}