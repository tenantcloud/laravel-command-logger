<?php

namespace TenantCloud\CommandLogger;

use Illuminate\Support\ServiceProvider;

/**
 * Class CommandLoggerServiceProvider
 * @package TenantCloud\CommandLogger
 */
class CommandLoggerServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Publishing is only necessary when using the CLI.
		if ($this->app->runningInConsole()) {

			// Publishing the configuration file.
			$this->publishes([
				__DIR__ . '/../config/commandlogger.php' => config_path('commandlogger.php'),
			], 'commandlogger.config');

			$this->registerMigrations();
		}

		app(Logger::class)->init();
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

	/**
	 * Register CommandLogger migration file.
	 */
	protected function registerMigrations()
	{
		if (config('commandlogger.runs_migrations')) {
			$this->loadMigrationsFrom(__DIR__.'/../migrations');
		}
	}
}
