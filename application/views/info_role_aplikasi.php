   <!-- Content Header (Page header) -->
   <section class="content-header">
       <div class="container-fluid">
           <div class="row mb-2">
               <div class="col-sm-6">
                   <!-- <h1>500 Error Page</h1> -->
               </div>
               <div class="col-sm-6">
                   <!-- <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="#">Home</a></li>
                       <li class="breadcrumb-item active">500 Error Page</li>
                   </ol> -->
               </div>
           </div>
       </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content justify-content-center">
       <div class="error-page ">
           <div class="col-lg-7">
               <img class="headline text-center" height="200px" width="200px" src="https://cdn-icons-png.flaticon.com/512/4335/4335073.png" alt="">

           </div>
           <div class="col-lg-7">
               Anda tidak memiliki akses untuk membuka <span class="badge badge-danger"><?= $this->session->userdata("info_app") ?></span>
               Hubungi administrator untuk meminta ijin akses aplikasi
           </div>
       </div>
       <!-- /.error-page -->

   </section>
   <!-- /.content -->