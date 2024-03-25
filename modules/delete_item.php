<?php 
$load = new Load();

$path = filter_input(INPUT_GET, 'path', FILTER_SANITIZE_SPECIAL_CHARS);

if($load->isType($path) == 'folder') {
   Make::deleteFolder($path);
} else {
   Make::deleteFile($path);
}
$path = preg_replace('~^(./data.*)/.+~', '$1', $path);
if($path !== _DATA_DIR) {
   $path = preg_replace('~^./data/(.+)~', '$1', $path);
   redirect('?path='.$path);  
} else {
   redirect('');
}