<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hexters\Ladmin\LadminLogable;

class Embed extends Model
{
    use HasFactory, LadminLogable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link_id',
        'embed_link',
        'uuid',
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
