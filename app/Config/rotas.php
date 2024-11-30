<?php

use App\Controllers\TesteController;

$rotas = \Hefestos\Rotas\Rota::instancia();
/* ----------------------------------------------------------------------
Cada rota deve ser respondida com o retorno de uma função, seja ela uma
função anonima ou um metodo de controller. Consulte a documentação.
---------------------------------------------------------------------- */


use App\Controllers\DashboardController;
use App\Controllers\UsuarioController;
use App\Controllers\ReceitaController;
use App\Controllers\DespesaController;
use App\Controllers\MetaController;
use App\Controllers\HistoricoController;

$rotas->get('/', function () {
    return view('landing_page');
});

$rotas->get('/cadastro', fn() => ($_SESSION ? sessao()->destruir() : null) ?? view('auth/cadastro'));

$rotas->get('/login', fn() => ($_SESSION ? sessao()->destruir() : null) ?? view('auth/login'));

$rotas->get('/dashboard', [DashboardController::class, 'index'])->filtro('logado');

$rotas->post('/cadastro', [UsuarioController::class, 'cadastro']);
$rotas->post('/login', [UsuarioController::class, 'login']);
$rotas->get('/logout', [UsuarioController::class, 'logout']);
$rotas->delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

$rotas->get('/receitas', [ReceitaController::class, 'index']);
$rotas->get('/receitas/novo', [ReceitaController::class, 'create']);
$rotas->post('/receitas', [ReceitaController::class, 'store']);
$rotas->delete('/receitas/{id}', [ReceitaController::class, 'destroy']);

$rotas->get('/despesas', [DespesaController::class, 'index']);
$rotas->get('/despesas/novo', [DespesaController::class, 'create']);
$rotas->post('/despesas', [DespesaController::class, 'store']);
$rotas->delete('/despesas/{id}', [DespesaController::class, 'destroy']);

$rotas->get('/metas', [MetaController::class, 'index']);
$rotas->get('/metas/novo', [MetaController::class, 'create']);
$rotas->post('/metas', [MetaController::class, 'store']);
$rotas->delete('/metas/{id}', [MetaController::class, 'destroy']);

$rotas->get('/historico', [HistoricoController::class, 'index']);
