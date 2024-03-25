</div>
<?php if(empty($_GET['hidden_option_footer'])): ?>
<footer>
   <div class="container-fluid">
      <div class="row">
         <div class="col-8">
            <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-square-check mr-2"></i>Chọn tất cả</a>
            <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-square-xmark mr-2"></i>Bỏ chọn tất cả</a>
            <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-trash-can mr-2"></i>Xóa</a>
            <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-copy mr-2"></i>Copy</a>
         </div>
         <div class="col-4">
            <p class="text-right">
               Copyright &copy; <?php echo date('Y') ?> by Unicode Academy
            </p>
         </div>
      </div>
   </div>
</footer>
<?php endif; ?>
<!-- Modal Add Item -->
<div class="modal fade" id="newItemModal" tabindex="-1" aria-labelledby="newItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <form action="<?php echo !empty($pathUrl) ? getLinkModule('create_item', '', ['hidden_option_footer' => 'true', 'path' => $pathUrl]) : getLinkModule('create_item', '', ['hidden_option_footer' => 'true']) ?>" method="post">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="newItemModalLabel"><i class="fa-solid fa-square-plus mr-2"></i>Create New Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Item type</label>
                  <div class="">
                     <input type="radio" name="type" value="file" class="mr-2" id="newItemFile" checked><label for="newItemFile">File</label>
                  </div>
                  <div class="">
                     <input type="radio" name="type" value="folder" class="mr-2" id="newItemFolder"><label for="newItemFolder">Folder</label>
                  </div>
               </div>
               <div class="form-group">
                  <label for="">Item Name</label>
                  <input type="text" name="name" class="form-control" required>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-info" data-dismiss="modal"><i class="fa-solid fa-circle-xmark mr-2"></i>Cancel</button>
               <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check mr-2"></i>Create Now</button>
            </div>
         </div>
      </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<script>
   let url = "<?php echo _WEB_HOST_ROOT ?>";
   let urlPath = "<?php echo _WEB_HOST_ROOT."/?module=chang_name&path=".Load::getParentDir() ?>";

</script>
<script src="<?php echo _WEB_HOST_ROOT?>/assets/js/app.js?ver=<?php echo rand(); ?>"></script>
</body>
</html>