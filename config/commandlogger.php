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

	/**
	 * Database table name.
	 */
	'db_table' => 'commands_log',

	/**
	 * Array of commands that should be excluded for logging
	 */
	'exclude' => []
];
