<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Produto;
use App\Models\Compra;

class Itemcompra extends Model
{
    use HasFactory;
    protected $table = 'itemcompra';
    public $timestamps = false;

    public function produto(): BelongsTo
    {
       return $this->belongsTo(Produto::class);
    }

    public function compra(): BelongsTo
    {
       return $this->belongsTo(Compra::class);
    }
}
