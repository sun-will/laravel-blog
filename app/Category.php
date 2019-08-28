<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Category extends Model
{
    /**
    * Return the category's post
    *
    * @return hasMany
    */
    public function posts(): hasMany
    {
        return $this->hasMany(Post::class, 'id');
    }
}
