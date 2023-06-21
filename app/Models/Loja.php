<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Endereco;

class Loja extends Model
{
    use HasFactory;
    protected $table = 'loja';
    public $timestamps = false;

    public function endereco(): BelongsTo
    {
       return $this->belongsTo(Endereco::class);
    }

}
