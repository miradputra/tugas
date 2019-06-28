<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $fillable = ['judul', 'slug', 'foto', 'konten', 'id_kategori', 'id_user'];
    public $timestamps = true;

      public function artikel()
    {
        return $this->belongsTo('App\artikel', 'artikel_tag','id_tag','id_artikel');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'artikel_tag', 'id_artikel', 'id_tag');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
