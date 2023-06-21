<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Loja;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compra';
    public $timestamps = false;
    protected $casts = [
        'data' => 'datetime:Y-m-d',
    ];
    public function cliente(): BelongsTo
    {
       return $this->belongsTo(Cliente::class);
    }

    public function vendedor(): BelongsTo
    {
       return $this->belongsTo(Vendedor::class);
    }

    public function loja(): BelongsTo
    {
       return $this->belongsTo(Loja::class);
    }

}
