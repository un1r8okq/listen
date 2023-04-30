<?php

use App\Models\AppRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::middleware(['throttle:web'])->group(function () {
    Route::get('/', function () {
        return redirect('/all');
    });

    Route::get('/all', function () {
        return view('all', [
            'requests' => AppRequest::query()
                ->with('userAgent')
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    });

    Route::get('/by-ip', function () {
        return view('by-ip', [
            'ips' => DB::table('app_requests')
                ->selectRaw('ip_address, count(*) as num_requests')
                ->groupBy('ip_address')
                ->orderBy('num_requests', 'desc')
                ->paginate(10),
        ]);
    });

    Route::get('/by-url', function () {
        return view('by-url', [
            'urls' => DB::table('app_requests')
                ->selectRaw('url, count(*) as num_requests')
                ->groupBy('url')
                ->orderBy('num_requests', 'desc')
                ->paginate(10),
        ]);
    });
});
