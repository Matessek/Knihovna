<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{

    protected $table = 'gallery';
    protected $primaryKey = 'gallery_id';

    protected $useAutoIncrement = true;

    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Sloupec, který bude sloužit pro měkké mazání
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['name','image_links','author'];




}