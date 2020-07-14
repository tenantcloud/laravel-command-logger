<?php


namespace TenantCloud\CommandLogger\Channels;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class DbChannel
 * @package TenantCloud\CommandLogger\Channels
 */
class DbChannel implements ChannelContract
{
	/**
	 * Saves info into DB table.
	 * Uses table name from config
	 *
	 * @param string $commandSignature
	 * @param float $executionTime
	 * @param int $memoryPeak
	 * @param string $host
	 * @return mixed|void
	 */
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak, string $host)
	{
		$data = [
			'signature' => $commandSignature,
			'execution_time' => $executionTime,
			'memory_peak' => $memoryPeak,
			'host' => $host,
			'created_at' => now()
		];

		$table = config('commandlogger.db_table');

		// check if table was created. For the first php artisan migrate command.
		// Added try catch if DB connection was not established
		try {
			if (Schema::hasTable($table)) {
				DB::table($table)->insert($data);
			}
		} catch (\Exception $e) {}
	}
}
