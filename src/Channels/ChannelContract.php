<?php


namespace TenantCloud\CommandLogger\Channels;

interface ChannelContract
{
	public function handleLog(string $commandSignature, float $executionTime, int $memoryPeak);
}
