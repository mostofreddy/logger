Handlers
========

| Namespace | Class | Descripción |
|---|---|---|---|---|
| \Mostofreddy\Loggy\Handler | Screen | Escribe el log en pantalla |
| \Mostofreddy\Loggy\Handler | File | Escribe el log en un archivo físico |
| \Mostofreddy\Loggy\Handler | Dummy | No escribe en ningún lado |



Screen
------

```
use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\Screen;

$handlerScreen = new Screen(Logger::DEBUG);

$logger = new Logger("mychannel", [$handlerScreen]);
```

File
------

### Configuración

| Parametro | Descripción |
|---|---|
| \Mostofreddy\Loggy\Handler | Screen | Escribe el log en pantalla |
| \Mostofreddy\Loggy\Handler | File | Escribe el log en un archivo físico |
| \Mostofreddy\Loggy\Handler | Dummy | No escribe en ningún lado |

```
use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\File;

$handlerFile = (new File(Logger::DEBUG))->config(['output' => '/tmp','fileName' => 'tracking']);

$logger = new Logger("mychannel", [$handlerFile]);
```

Dummy
------

```
use Mostofreddy\Loggy\Logger;
use Mostofreddy\Loggy\Handler\Dummy;

$handlerDummy = new Dummy(Logger::DEBUG);

$logger = new Logger("mychannel", [$handlerDummy]);
```
