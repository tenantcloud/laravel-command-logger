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
			$signature = $event->command;

			// filter commands according to config
			if ($signature && !in_array($signature, config('commandlogger.exclude'))) {
				$timeFinished = microtime(true);

				$executionTime = defined('LARAVEL_START') ?
                    round($timeFinished - LARAVEL_START, 2) :
                    0;

				$memoryPeak = memory_get_peak_usage(true) / 1048576;

				foreach (config('commandlogger.channels') as $channelClass) {
					app($channelClass)->handleLog($signature, $executionTime, (int)$memoryPeak, gethostname());
				}
			}
		});
	}
}
