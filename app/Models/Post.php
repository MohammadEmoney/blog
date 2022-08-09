<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public const STATUS = [
        'draft' => 'پیش نویس',
        'publish' => 'منتشر شده',
        'private' => 'شخصی',
    ];

    /**
     * fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'slug', 'short_description', 'description', 'user_id', 'status'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['author', 'image'];

    /**
     * image morph relation
     *
     * @return MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $this->where('status', 'publish');
    }
}
