<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\PainelController;


/* ---------- ÁREA PÚBLICA ---------- */

Route::get('/site/torneios', [TournamentController::class, 'torneios']);
Route::get('/site/resultados', [TournamentController::class, 'resultados']);
Route::get('/site/integra/{id}={titulo}', [TournamentController::class, 'integra']);
Route::get('/site/inscricao/{id}', [TournamentController::class, 'inscricao'])->middleware('auth');
Route::post('/site/inscricao/{id}', [TournamentController::class, 'storeInscricao'])->middleware('auth');
Route::get('/site/chave_integra', [TournamentController::class, 'chave_integra']);
Route::get('/site/chave_listagem', [TournamentController::class, 'chave_listagem']); 
Route::get('/', [TournamentController::class, 'index']);

/* ---------- ÁREA ATLETA ---------- */

Route::get('/site/area_atleta/area_restrita', [TournamentController::class, 'restrita']);
Route::get('/site/area_atleta/participacao', [TournamentController::class, 'participacao']);
Route::get('/site/area_atleta/vitoria', [TournamentController::class, 'vitoria']);
Route::get('/site/area_atleta/login', [TournamentController::class, 'login']);
Route::get('/site/area_atleta/recuperar', [TournamentController::class, 'recuperar']);

/* ---------- PAINEL ADM ---------- */

Route::get('/painel/dashboard', [AdmController::class, 'dashboard'])->middleware('auth');
Route::get('/painel/registro_torneio', [AdmController::class, 'cadastroTorneio'])->middleware('auth');
Route::post('/painel/registro_torneio', [AdmController::class, 'store'])->middleware('auth');
Route::delete('/painel/dashboard/{id}', [AdmController::class, 'destroy'])->middleware('auth');
Route::get('/painel/edicao_torneio/{id}', [AdmController::class, 'edit'])->middleware('auth');
Route::put('/painel/edicao_torneio/{id}', [AdmController::class, 'update'])->middleware('auth');
Route::get('/painel/destaques', [AdmController::class, 'destaques'])->middleware('auth');
Route::get('/painel/atletas', [AdmController::class, 'listaAtletas'])->middleware('auth');
Route::get('/painel/users', [AdmController::class, 'users'])->middleware('auth');
Route::get('/painel/cadastro', [AdmController::class, 'cadastroUser'])->middleware('auth');
Route::post('/logout', [PainelController::class, 'deslogarPainel'])->name('logout');
Route::get('/logout', [PainelController::class, 'getLogout']);


/* ---------- CONTROLES DE PERMISSÃO ---------- */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::delete('/painel/dashboard/{id}', [AdmController::class, 'destroy'])->middleware('can:admin');

    Route::post('/painel/registro_torneio', [AdmController::class, 'store'])->middleware('can:admin');

    Route::get('/painel/registro_torneio', [AdmController::class, 'cadastroTorneio'])->middleware('can:admin');

    Route::get('/painel/edicao_torneio/{id}', [AdmController::class, 'edit'])->middleware('can:admin');

    Route::put('/painel/edicao_torneio/{id}', [AdmController::class, 'update'])->middleware('can:admin');
    
    Route::get('/painel/destaques', [AdmController::class, 'destaques'])->middleware('can:admin');
});

require_once __DIR__ . '/loginKbr.php';