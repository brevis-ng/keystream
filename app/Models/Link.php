<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hexters\Ladmin\LadminLogable;

class Link extends Model
{
    use HasFactory, LadminLogable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'poster',
    ];

    public function embed()
    {
        return $this->hasOne(Embed::class);
    }
}
