<?php
class Load {
   private $parentPath = null;
   private $isFirst = true;
   public function scanDir($pathFolder='') {
      if(empty($pathFolder)) {
         $path = _DATA_DIR;
      } else if(is_dir($pathFolder)) {
         $path = $pathFolder;
      }
      if($this->isFirst) {
         $this->parentPath = $path;
         $this->isFirst = false;
      }
      $data = scandir($path);
      unset($data[0]);
      unset($data[1]);

      $data = array_values($data);

      return $data;
   }

   function isType($path) {
      if(is_dir($path)) {
         return 'folder';
      }
      return 'file';
   }

   function getPath($fileName) {
      $path = $this->parentPath;
      return $path.'/'.$fileName;
   }

   function getTypeIcon($fileName) {
      $path = $this->getPath($fileName);
      if($this->isType($path) == 'folder') {
         return '<i class="fa-solid fa-folder mr-2 text-info"></i>';
      } else {
         return '<i class="fa-regular fa-file mr-2 text-info"></i>';
      }
   }

   public function getSize($path) {
      $totalSize = 0;
      if($this->isType($path) == 'folder') {
         $data = $this->scanDir($path);
         if(!empty($data)) {
            foreach($data as $item) {
               $pathCheck = $path.'/'.$item;
               if($this->isType($pathCheck) == 'folder') {
                  $totalSize += $this->getSize($pathCheck);
               } else {
                  $totalSize += fileSize($pathCheck);
               }
            }
         }
      } else if(file_exists($path)) {
         $totalSize = fileSize($path);;
      }
      return round($totalSize/1024, 2);
   }

   public static function getParentDir() {
      if(!empty($_GET['path'])) {
         $path = urldecode($_GET['path']);
         if(preg_match('~^./data~', $path)) {
            $path = str_replace('./data', '', $path);
         }
      }
      $path = !empty($path) ? _DATA_DIR."/$path" : _DATA_DIR;
      return $path;
   }

   public function back() {
      $path = self::getParentDir();
      if($path !== _DATA_DIR) {
         echo '<tr>
                  <td></td>
                  <td>
                     <a href="#" class="btn btn-info btn-sm" onclick="event.preventDefault(); window.history.back();"><i class="fa-solid fa-circle-chevron-left mr-2"></i>Back</a>
                  </td>
                  <td></td>   
                  <td></td>   
                  <td></td>   
                  <td></td>   
               </tr>';
      }
   }

   function getFileType($path) {
      return mime_content_type($path);
   }
}
