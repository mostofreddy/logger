<?php
/**
 * LoggerTest
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Tests
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Mostofreddy\Loggy\Tests;

use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\Dummy;
// PSR
use Psr\Log\LoggerInterface;
// PHPUnit
use PHPUnit\Framework\TestCase;

/**
 * LoggerTest
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Tests
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class LoggerTest extends TestCase
{
    protected static $logger = null;
    protected static $channel = 'mychannels';
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
    public function xtestGet()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertInstanceOf('\Mostofreddy\Loggy\Logger', $logger);
    }
    /**
     * Test generateUid method. Testea que devuelva el mismo uid en invocaciones sucesivas
     * 
     * @return void
     */
    public function testGenerateUidEquals()
    {
        $ref = new \ReflectionMethod('\Mostofreddy\Loggy\Logger', 'generateUid');
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
    public function xtestGenerateUidLength()
    {
        $ref = new \ReflectionMethod('\Mostofreddy\Loggy\Logger', 'generateUid');
        $ref->setAccessible(true);
        $uid = $ref->invoke(null);
        $this->assertEquals(32, strlen($uid));
    }
    /**
     * Test setUid method
     * 
     * @return void
     */
    public function xtestSetUid()
    {
        $logger = Logger::get("myChannel", static::$handlers);

        $ref = new \ReflectionMethod('\Mostofreddy\Loggy\Logger', 'generateUid');
        $ref->setAccessible(true);
        $uid = $ref->invoke(null);

        $this->assertAttributeEquals($uid, 'uid', $logger);
    }
    /**
     * Test setHandlers method
     * 
     * @return void
     */
    public function xtestSetHandlers()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertAttributeEquals(static::$handlers, 'handlers', $logger);
    }
    /**
     * Test setChannel method
     * 
     * @return void
     */
    public function xtestSetChannel()
    {
        $logger = Logger::get("myChannel", static::$handlers);
        $this->assertAttributeEquals("myChannel", 'channel', $logger);
    }
}
