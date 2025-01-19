<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\Boleto;
use App\Models\Cliente;
use App\Models\Conductore;
use App\Models\Encomienda;
use App\Models\Horario;
use App\Models\Minibuse;
use App\Models\Ruta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Contacto', function () {
    return view('Contacto');
});
Route::get('/Acercade', function () {
    return view('Acercade');
});
Route::get('/Servicios', function () {
    return view('Servicios');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('mobile')->group(function () {
    Route::post('/register', [App\Http\Controllers\UserController::class, 'Registro']);
    Route::post('/login', [App\Http\Controllers\UserController::class, 'Login']);
    Route::middleware('auth:sanctum')->post('/logout', [App\Http\Controllers\UserController::class, 'Logout']);
});
//Route::post('/register', [App\Http\Controllers\UserController::class, 'Registro']);
//Route::post('/login', [App\Http\Controllers\UserController::class, 'Login']);
//Route::middleware('auth:sanctum')->post('/logout', [App\Http\Controllers\UserController::class, 'Logout']);


//Route::get('/Bus/pdf', [App\Http\Controllers\BusControler::class, 'pdf'])->name('Bus.pdf');
Route::get('/Minibus/pdf', [App\Http\Controllers\MinibusController::class, 'pdf'])->name('Minibus.pdf');
Route::get('/Agencia/pdf', [App\Http\Controllers\AgenciaController::class, 'pdf'])->name('Agencia.pdf');
Route::get('/AsignarMinibus/pdf', [App\Http\Controllers\AsignarMinibusController::class, 'pdf'])->name('AsignarMinibus.pdf');
Route::get('/Mapa/pdf', [App\Http\Controllers\MapaController::class, 'pdf'])->name('Mapa.pdf');
Route::get('/Conductor/pdf', [App\Http\Controllers\ConductorController::class, 'pdf'])->name('Conductor.pdf');
Route::get('/Ruta/pdf', [App\Http\Controllers\RutaController::class, 'pdf'])->name('Ruta.pdf');
Route::get('/Horario/pdf', [App\Http\Controllers\HorarioController::class, 'pdf'])->name('Horario.pdf');
Route::get('/Cliente/pdf', [App\Http\Controllers\ClienteController::class, 'pdf'])->name('Cliente.pdf');
Route::get('/Boleto/pdf', [App\Http\Controllers\BoletoController::class, 'pdf'])->name('Boleto.pdf');
Route::get('/Encomienda/pdf', [App\Http\Controllers\EncomiendaController::class, 'pdf'])->name('Encomienda.pdf');

//Route::get('/Boleto/pdfMinibus/{minibusId}', [App\Http\Controllers\BoletoController::class, 'pdfMinibus'])->name('Boleto.pdfMinibus');
Route::get('/pdfMinibus/{horarioId}', [App\Http\Controllers\BoletoController::class, 'pdfMinibus'])->name('Boleto.pdfMinibus');



Route::get('/Boleto/{id_horario}', [App\Http\Controllers\BoletoController::class, 'create'])->name('Boleto.create');
Route::put('/Encomienda/{id}/estado', [App\Http\Controllers\EncomiendaController::class, 'ActualizarEstado']);



Route::get('/user/show1', function () {
    return view('welcome');
});

Route::get('/api/map-marker', 'App\Http\Controller@mapMarker');

Route::resource('Usuarios', 'App\Http\Controllers\UsuarioController');
Route::resource('Roles', 'App\Http\Controllers\RolController');
Route::resource('Permisos', 'App\Http\Controllers\PermisosController');

Route::resource('Agencia', 'App\Http\Controllers\AgenciaController');
Route::resource('AsignarMinibus', 'App\Http\Controllers\AsignarMinibusController');
Route::resource('Minibus', 'App\Http\Controllers\MinibusController');
Route::resource('Mapa', 'App\Http\Controllers\MapaController');
Route::resource('Mapa2', 'App\Http\Controllers\MapBoxController');
Route::resource('Conductor', 'App\Http\Controllers\ConductorController');
Route::resource('Ruta', 'App\Http\Controllers\RutaController');
Route::resource('Horario', 'App\Http\Controllers\HorarioController');
Route::resource('Cliente', 'App\Http\Controllers\ClienteController');
Route::resource('Boleto', 'App\Http\Controllers\BoletoController');
Route::resource('Encomienda', 'App\Http\Controllers\EncomiendaController');

Route::resource('dash', 'App\Http\Controllers\DashboardController');
Route::get('dash', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('api/conductores/count', function () {
    return response()->json(['conductores' => Conductore::count()]);
});
Route::get('api/minibuses/count', function () {
    return response()->json(['minibuses' => Minibuse::count()]);
});
Route::get('api/rutas/count', function () {
    return response()->json(['rutas' => Ruta::count()]);
});
Route::get('api/clientes/count', function () {
    return response()->json(['clientes' => Cliente::count()]);
});
Route::get('api/horarios/count', function () {
    return response()->json(['horarios' => Horario::count()]);
});
Route::get('api/boletos/count', function () {
    return response()->json(['boletos' => Boleto::count()]);
});
Route::get('api/encomiendas/count', function () {
    return response()->json(['encomiendas' => Encomienda::count()]);
});


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dash.index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});
