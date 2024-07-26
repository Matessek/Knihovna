<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $useAutoIncrement = true;

    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Sloupec, který bude sloužit pro měkké mazání
    protected $deletedField = 'deleted_at';

    protected $allowedFields = ['username','password','p_salt','email','first_name','last_name','is_admin'];




}