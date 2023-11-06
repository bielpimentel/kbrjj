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
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PainelController;


/* ========================= ÁREA PÚBLICA ========================= */

Route::get('/site/torneios', [TournamentController::class, 'torneios']);
Route::get('/site/resultados', [TournamentController::class, 'resultados']);
Route::get('/site/integra/{id}={titulo}', [TournamentController::class, 'integra']);
Route::get('/site/inscricao/{id}', [TournamentController::class, 'inscricao'])->middleware(['auth', 'inscricao']);
Route::post('/site/inscricao/{id}', [TournamentController::class, 'storeInscricao'])->middleware(['auth', 'inscricao']);
Route::get('/site/chave_integra', [TournamentController::class, 'chave_integra']);
Route::get('/site/chave_listagem', [TournamentController::class, 'chave_listagem']); 
Route::get('/', [TournamentController::class, 'index']);

/* ========================= ÁREA ATLETA ========================= */

Route::get('/area_atleta', [CertificateController::class, 'certificados'])->middleware(['auth', 'atleta']);
Route::get('/area_atleta/participacao', [CertificateController::class, 'participacao']);
Route::get('/area_atleta/vitoria', [CertificateController::class, 'vitoria']);
Route::get('/area_atleta/login', [CertificateController::class, 'login']);
Route::get('/area_atleta/recuperar', [CertificateController::class, 'recuperar']);


/* ========================= PAINEL ADM ========================= */

// ------------------------- TORNEIOS ------------------------- //
Route::get('/painel/dashboard', [AdmController::class, 'dashboard'])->middleware('auth');
Route::get('/painel/registro_torneio', [AdmController::class, 'cadastroTorneio'])->middleware('auth');
Route::post('/painel/registro_torneio', [AdmController::class, 'store'])->middleware('auth');
Route::delete('/painel/dashboard/{id}', [AdmController::class, 'destroy'])->middleware('auth');
Route::get('/painel/edicao_torneio/{id}', [AdmController::class, 'edit'])->middleware('auth');
Route::put('/painel/edicao_torneio/{id}', [AdmController::class, 'update'])->middleware('auth');
Route::get('/painel/destaques', [AdmController::class, 'destaques'])->middleware('auth');
// ------------------------- ATLETAS ------------------------- //
Route::get('/painel/atletas', [AdmController::class, 'listaAtletas'])->middleware('auth');
Route::get('/painel/atletas/{id}', [AdmController::class, 'listaAtletas'])->middleware('auth');
Route::delete('/painel/atletas/{id}', [AdmController::class, 'destroyAtleta'])->middleware('auth');
Route::get('/painel/edicao_atleta/{id}', [AdmController::class, 'editAtleta'])->middleware('auth');
Route::put('/painel/edicao_atleta/{id}', [AdmController::class, 'updateAtleta'])->middleware('auth');
// ------------------------- USUÁRIOS ------------------------- //
Route::get('/painel/users', [AdmController::class, 'users'])->middleware('auth');
Route::get('/painel/cadastro', [AdmController::class, 'cadastroUser'])->middleware('auth');
Route::post('/painel/cadastro', [AdmController::class, 'storeUser'])->middleware('auth');
Route::get('/painel/edicao_user/{id}', [AdmController::class, 'editUser'])->middleware('auth');
Route::put('/painel/edicao_user/{id}', [AdmController::class, 'updateUser'])->middleware('auth');
Route::delete('/painel/users/{id}', [AdmController::class, 'destroyUser'])->middleware('auth');


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

// require_once __DIR__ . '/loginKbr.php';