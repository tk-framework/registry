<?php
/**
 * Copyright by Timon Kreis - All Rights Reserved
 * Visit https://www.timonkreis.de
 */
declare(strict_types = 1);

use TimonKreis\Framework;

/**
 * @category tk-framework
 * @package registry
 */
class RegistryCest
{
	/**
	 * @param Framework\Test\UnitTester $I
	 */
	public function testGetterMethodWithDefaultValue(Framework\Test\UnitTester $I)
	{
		$I->assertNull(Framework\Registry\Registry::get('test'));
		$I->assertEquals(__FUNCTION__, Framework\Registry\Registry::get('test', __FUNCTION__));
	}

	/**
	 * @param Framework\Test\UnitTester $I
	 */
	public function testSetterMethod(Framework\Test\UnitTester $I)
	{
		Framework\Registry\Registry::set('test', __FUNCTION__);

		$I->assertEquals(__FUNCTION__, Framework\Registry\Registry::get('test'));
		$I->assertEquals(__FUNCTION__, Framework\Registry\Registry::get('test', 'test'));
	}

	/**
	 * @param Framework\Test\UnitTester $I
	 */
	public function testIssetMethod(Framework\Test\UnitTester $I)
	{
		$I->assertFalse(Framework\Registry\Registry::isset(__FUNCTION__));

		Framework\Registry\Registry::set(__FUNCTION__, __FUNCTION__);

		$I->assertTrue(Framework\Registry\Registry::isset(__FUNCTION__));
	}

	/**
	 * @param Framework\Test\UnitTester $I
	 */
	public function testUnsetMethod(Framework\Test\UnitTester $I)
	{
		Framework\Registry\Registry::set(__FUNCTION__, __FUNCTION__);

		$I->assertTrue(Framework\Registry\Registry::isset(__FUNCTION__));

		Framework\Registry\Registry::unset(__FUNCTION__);

		$I->assertFalse(Framework\Registry\Registry::isset(__FUNCTION__));
	}

	/**
	 * @param Framework\Test\UnitTester $I
	 */
	public function testResetMethod(Framework\Test\UnitTester $I)
	{
		$key1 = __FUNCTION__ . '1';
		$key2 = __FUNCTION__ . '2';

		Framework\Registry\Registry::set($key1, __FUNCTION__);
		Framework\Registry\Registry::set($key2, __FUNCTION__);

		$I->assertTrue(Framework\Registry\Registry::isset($key1));
		$I->assertTrue(Framework\Registry\Registry::isset($key1));

		Framework\Registry\Registry::reset();

		$I->assertFalse(Framework\Registry\Registry::isset($key1));
		$I->assertFalse(Framework\Registry\Registry::isset($key2));
	}
}
