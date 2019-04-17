<?php
spl_autoload_register(function ($className) {
 if (substr($className, 0, 15) !== 'OrodirsNotebook' && substr($className, 0, 3) !== "Com") {
    // not our business
    return;
 }

 if (substr($className, 0, 15) == 'OrodirsNotebook') {
   $fileName = $_SERVER['DOCUMENT_ROOT'].'/src'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 15)).'.php';
 } else  if (substr($className, 0, 3) == 'Com') {
    $fileName = $_SERVER['DOCUMENT_ROOT'].'/src/'.str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';
  }

 if (file_exists($fileName)) {
    include $fileName;
 }
});
?>
