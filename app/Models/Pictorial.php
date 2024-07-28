<?php

namespace App\Models;

use App\Models\PictorialImage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pictorial extends Model
{
     use HasFactory, Sluggable;

    protected $table = "pictorials";
    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیرفعال';
    }
    public function pictorialImage()
    {
        return $this->hasMany(PictorialImage::class);
    }
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
