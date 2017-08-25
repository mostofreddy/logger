<?php
/**
 * Logger
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Loggy
 * @package   Loggy
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\Loggy;

// Logger
use Resty\Loggy\LogLevelTrait;
use Resty\Loggy\LoggerTrait;
// PSR
use Psr\Log\LoggerInterface;

/**
 * Logger
 *
 * @category  Loggy
 * @package   Loggy
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

    /********************************************************************************
     * Constructor
     *******************************************************************************/

    /**
     * Construye un logger
     * 
     * @param string $channel  [description]
     * @param [type] $handlers [description]
     * 
     * @return [type]           [description]
     */
    public static function get(string $channel, array $handlers)
    {
        $logger = new static();
        return $logger->setUid(static::generateUid())
            ->setHandlers($handlers)
            ->setChannel($channel);
    }

    /**
     * Genera un identificador único para todos los logs de un request
     *
     * @return string
     */
    public static function generateUid():string
    {
        static $uid = null;
        if ($uid === null) {
            $now = \DateTime::createFromFormat('U.u', microtime(true), static::timezone());
            $uid = md5($now->format("Y-m-d\TH:i:s.uO"));
        }
        return $uid;
    }

    /**
     * Devuelve el timezone
     * 
     * @return \DateTimeZone
     */
    protected static function timezone()
    {
        static $timezone = null;
        if ($timezone == null) {
            $timezone = new \DateTimeZone('UTC');
        }
        return $timezone;
    }

    /********************************************************************************
     * Setters 
     *******************************************************************************/
    /**
     * Setea el uid
     * 
     * @param string $uid UID
     *
     * @return self
     */
    public function setUid(string $uid)
    {
        $this->uid = $uid;
        return $this;
    }
    /**
     * Setea el nombre del canal, nombre del logger
     * 
     * @param string $channel Nombre
     *
     * @return self
     */
    public function setChannel(string $channel)
    {
        $this->channel = $channel;
        return $this;
    }
    /**
     * Setea los distintos handlers para el logger
     * 
     * @param array $handlers Array de handlers
     *
     * @return self
     */
    public function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;
        return $this;
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
        $dateTime->setTimezone(static::timezone());
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
