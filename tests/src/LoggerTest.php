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
class LoggerTest extends \PHPUnit_Framework_TestCase
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
        static::$logger = new Logger(static::$channel, static::$handlers);
    }
    /**
     * Testea el metodo constructor
     * 
     * @return void
     */
    public function testConstruct()
    {
        $logger = static::$logger;

        $this->assertAttributeEquals(static::$channel, 'channel', $logger);
        $this->assertAttributeNotEquals('', 'uid', $logger);
        $this->assertAttributeEquals(static::$handlers, 'handlers', $logger);
        $this->assertAttributeInstanceOf('\DateTimeZone', 'timezone', $logger);
    }

    /**
     * Testea el metodo generateUid
     *
     * @depends testConstruct
     * 
     * @return void
     */
    public function testGenerateUid() 
    {
        $logger = static::$logger;

        $ref = new \ReflectionMethod(Logger::CLASS, 'generateUid');
        $ref->setAccessible(true);
        $r = $ref->invoke($logger);
        $this->assertEquals(32, strlen($r));
    }
    /**
     * Testea el metodo formatMessage
     *
     * @depends testConstruct
     * 
     * @return void
     */
    public function testFormatMessageHeader()
    {
        $logger = static::$logger;

        $ref = new \ReflectionMethod(Logger::CLASS, 'formatMessage');
        $ref->setAccessible(true);
        $r = $ref->invokeArgs($logger, [Logger::DEBUG, static::$message, static::$context]);
        list($header, $message, $context) = explode(" - ", $r);

        //header
        $headerSegments = explode(" ", $header);
        //level
        $this->assertEquals($logger->getLogLevelName(Logger::DEBUG), $headerSegments[1]);
        //channel
        $this->assertEquals("@".static::$channel, $headerSegments[2]);
        //uid
        $this->assertEquals(36, strlen($headerSegments[3]));

    }

    /**
     * Testea el metodo formatMessage
     *
     * @depends testConstruct
     * 
     * @return void
     */
    public function testFormatMessageMessage()
    {
        $logger = static::$logger;

        $ref = new \ReflectionMethod(Logger::CLASS, 'formatMessage');
        $ref->setAccessible(true);
        $r = $ref->invokeArgs($logger, [Logger::DEBUG, static::$message, static::$context]);
        list($header, $message, $context) = explode(" - ", $r);

        
        //message
        $this->assertEquals(static::$message, $message);

    }

    /**
     * Testea el metodo formatMessage
     *
     * @depends testConstruct
     * 
     * @return void
     */
    public function testFormatMessageContext()
    {
        $logger = static::$logger;

        $ref = new \ReflectionMethod(Logger::CLASS, 'formatMessage');
        $ref->setAccessible(true);
        $r = $ref->invokeArgs($logger, [Logger::DEBUG, static::$message, static::$context]);
        list($header, $message, $context) = explode(" - ", $r);
        
        //context
        $this->assertEquals(json_encode(static::$context), $context);
    }
}
