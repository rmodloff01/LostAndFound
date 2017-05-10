<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $table = 'item_types';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
    public static function getAllTypes(){
        return self::all();
    }
}
