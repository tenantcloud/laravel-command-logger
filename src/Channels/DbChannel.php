<?php


namespace TenantCloud\CommandLogger\Channels;

use Illuminate\Support\Facades\DB;

class DbChannel implements ChannelContract
{
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak)
	{
		DB::table(config('commandlogger.db_table'))->insert([
			'signature' => $commandSignature,
			'execution_time' => $executionTime,
			'memory_peak' => $memoryPeak,
			'created_at' => now()
		]);
	}
}
