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
class LoggerLevelTraitTest extends TestCase
{
    /**
     * Test getLogLevelName - Emergency
     * 
     * @return void
     */
    public function testGetLogLevelNameEmergency()
    {
        $logger = new Logger;
        $level = $logger->getLogLevelName(Logger::EMERGENCY);

        $this->assertEquals("EMERGENCY", $level);
    }

    /**
     * Test getLogLevelName - Alert
     * 
     * @return void
     */
    public function testGetLogLevelNameAlert()
    {
        $logger = new Logger;
        $level = $logger->getLogLevelName(Logger::ALERT);

        $this->assertEquals("ALERT", $level);
    }

    /**
     * Test getLogLevelName - Critical
     * 
     * @return void
     */
    public function testGetLogLevelNameCritical()
    {
        $logger = new Logger;
        $level = $logger->getLogLevelName(Logger::CRITICAL);

        $this->assertEquals("CRITICAL", $level);
    }
}
