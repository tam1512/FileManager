$(document).ready(function() {
   $('#dataTable').DataTable();

   $('#checkAll').on('change', function() {
      if($(this).is(':checked')) {
         $('.check-item').prop('checked', true);
      } else {
         $('.check-item').prop('checked', false);
      }
   })

   $(".edit-item").on('click', function(e) {
      e.preventDefault();
      let name = $(this).data('name');
      let newName = window.prompt('Tên mới', name);
      if(newName.trim() !== '') {
         $.ajax({
            url: urlPath,
            method: 'POST',
            data: {old: name, name: newName},
            success: function(data) {
               window.location.reload();
               alert('Đổi tên thành công');
            }
         })
      } else {
         alert('Vui lòng nhập tên');
      }
   })

   $('.get-link').on('click', function(e) {
      e.preventDefault();
      let dataLink = $(this).data('link');
      window.prompt('Link', dataLink);
   })
});