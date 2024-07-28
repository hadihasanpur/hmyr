<?php

namespace App\Models;

use App\Models\Modir;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level3 extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'level3';
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
    public function images()
    {
        return $this->hasMany(Level3Image::class);
    }
    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
    public function modir()
    {
        return $this->hasOne(Modir::class);
    }
    public function level2()
    {
        return $this->belongsTo(Level2::class);
    }

}
