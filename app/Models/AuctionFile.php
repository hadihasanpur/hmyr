<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionFile extends Model
{
    use HasFactory;
    protected $table = "auction_files";
    protected $guarded = [];
}
