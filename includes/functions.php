<?php 
function getLink($path="") {
   $load = new Load();
   if($load->isType($path) == 'folder') {
      $path = removeDATADIR($path);
      return getUrl($path);
   } else if($load->isType($path) == 'file') {
      $path = removeDATADIR($path);
      if(!empty($path)) {
         return getUrl($path, true);
      }
      return _WEB_HOST_ROOT;
   }
}

function getLinkModule($module="", $action='', $params=[]) {
   $url = _WEB_HOST_ROOT;
   if(!empty($module)) {
      $url .= '/?module=' . $module;
   } 
   if(!empty($action)) {
      $url .= '&action=' . $action;
   }
   if(!empty($params)) {
      foreach($params as $key => $val) {
         $url .= "&$key=$val";
      }
   }
   return $url;
}

function redirect($path = '') {
   header("location:"._WEB_HOST_ROOT.'/'.$path);
}

function getUrl($path, $isView= false) {
   $path = urlencode($path);
   if(!$isView) {
      return _WEB_HOST_ROOT."/?path=$path";
   } else {
      return getLinkModule('view_file', '', ['hidden_option_footer' => 'true', 'path' => $path]);
   }
}

function removeDATADIR($path) {
   $path = preg_replace('~^./data/(.+)~', '$1', $path);
   return $path;
}

function getFileName($path) {
   return basename($path);
}