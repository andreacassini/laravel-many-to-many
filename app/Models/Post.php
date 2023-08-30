<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\Tipologia;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'slug', 'cover_image', 'tipologia_id'];

    public function tipologia(): BelongsTo
    {
        return $this->belongsTo(Tipologia::class);
    }
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
