<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //<--- Name space
class Role extends Model
{
    //protected fillabel is a property that allows mass assignment for specified fields
    //protected guarded is the opposite of fillable
    use softDeletes;
    protected $fillable = ['name', 'description'];
}
