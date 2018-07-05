<?php


namespace TenantCloud\CommandLogger;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Support\Facades\Event;

/**
 * Class Logger
 * @package TenantCloud\CommandLogger
 */
class Logger
{
	/**
	 * Initialize event listener.
	 * It listens all commands and saves info after finish.
	 */
	public function init()
	{
		Event::listen(CommandFinished::class, function ($event) {
			$timeFinished = microtime(true);

			$executionTime = round($timeFinished - LARAVEL_START, 2);

			$memoryPeak = memory_get_peak_usage(true) / 1048576;

			foreach (config('commandlogger.channels') as $channelClass) {
				app($channelClass)->handleLog($event->command, $executionTime, (int)$memoryPeak, gethostname());
			}
		});
	}
}
