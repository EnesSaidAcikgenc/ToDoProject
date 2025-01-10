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

    public function categories()
    {
        $this->hasMany(User::class);
    }
}
