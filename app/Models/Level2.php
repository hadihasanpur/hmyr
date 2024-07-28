<?php

namespace App\Models;

use App\Models\Level3;
use App\Models\Personnel;
use App\Models\Level2Image;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level2 extends Model
{
 use HasFactory, Sluggable;

    protected $table = 'level2';
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
                'source' => 'name',
            ],
        ];
    }

    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیرفعال';
    }

    public function images()
    {
        return $this->hasMany(Level2Image::class);
    }
    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
    public function modir()
    {
        return $this->hasOne(Modir::class);
    }
    public function level1()
    {
        return $this->belongsTo(Level1::class);
    }
    public function level3s()
    {
        return $this->hasMany(Level3::class);
    }

}
