<?php


namespace TenantCloud\CommandLogger\Channels;

use Illuminate\Support\Facades\DB;

class FileChannel implements ChannelContract
{
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak)
	{
		info('Command executed', [
			'Signature' => $commandSignature,
			'Time' => $executionTime,
			'Memory peak' => $memoryPeak
		]);
	}
}
