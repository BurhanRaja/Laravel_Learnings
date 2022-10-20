<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable=['logo', 'company', 'title', 'location', 'email', 'website', 'tags', 'description'];
    
    public function scopeFilter($query, array $filter) {

        if ($filter['tag'] ?? false) {
            $query -> where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($filter['search'] ?? false) {
            $query -> where('tags', 'like', '%' . request('search') . '%')
            -> orWhere('title', 'like', '%' . request('search') . '%')
            -> orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
