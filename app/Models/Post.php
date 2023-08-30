<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'slug', 'cover_image', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
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
