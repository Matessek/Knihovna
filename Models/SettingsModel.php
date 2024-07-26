<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{

    protected $table = 'aboutus';
    protected $primaryKey = 'aboutus_id';

    protected $useAutoIncrement = true;

    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Sloupec, který bude sloužit pro měkké mazání
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['name','content'];




}