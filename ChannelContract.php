<?php


namespace TenantCloud\CommandLogger\Channels;

/**
 * Interface ChannelContract
 * @package TenantCloud\CommandLogger\Channels
 */
interface ChannelContract
{
	/**
	 * @param string $commandSignature
	 * @param float $executionTime
	 * @param int $memoryPeak
	 * @param string $host
	 * @return mixed
	 */
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak, string $host);
}
