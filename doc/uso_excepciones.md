Excepciones
========

La libería lanza las siguientes excepciones


| Namespace | Class | Descripción |
|---|---|---|---|---|
| \Mostofreddy\Loggy\Exception | DirOutputNotWritableException | Cuando el directorio de salida del handler File existe y no tiene permisos de escritura |
| \Mostofreddy\Loggy\Exception | FileNotWritableException | Cuando el archivo de salida del handler File existe y no tiene permisos de escritura |
| \Mostofreddy\Loggy\Handler | Dummy | No escribe en ningún lado |


__Ejemplo__


```
use Mostofreddy\Loggy\Handler\File;
use Mostofreddy\Loggy\Exception\DirOutputNotWritableException;
use Mostofreddy\Loggy\Exception\LoggerException;
use Mostofreddy\Loggy\Looger;

# Para capturar una excepción en particular

try {
    $handlerFile = (new File(Logger::DEBUG))->config(['output' => '/usr/bin']);
} catch (DirOutputNotWritableException $e) {
    echo $e->getMessage();
    //...
}


# otra opción para capturar todas las excepciones del logger

try {
    $handlerFile = (new File(Logger::DEBUG))->config(['output' => '/usr/bin']);
} catch (LoggerException $e) {
    echo $e->getMessage();
    //...
}
```
