<?php
/**
 * LoggerTest
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Loggy
 * @package   Loggy\Tests
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\Loggy\Tests;

use Resty\Loggy\Logger;
use Resty\Loggy\Handler\Dummy;
// PSR
use Psr\Log\LoggerInterface;
// PHPUnit
use PHPUnit\Framework\TestCase;

/**
 * LoggerTest
 *
 * @category  Loggy
 * @package   Loggy\Tests
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class LoggerTest extends TestCase
{
    protected static $logger = null;
    protected static $channel = 'mychannel';
    protected static $level = Logger::DEBUG;
    protected static $handlers = [];
    protected static $message = 'my custom message';
    protected static $context = [
        'file' => __FILE__,
        'line' => __LINE__
    ];
    /**
     * [setUpBeforeClass description]
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        static::$handlers = [new Dummy(static::$level)];
    }
    /**
     * Test get method
     * 
     * @return void
     */
    public function testGet()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertInstanceOf('\Resty\Loggy\Logger', $logger);
    }
    /**
     * Test generateUid method. Testea que devuelva el mismo uid en invocaciones sucesivas
     * 
     * @return void
     */
    public function testGenerateUidEquals()
    {
        $ref = new \ReflectionMethod('\Resty\Loggy\Logger', 'generateUid');
        $ref->setAccessible(true);
        $uid1 = $ref->invoke(null);
        $uid2 = $ref->invoke(null);
        $this->assertEquals($uid1, $uid2);
        $this->assertEquals(32, strlen($uid2));
    }
    /**
     * Test generateUid method.
     * 
     * @return void
     */
    public function testGenerateUidLength()
    {
        $ref = new \ReflectionMethod('\Resty\Loggy\Logger', 'generateUid');
        $ref->setAccessible(true);
        $uid = $ref->invoke(null);
        $this->assertEquals(32, strlen($uid));
    }
    /**
     * Test setUid method
     * 
     * @return void
     */
    public function testSetUid()
    {
        $logger = Logger::get("myChannel", static::$handlers);

        $ref = new \ReflectionMethod('\Resty\Loggy\Logger', 'generateUid');
        $ref->setAccessible(true);
        $uid = $ref->invoke(null);

        $this->assertAttributeEquals($uid, 'uid', $logger);
    }
    /**
     * Test setHandlers method
     * 
     * @return void
     */
    public function testSetHandlers()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertAttributeEquals(static::$handlers, 'handlers', $logger);
    }
    /**
     * Test setChannel method
     * 
     * @return void
     */
    public function testSetChannel()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertAttributeEquals("myChannel", 'channel', $logger);
    }
}
