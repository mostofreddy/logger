<?php
/**
 * AbstractHandler
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

use Mostofreddy\Loggy\Exception\DirOutputNotWritableException;
use Mostofreddy\Loggy\Exception\FileNotWritableException;
/**
 * AbstractHandler
 *
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 * @abstract
 */
abstract class AbstractHandler
{
    protected $levelEnabled = null;
    /**
     * Constructor
     *
     * @param string $levelEnabled Log level enabled
     */
    public function __construct($levelEnabled)
    {
        $this->levelEnabled = $levelEnabled;
    }

    /**
     * Configura el handler
     * 
     * @param array $config Configuración
     * 
     * @return AbstractHandler
     * 
     * @abstract
     */
    abstract public function config(array $config = []):AbstractHandler;
    /**
     * Escribe el mensaje en la salida
     * 
     * @param string $message Mensaje
     * 
     * @return void
     *
     * @abstract
     */
    abstract public function write(string $message);

    /**
     * Indica si el nivel de log esta habilitado
     *
     * @param int $level Nivel de log a loggear
     *
     * @return bool
     */
    protected function isValidLogLevel(int $level):bool
    {
        return $level <= $this->levelEnabled;
    }

    /**
     * Escrible el log al destino
     *
     * @param string $level   Log level
     * @param string $message Mensaje
     *
     * @return void
     */
    public function __invoke(int $level, string $message)
    {
        if ($this->isValidLogLevel($level)) {
            $this->write($message);
        }
    }
}
