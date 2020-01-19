<?php
/**
 * Copyright by Timon Kreis - All Rights Reserved
 * Visit https://www.timonkreis.de
 */
declare(strict_types = 1);

namespace TimonKreis\Framework\Registry;

use TimonKreis\Framework;

/**
 * @category tk-framework
 * @package registry
 */
class Registry
{
	/**
	 * @var array
	 */
	protected static $registry = [];

	/**
	 * Get a key value
	 *
	 * @param string|null $key
	 * @param mixed $default
	 * @return mixed
	 */
	public static function get(string $key = null, $default = null)
	{
		if ($key === null) {
			return self::$registry;
		}

		return self::$registry[$key] ?? $default;
	}

	/**
	 * Set a key value
	 *
	 * @param string $key
	 * @param $value
	 */
	public static function set(string $key, $value = null) : void
	{
		if ($value === null) {
			self::unset($key);
		}
		else {
			self::$registry[$key] = $value;
		}
	}

	/**
	 * Check if a key exists
	 *
	 * @param string $key
	 * @return bool
	 */
	public static function isset(string $key) : bool
	{
		return array_key_exists($key, self::$registry);
	}

	/**
	 * Delete a specific key
	 *
	 * @param string $key
	 */
	public static function unset(string $key) : void
	{
		unset(self::$registry[$key]);
	}

	/**
	 * Reset all keys
	 */
	public static function reset() : void
	{
		self::$registry = [];
	}
}
