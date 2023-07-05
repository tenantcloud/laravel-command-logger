<?php

namespace TenantCloud\CommandLogger\Channels;

class FileChannel implements ChannelContract
{
	/**
	 * Save data into log file
	 *
	 * @return mixed|void
	 */
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak, string $host)
	{
		$data = [
			'Signature'   => $commandSignature,
			'Time'        => $executionTime,
			'Memory peak' => $memoryPeak,
			'Host'        => $host,
		];

		info('Command executed', $data);
	}
}
