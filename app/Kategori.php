<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori','slug'];
    public $timestamps = true;

    public function artikel()
    {
        return $this->hasMany('App/artikel','id_kategori');
    }
    public static function boot()
    {
         parent::boot();
         self::deleting(function($kategori){
             if($kategori->artikel->count()>=0){
                 $html = 'kategori tidak bisa di hapus karena masih di gunakan artikel';
                 $html = '<ul>';
                 foreach ($kategori->artikel as $data){
                     $html="<li>$data->judul</li>";
                 }
                //  $html = '< ul>';
                //  Session::flash("flash_notification",[
                //      "level" => "danger",
                //      'message' =>$html
                //  ]);
                //  return false;
             }
         });
     }
      public function getRouteKeyName()
         {
             return 'slug';
    }
     

}
