<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Loja;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedor';
    public $timestamps = false;

    public function loja(): BelongsTo
    {
       return $this->belongsTo(Loja::class);
    }
}
