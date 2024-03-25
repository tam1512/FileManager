<?php 
   $load = new Load();
   $path = filter_input(INPUT_GET, 'path', FILTER_SANITIZE_SPECIAL_CHARS);
   $path = _DATA_DIR."/$path";

   $nameFile = '';
   $isNoSeen = true;
   if(!empty($path)):
      $nameFile = getFileName($path);
?>

<div class="container-fluid">
   <p><b>File name: <?php echo $nameFile ?></b></p>
   <p>Path: <?php echo $path ?></p>
   <p>File size: <?php echo $load->getSize($path)?> KB</p>
   <p>MIME-type: <?php echo $load->getFileType($path) ?></p>
   <div class="d-flex">
   <a href="<?php echo getLinkModule('download_file', '', ['path'=>$path]) ?>" class="btn btn-info btn-sm mr-3"><i class="fa-solid fa-cloud-arrow-down mr-2"></i>Download</a>
   <a target="_blank" href="<?php echo $path ?>" class="btn btn-info btn-sm mr-3"><i class="fa-solid fa-square-arrow-up-right mr-2"></i>Open</a>
   <a href="#" class="btn btn-info btn-sm" onclick="event.preventDefault(); window.history.back();"><i class="fa-solid fa-circle-chevron-left mr-2"></i>Back</a>
   </div>
</div>
<?php 
   if(preg_match('/officedocument/', $load->getFileType($path))): 
      $isNoSeen = false;
?>
<iframe src="<?php echo "https://docs.google.com/viewer?embedded=true&url="._WEB_HOST_ROOT."/$path" ?>" class="container-fluid mt-5 py-3" style="height: 600px;" frameborder="0"></iframe>
<?php endif;
   if(preg_match('/text/', $load->getFileType($path))) {
      $isNoSeen = false;
      echo '<div class="container-fluid mt-5 py-3" style="height: 600px;">';
      echo '<pre><code class="">';
      $cachePath = './cache/'.md5(uniqid());
      copy($path, $cachePath);
      $content = file_get_contents(_WEB_HOST_ROOT."/$cachePath");
      echo htmlentities($content);
      unlink($cachePath);
      echo '</pre></code>';
      echo '</div>';
   }
?>
<?php 
   if(preg_match('/pdf/', $load->getFileType($path)) || preg_match('/image/', $load->getFileType($path)) ): 
      $isNoSeen = false;      
?>
<iframe src="<?php echo _WEB_HOST_ROOT."/$path" ?>" class="container-fluid mt-5 py-3" frameborder="0" style="height: 600px;"></iframe>
<?php endif; endif;?>

<?php 
   if($isNoSeen) 
      echo '<div class="container-fluid mt-5 py-3"><h2>KHÔNG ĐỌC NỘI DUNG FILE NÀY</h2></div>'
?>