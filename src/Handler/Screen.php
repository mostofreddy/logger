<?php
/**
 * Screen
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Loggy
 * @package   Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\Loggy\Handler;

use Resty\Loggy\Handler\AbstractHandler;

/**
 * Screen
 *
 * Escribe el log en pantalla
 *
 * @category  Loggy
 * @package   Loggy\Handler
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class Screen extends AbstractHandler
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
     * Escrible el log al destino
     *
     * @param string $message Mensaje
     *
     * @return void
     */
    public function write(string $message)
    {
        echo $message.PHP_EOL;
    }
}
