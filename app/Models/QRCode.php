<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QRCode extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'qr_codes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'qrcode'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    // public function setQrcodeAttribute($value)
    // {
    //     $attribute_name = "qrcode";
    //     $disk = "public_beneran";
    //     $destination_path = date("Ymd");

    //     if ($value == null) {
    //         \Storage::disk($disk)->delete($this->{$attribute_name});
    //         $this->attributes[$attribute_name] = null;
    //     }

    //     if (Str::startsWith($value, 'data:image')) {
    //         $image = \Image::make($value)->encode('jpg', 90);
    //         $filename = md5($value . time()) . '.jpg';
    //         \Storage::disk($disk)->put("qr/" . $destination_path . '/' . $filename, $image->stream());
    //         $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
    //         $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
    //     }
    // }
}
