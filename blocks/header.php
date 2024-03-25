<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Folder</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
   <!-- https://datatables.net/ -->
   <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
   <link href="<?php echo _WEB_HOST_ROOT?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
   <div class="container-fluid">
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="<?php echo getLink(); ?>"><b>File Manager</b></a>
            <div class="">
               <a class="text-primary" href="<?php echo getLink(); ?>"><i class="fa-solid fa-house"></i></a>
               <?php echo !empty($breadcrumb) ? $breadcrumb : false ?>
            </div>
            <div class="ml-auto d-flex">
               <form class="form-inline my-2 my-lg-0">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                     </button>
                  </div>
               </div>
               </form>
               <ul class="navbar-nav mt-2 mt-lg-0">
                  <li class="nav-item active">
                  <a class="nav-link text-secondary" href="#"><i class="fa-solid fa-cloud-arrow-up mr-2"></i>Upload</a>
                  </li>
                  <li class="nav-item active">
                  <a class="nav-link text-secondary" href="#" data-toggle="modal" data-target="#newItemModal"><i class="fa-solid fa-square-plus mr-2"></i>New item</a>
                  </li>
                  <li class="nav-item active">
                  <a class="nav-link text-secondary" href="#"><i class="fa-solid fa-gear mr-2"></i>Setting</a>
                  </li>
               </ul>
            </div>
         </div>
         </nav>
      </header>
   </div>
   <div class="container-fluid py-3">
