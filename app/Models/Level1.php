<?php

namespace App\Models;

use App\Models\Level2;
use App\Models\Level3;
use App\Models\Personnel;
use App\Models\Level1Image;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Level1 extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'level1';
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
    public function level2s()
    {
        return $this->hasMany(Level2::class);
    }
    public function images()
    {
        return $this->hasMany(Level1Image::class);
    }
    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
    public function modir()
    {
        return $this->hasOne(Modir::class);
    }
    public function level3s(): HasManyThrough
    {
        return $this->hasManyThrough(Level3::class,Level2::class);
    }

}
