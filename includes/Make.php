<?php
class Make {
   public static function createFile($parentDir, $fileName, $data='') {
      $path = $parentDir.'/'.$fileName;
      file_put_contents($path, $data);
   }
   public static function createFolder($parentDir, $folerName) {
      $path = $parentDir.'/'.$folerName;

      mkdir($path);
   }

   public static function renameFile($path, $old, $new) {
      $pathOld = $path."/$old";
      $pathNew = $path."/$new";

      rename($pathOld, $pathNew);
   }

   public static function deleteFile($path) {
      unlink($path);
   }

   public static function deleteFolder($path) {
      $data = scandir($path);
      unset($data[0]);
      unset($data[1]);

      $data = array_values($data);

      if(!empty($data)) {
         foreach($data as $item) {
            if(file_exists($path.'/'.$item)) {
               self::deleteFile($path.'/'.$item);
            }
            if(is_dir($path.'/'.$item)) {
               self::deleteFolder($path.'/'.$item);
            }
         }
      } 
      rmdir($path);
   }
}