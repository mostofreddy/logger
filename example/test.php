<?php
/**
 * Test
 *
 * PHP version 5.3
 *
 * @category  Loggy
 * @package   Loggy
 * @author    Federico Lozada Mosto <federico.mosto@intraway.com>
 * @copyright 2015 Intraway Corp.
 * @license   Intraway Corp. <http://www.intraway.com>
 * @link      http://www.intraway.com
 */

require_once "../vendor/autoload.php";

use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\Screen;
use Mostofreddy\Loggy\Handler\File;

$handlerScreen = new Screen(Logger::DEBUG);
$handlerFile = (new File(Logger::DEBUG))->config(['output' => '/tmp']);


$logger = new Logger("mychannel", [$handlerScreen, $handlerFile, $handlerFile]);

$logger->notice("mensaje de alerta", ['file' => "/tmp/asdasd", "line"=> 45]);
