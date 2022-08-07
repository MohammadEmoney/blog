<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'slug', 'short_description', 'description', 'user_id', 'status'
    ];

    /**
     * image morph many relations
     *
     * @return MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Category Belongs To relations
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * User Belongs To relations
     *
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
