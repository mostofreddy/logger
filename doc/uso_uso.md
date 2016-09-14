Uso
===


Cómo loguear en distintos canales
----------------------------------


```
$handlerFileDebug = (new File(Logger::DEBUG))->config(['output' => '/tmp', 'fileName' => 'debug']);
$handlerFileTracking = (new File(Logger::DEBUG))->config(['output' => '/tmp', 'fileName' => 'tracking']);


$logger = new Logger("myLogForDebug", [$handlerFileDebug]);
$loggerTraking = new Logger("myLogForTracking", [$handlerFileTracking]);


$logger->debug("my debug log");
$loggerTraking(' my tracking', ["line" => __LINE__, "file" => __FILE__, "method" => __METHOD__, "class" => __CLASS__]);


```
