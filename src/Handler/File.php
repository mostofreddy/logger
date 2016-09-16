<?php
/**
 * File
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
 * File
 *
 * Escribe el log en un archivo físico
 * 
 * @category  Mostofreddy\Loggy
 * @package   Mostofreddy\Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class File extends AbstractHandler
{
    const LOG_EXT = '.log';
    protected $output = null;
    
    /**
     * Configura el handler
     * 
     * @param array $config Configuración.
     *                          + [output] => directorio de salida. Defecto: /tmp
     *                          + [fileName] => nombre del archivo del log. Defecto: log
     * 
     * @return AbstractHandler
     */
    public function config(array $config = []):AbstractHandler
    {
        $config = $config + ['output' => '/tmp', 'fileName' => 'log'];
        $this->output = rtrim($config['output'], '/').'/'.$config['fileName'].static::LOG_EXT;
        $this->validateOutput();
        return $this;
    }

    /**
     * Valida el directorio de salida
     *
     * @throws FileNotWritableException      Cuando el archivo de salida del handler File existe y no tiene permisos de escritura
     * @throws DirOutputNotWritableException Cuando el directorio de salida del handler File existe y no tiene permisos de escritura
     * 
     * @return bool
     */
    protected function validateOutput():bool
    {
        $dir = dirname($this->output);

        if (!is_dir($dir) || !is_writable($dir)) {
            throw new DirOutputNotWritableException();
        }

        if (is_file($this->output) && !is_writable($this->output)) {
            throw new FileNotWritableException();
        }
        return true;
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
        error_log($message.PHP_EOL, 3, $this->output);
    }
}
