<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relationship: one type has many gallery items
    public function items()
    {
        return $this->hasMany(Gallery::class, 'type_id');
    }
}
