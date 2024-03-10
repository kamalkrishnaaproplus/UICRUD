<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'tbl_sales';
    protected $primaryKey = 'TranNo';
    public $timestamps = false;

    
}

