<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name','is_active','user_id'];

    public function getTask()
    {
       return $this->hasMany(tasks::class,'category_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
