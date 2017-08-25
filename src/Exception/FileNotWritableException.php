<?php
/**
 * FileNotWritableException
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Loggy
 * @package   Loggy\Exception
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\Loggy\Exception;

use Resty\Loggy\Exception\LoggerException;

/**
 * FileNotWritableException
 *
 * Se lanza cuando el archivo de salida del handler File existe y no tiene permisos de escritura
 *
 * @category  Loggy
 * @package   Loggy\Exception
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class FileNotWritableException extends LoggerException
{
    const MESSAGE = 'File not writable';

    /**
     * Constructor
     * 
     * @param string         $message  [description]
     * @param integer        $code     [description]
     * @param Exception|null $previous [description]
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct(static::MESSAGE, $code, $previous);
    }
}



