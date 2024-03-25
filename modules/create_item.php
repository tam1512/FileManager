<?php 
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(!empty($_POST)) {
         $body = $_POST;
         $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
         $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));


         if(!empty($name)) {
            $path = Load::getParentDir();
            if($type === 'file') {
               if(preg_match('~^[\w\s]+\.[a-zA-Z]+~', $name)) {
                  Make::createFile($path, $name);
                  if($path !== _DATA_DIR) {
                     $path = preg_replace('~^./data/(.+)~', '$1', $path);
                     redirect('?path='.$path);
                  } else {
                     redirect('');
                  }
               } else {
                  $msg = 'Tên file không hợp lệ';
               }
            } else {
               echo $name;
               Make::createFolder($path, $name);
               if($path !== _DATA_DIR) {
                  $path = preg_replace('~^./data/(.+)~', '$1', $path);
                  redirect('?path='.$path);
               } else {
                  redirect('');
               }
            }
         }

         if(!empty($msg)) {
            echo '<div class="alert alert-danger">'.$msg.'</div>';
         }

      }
   }
?>