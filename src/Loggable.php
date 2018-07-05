<?php


namespace TenantCloud\CommandLogger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TenantCloud\CommandLogger\Channels\ChannelContract;
use TenantCloud\CommandLogger\Channels\DbChannel;

trait Loggable
{
	protected function initialize(InputInterface $input, OutputInterface $output)
	{
		$this->init();
		return parent::initialize($input, $output);
	}

	private function init()
	{
		$timeStarted = microtime(true);

		$command = $this;

		app()->terminating(function () use ($timeStarted, $command) {
			$timeFinished = microtime(true);

			$executionTime = round($timeFinished - $timeStarted, 3);

			$memoryPeak = memory_get_peak_usage(true) / 1048576;

			foreach (config('commandlogger.channels') as $channelClass) {
				app($channelClass)->handleLog($command->signature, $executionTime, (int)$memoryPeak);
			}
		});
	}
}
