<?php
/**
 * Simple example
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */

require_once "../vendor/autoload.php";

use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\Screen;
use Mostofreddy\Loggy\Handler\File;

$handlerFile = (new File(Logger::DEBUG))->config(['output' => '/tmp']);

$default = Logger::get('default', [$handlerFile]);
$dummy = Logger::get('dummy', [$handlerFile]);

$default->debug("default ".rand());
$dummy->debug("dummy ".rand());
