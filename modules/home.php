<?php 
   $load = new Load();

   if(!empty($_GET['path'])) {
      $path = $_GET['path'];
      if($load->isType(_DATA_DIR.'/'.$path) == 'folder') {
         $data = $load->scanDir(_DATA_DIR.'/'.$path);
      }
   } else {
      $data = $load->scanDir();
   }
?>
<table id="dataTable" class="table">
   <thead>
      <tr>
         <th><input type="checkbox"  name="" id="checkAll"></th>
         <th>Tên</th>
         <th>Kích thước</th>
         <th>Chỉnh sửa gần đây</th>
         <th>Quyền</th>
         <th>Hành động</th>
      </tr>
   </thead>
   <tbody>
      <?php 
         $load->back();
         if(!empty($data)):
            foreach($data as $item):
               $path = $load->getPath($item);
      ?>
      <tr>
         <td><input type="checkbox" name="" class="check-item"></td>
         <td><a href="<?php echo getLink($path) ?>"><?php echo $load->getTypeIcon($item) . $item ?></a></td>
         <td><?php echo $load->getSize($path).' KB'?></td>
         <td><?php echo date('d/m/Y h:i:s', filemtime($path))  //lấy ra thời gian thay đổi gần nhất?></td>
         <td class="text-center"><?php echo substr(sprintf('%o', fileperms($path)), -4) //lấy ra quyền chmod ?></td>
         <td>
            <?php $isFile = false; if($load->isType($path) == 'file') $isFile = true ?>
            <?php echo $isFile ? '<a target="_blank" href="'.$path.'" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i></a>' : false ?>
            <a href="<?php echo getLinkModule('delete_item', '', ['delete_item'=>'true', 'path'=>$path]) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-info btn-sm"><i class="fa-solid fa-trash-can"></i></a>
            <a href="#" class="btn btn-info btn-sm edit-item" data-name="<?php echo $item ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="#" class="btn btn-info btn-sm"><i class="fa-regular fa-copy"></i></a>
            <a href="#" class="btn btn-info btn-sm get-link" data-link="<?php echo getLink($path) ?>"><i class="fa-solid fa-link"></i></a>
            <?php echo $isFile ? '<a href="'.getLinkModule('download_file', '', ['path'=>$path]).'" class="btn btn-info btn-sm"><i class="fa-solid fa-cloud-arrow-down"></i></a>' : false ?>
         </td>
      </tr>
      <?php 
            endforeach;
         endif;
      ?>
   </tbody>
</table>
