<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Loja;
class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    public $timestamps = false;

    public function loja(): BelongsTo
    {
       return $this->belongsTo(Loja::class);
    }

}
