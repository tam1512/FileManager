<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $old = filter_input(INPUT_POST, 'old', FILTER_SANITIZE_SPECIAL_CHARS);
   $new = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
   $path = $_GET['path'];
   
   if(!empty($old) && !empty($new)) {
      Make::renameFile($path, $old, $new);
   }
}