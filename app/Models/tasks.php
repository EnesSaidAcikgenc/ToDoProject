<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tasks extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = ['title, content, status, deadline'];


    //belongsTo , hasMany , hasOne , belongsToMany , hasManyThrough
    public function getCategorie()
    {
        return $this->belongsTo(categories::class, 'category_id','id');
    }
}
