Handlers
========

| Namespace | Class | Descripción |
|---|---|---|---|---|
| \Mostofreddy\Logger\Handler | Screen | Escribe el log en pantalla |
| \Mostofreddy\Logger\Handler | File | Escribe el log en un archivo físico |
| \Mostofreddy\Logger\Handler | Dummy | No escribe en ningún lado |



Screen
------

```
use Mostofreddy\Logger\Logger;
use Mostofreddy\Logger\Handler\Screen;

$handlerScreen = new Screen(Logger::DEBUG);

$logger = new Logger("mychannel", [$handlerScreen]);
```

File
------

### Configuración

| Parametro | Descripción |
|---|---|
| \Mostofreddy\Logger\Handler | Screen | Escribe el log en pantalla |
| \Mostofreddy\Logger\Handler | File | Escribe el log en un archivo físico |
| \Mostofreddy\Logger\Handler | Dummy | No escribe en ningún lado |

```
use Mostofreddy\Logger\Logger;
use Mostofreddy\Logger\Handler\File;

$handlerFile = (new File(Logger::DEBUG))->config(['output' => '/tmp','fileName' => 'tracking']);

$logger = new Logger("mychannel", [$handlerFile]);
```

Dummy
------

```
use Mostofreddy\Logger\Logger;
use Mostofreddy\Logger\Handler\Dummy;

$handlerDummy = new Dummy(Logger::DEBUG);

$logger = new Logger("mychannel", [$handlerDummy]);
```
