<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
		'teamstate' => 'App\Http\Middleware\TeamMiddleware',
		'reportstate' => 'App\Http\Middleware\ReportMiddleware',
		'docstate' => 'App\Http\Middleware\DocMiddleware',
		'regstate' => 'App\Http\Middleware\RegMiddleware',
		'home' => 'App\Http\Middleware\HomeMiddleware',
		'admin' => 'App\Http\Middleware\AdminMiddleware',
		'ployssl' => 'App\Http\Middleware\HttpsMiddleware',
		'ploynor' => 'App\Http\Middleware\NormalMiddleware'
	];

}
