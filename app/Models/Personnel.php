<?php

namespace App\Models;

use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'personnels';
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
        return $this->hasMany(PersonnelImage::class);
    }
    public function level2()
    {
        return $this->belongsTo(Level2::class);
    }
    public function level3()
    {
        return $this->belongsTo(Level3::class);
    }
    public function level1()
    {
        return $this->belongsTo(Level1::class);
    }
}
