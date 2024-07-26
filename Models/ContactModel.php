<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{

    protected $table = 'contactinfo';
    protected $primaryKey = 'contactinfo_id';

    protected $useAutoIncrement = true;

    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Sloupec, který bude sloužit pro měkké mazání
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['library_name',	'library_address','library_phone','library_email','library_contacts_persons','library_social_media'];




}