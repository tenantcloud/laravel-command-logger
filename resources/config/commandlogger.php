<?php

use TenantCloud\CommandLogger\Channels\DbChannel;
use TenantCloud\CommandLogger\Channels\FileChannel;

return [
	/*
	 * Channels which will be used to save log about command
	 *
	 * Available options:
	 * \TenantCloud\CommandLogger\Channels\DbChannel::class
	 * \TenantCloud\CommandLogger\Channels\FileChannel::class
	 * etc.
	 */
	'channels' => [
		DbChannel::class,
		FileChannel::class,
	],

	/*
	 * Database table name.
	 */
	'db_table' => 'commands_log',

	/*
	 * Indicates if CommandLogger migrations will be run.
	 */
	'runs_migrations' => true,

	/*
	 * Array of commands that should be excluded for logging
	 */
	'exclude' => [],
];
