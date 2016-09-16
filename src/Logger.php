<?php
/**
 * Logger
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

// Logger
use Mostofreddy\Logger\LogLevelTrait;
use Mostofreddy\Logger\LoggerTrait;
// PSR
use Psr\Log\LoggerInterface;

/**
 * Logger
 *
 * @category  Mostofreddy\Logger
 * @package   Mostofreddy\Logger
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class Logger implements LoggerInterface
{
    use LogLevelTrait;
    use LoggerTrait;

    const EMERGENCY = 1;
    const ALERT = 2;
    const CRITICAL = 4;
    const ERROR = 8;
    const WARNING = 16;
    const NOTICE = 32;
    const INFO = 64;
    const DEBUG = 128;

    protected $uid = '';
    protected $handlers = [];
    protected $channel = '';
    protected $timezone = null;

    /********************************************************************************
     * Constructor
     *******************************************************************************/

    /**
     * Constructor
     *
     * @param string $channel  Nombre del canal
     * @param array  $handlers Colección de handlers para el canal. Defecto: []
     */
    public function __construct(string $channel, array $handlers = [])
    {
        $this->channel = $channel;
        $this->uid = $this->generateUid();
        $this->handlers = $handlers;
        $this->timezone = new \DateTimeZone('UTC');
    }

    /**
     * Genera un identificador único para todos los logs de un request
     *
     * @return string
     */
    protected function generateUid():string
    {
        return md5(date('YmdHij'));
    }

    /********************************************************************************
     * Handler 
     *******************************************************************************/

    /**
     * Publica un mensaje 
     * 
     * @param int    $level   Log Level
     * @param string $message Mensaje
     * @param array  $context Contexto
     * 
     * @return Logger
     */
    public function log($level, $message, array $context = array()):Logger
    {
        $msg = $this->formatMessage($level, $message, $context);
        foreach ($this->handlers as $handler) {
            $handler($level, $msg);
        }
        return $this;
    }

    /**
     * Renderiza el formato del mensaje
     * 
     * @param int    $level   Log Level
     * @param string $message Mensaje
     * @param array  $context Contecto
     * 
     * @return string
     */
    public function formatMessage($level, string $message, array $context = array()):string
    {

        $dateTime = new \DateTime();
        $dateTime->setTimezone($this->timezone);
        return $dateTime->format('[c]')
            ." ".$this->getLogLevelName($level)
            ." @".$this->channel
            ." uid:".$this->uid
            ." - "
            .$message
            ." - "
            .json_encode($context);
    }
}
