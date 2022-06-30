<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location',
     'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters) 
    {
        if($filters['tag'] ?? false) {
            $query->WHERE('tags', 'LIKE', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false) {
            $query->WHERE('title', 'LIKE', '%' . request('search') . '%')
                ->orWHERE('description', 'LIKE', '%' . request('search') . '%')
                ->orWHERE('tags', 'LIKE', '%' . request('search') . '%');
        }
    }

    //Relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
