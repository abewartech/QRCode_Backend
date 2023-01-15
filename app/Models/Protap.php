<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Protap extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'protaps';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "public_beneran";
        $destination_path = 'file/' . date("Ymd");

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function bidangId()
    {
        return $this->belongsTo('App\Models\Bidang', 'bidang_id');
    }
}
