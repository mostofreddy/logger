<?php
/**
 * Dummy
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Mostofreddy\Loggy\Handler;

use Mostofreddy\Loggy\Handler\AbstractHandler;
use Mostofreddy\Loggy\Exception\DirOutputNotWritableException;
use Mostofreddy\Loggy\Exception\FileNotWritableException;
/**
 * Dummy
 *
 * No escribe en ningún lado
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class Dummy extends AbstractHandler
{
    /**
     * Configura el handler
     * 
     * @param array $config Configuración.
     * 
     * @return AbstractHandler
     */
    public function config(array $config = []):AbstractHandler
    {
        return $this;
    }
    /**
     * Escribe el mensaje en la salida
     * 
     * @param string $message Mensaje
     * 
     * @return void
     */
    public function write(string $message)
    {
    }

}
