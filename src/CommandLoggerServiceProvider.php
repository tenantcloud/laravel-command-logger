<?php

namespace TenantCloud\CommandLogger;

use Illuminate\Support\ServiceProvider;
use TenantCloud\CommandLogger\Channels\ChannelContract;

class CommandLoggerServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tenantcloud');
		// $this->loadViewsFrom(__DIR__.'/../resources/views', 'tenantcloud');
		// $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
		// $this->loadRoutesFrom(__DIR__.'/routes.php');

		// Publishing is only necessary when using the CLI.
		if ($this->app->runningInConsole()) {

			// Publishing the configuration file.
			$this->publishes([
				__DIR__ . '/../config/commandlogger.php' => config_path('commandlogger.php'),
			], 'commandlogger.config');

			$this->loadMigrationsFrom(__DIR__.'/../migrations');




			// Publishing the views.
			/*$this->publishes([
			    __DIR__.'/../resources/views' => base_path('resources/views/vendor/tenantcloud'),
			], 'commandlogger.views');*/

			// Publishing assets.
			/*$this->publishes([
			    __DIR__.'/../resources/assets' => public_path('vendor/tenantcloud'),
			], 'commandlogger.views');*/

			// Publishing the translation files.
			/*$this->publishes([
			    __DIR__.'/../resources/lang' => resource_path('lang/vendor/tenantcloud'),
			], 'commandlogger.views');*/

			// Registering package commands.
			// $this->commands([]);
		}
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/commandlogger.php', 'commandlogger');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['commandlogger'];
	}
}
