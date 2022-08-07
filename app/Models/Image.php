<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'src', 'alt', 'size', 'type', 'dimensions'
    ];

    public function image()
    {
        return $this->morphTo();
    }
}
