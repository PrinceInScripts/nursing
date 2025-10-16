<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type_id',
        'url',
    ];

    // Auto-generate slug on create (optional)
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->name);
        });
    }

    // Relationship: each gallery item belongs to a type
    public function type()
    {
        return $this->belongsTo(GalleryType::class, 'type_id');
    }
}
