Uso
===


Cómo loguear en distintos canales
----------------------------------


```
$handlerFile = (new File(Logger::DEBUG))->config(['output' => '/tmp']);

$default = Logger::get('defaultChannel', [$handlerFile]);
$dummy = Logger::get('dummyChannel', [$handlerFile]);

$default->debug("default ".rand());
$dummy->debug("dummy ".rand());

```
