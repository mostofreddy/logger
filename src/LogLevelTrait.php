<?php
/**
 * LogLevelTrait
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Mostofreddy\Logger
 * @package   Mostofreddy\Logger
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Mostofreddy\Logger;

/**
 * LogLevelTrait
 *
 * @category  Mostofreddy\Logger
 * @package   Mostofreddy\Logger
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
trait LogLevelTrait
{
    protected static $levels = array (
        1 => 'EMERGENCY',
        2 => 'ALERT', 
        4 => 'CRITICAL', 
        8 => 'ERROR', 
        16 => 'WARNING',
        32 => 'NOTICE',
        64 => 'INFO',
        128 => 'DEBUG'
    );
    /**
     * Devuelve el nombre del nivel
     *
     * @param int $level nivel
     *
     * @return string cadena vacia si el nivel solicitado no existe
     */
    public function getLogLevelName($level):string
    {
        return isset(self::$levels[$level])?self::$levels[$level]:'';
    }
}
