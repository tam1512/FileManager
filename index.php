<?php
   date_default_timezone_set('Asia/Ho_Chi_Minh');
   require_once('config.php');
   require_once('includes/functions.php');
   require_once('includes/Load.php');
   require_once('includes/Make.php');

   if(!empty($_GET['path'])) {
      $pathUrl = $_GET['path'];
      $pathUrl = preg_replace('~^./data/(.+)~', '$1', $pathUrl);
      $arrPath = explode('/', $pathUrl);
      $breadcrumb = '';
      $pathItem = '';
      foreach($arrPath as $item) {
         if(empty($pathItem)) {
            $pathItem = $item;
         } else {
            $pathItem .= '/'.$item;
         }
         $breadcrumb .='/<a href="'.getLink($pathItem).'">'.$item.'</a>';
      }
   }
   
   $module = 'home';

   if(!empty($_GET['module'])) {
      $module = $_GET['module'];
   }

   if($module != 'download_file') {
      require_once('blocks/header.php');
   }



   $path = 'modules/'.$module.'.php';
   if(file_exists($path)) {
      require_once($path);
   }

   if($module != 'download_file') {
      require_once('blocks/footer.php');
   }
?>