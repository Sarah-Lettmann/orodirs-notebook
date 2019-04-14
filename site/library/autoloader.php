<?php
spl_autoload_register(function ($className) {
 if (substr($className, 0, 15) !== 'OrodirsNotebook') {
    // not our business
    return;
 }

 $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 15)).'.php';

 if (file_exists($fileName)) {
    include $fileName;
 }
});
?>
