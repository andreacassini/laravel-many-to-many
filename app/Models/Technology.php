<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
