<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Cliente;
use App\Models\Vendedor;


class CheckConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $clienteExist = Schema::hasTable('cliente');
        $endereco = Schema::hasTable('endereco');
        $vendedor = Schema::hasTable('vendedor');
        $compra = Schema::hasTable('compra');
        $itemCompra = Schema::hasTable('itemCompra');
        $loja = Schema::hasTable('loja');
        $banco = DB::connection()->getPdo();

        $tabelasFaltantes = [
            'clienteExist' => $userExist,
            'endereco' => $endereco,
            'vendedor' => $vendedor,
            'compra' => $compra,
            'itemCompra' => $itemCompra,
            'loja' => $loja,
            'banco' => $banco,
        ];
        if ($loja && $itemCompra && $vendedor && $endereco && $userExist) {
            $userCreate = Cliente::exists();
            if ($userCreate) {
                return $next($request);
            } else {
                $cliente = Cliente::find(0);
                if (!$cliente) {
                    $novoCliente = new Cliente();
                    $novoCliente->id = 0; // Defina o ID do cliente como 0 para evitar quebra de no cadastro do carro sem cliente
                    $novoCliente->nome = 'Sem cadastro';
                    $novoCliente->telefone = '0000000000';
                    $novoCliente->email = 'Sem email';
                    $novoCliente->cpf = '00000000000';
                    $novoCliente->save();
                }

                return redirect()->route('firstUser');
            }
        } else {
            return redirect()->route('tabelas')->with('tabelas', json_encode($tabelasFaltantes));
        }


    }
}
