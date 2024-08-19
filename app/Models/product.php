<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'catelogue_id',
        'name',
        'number',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'views',
        'content',
        'is_active',
    ];

    public function catelogue():BelongsTo
    {
        return $this->belongsTo(catelogue::class);
    }

   
}
