<?php

return [
	/**
	 * Channels which will be used to save log about command
	 *
	 * Available options:
	 * \TenantCloud\CommandLogger\Channels\DbChannel::class
	 * \TenantCloud\CommandLogger\Channels\FileChannel::class
	 * etc.
	 */
	'channels' => [
		\TenantCloud\CommandLogger\Channels\DbChannel::class,
		\TenantCloud\CommandLogger\Channels\FileChannel::class
	],

	'db_table' => 'command_log'
];
