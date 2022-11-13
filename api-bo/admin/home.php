<?php 
include 'header.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Semua Aktivasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$aktivasi?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Aktivasi Premium</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$premium?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Aktivasi Biasa
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$aktivasi_biasa?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Hit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Belum Ada</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Aktivasi  <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm">Tambah Aktivasi</button></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Aktivasi</th>
                                            <th>Website</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                       <?php
                                       $no = 1;
                                       while ($trx = mysqli_fetch_array($data_transaksi)){
                                           
                                           ?>
                                           <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$trx['kode']?></td>
                                            <td><?=$trx['web']?></td>
                                            
                                            <td><a href="detail_aktivasi?id=<?=$trx['id']?>" class="btn btn-primary btn-sm"><i class="bi bi-search"></i></a> <a href="edit_aktivasi?id=<?=$trx['id']?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="api/hapus_transaksi?id=<?=$trx['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a></td>
                                       <?php }
                                       ?>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            
            
                      <!-- Ubah TRX Modal-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="api/transaksi">
                        <div class="row">
                             <div class="col-12 col-md-6 mb-2">
                                  Kode Aktivasi
                                <input type="text" class="form-control mb-2" name="kode">
                            </div>
                             <div class="col-12 col-md-6 mb-2">
                    Website
                  <input type="text" class="form-control mb-2" name="website">
                            </div>
                            
                            <div class="col-12 col-md-6 mb-2">
                   Kategori 1
                  <input type="text" class="form-control mb-2" name="kategori">
                   
                        </div>
                   
                     <div class="col-12 col-md-6 mb-2">
                  Kategori 2
                  <input type="text" class="form-control mb-2" name="kategori1">
                   
                        </div>
                        
                    <div class="col-12 col-md-6 mb-2">
                 Kategori 3
                  <input type="text" class="form-control mb-2" name="kategori2">  
                        </div>
                        
                        <div class="col-12 col-md-6 mb-2">
                  Kategori 4
                  <input type="text" class="form-control mb-2" name="kategori3">
                   
                        </div>
                        
                        <div class="col-12 col-md-6 mb-2">
                  Kategori 5
                  <input type="text" class="form-control mb-2" name="kategori4">
                   
                        </div>
                        
                        <div class="col-12 col-md-6 mb-2">
                  Kategori 6
                  <input type="text" class="form-control mb-2" name="kategori5">
                   
                        </div>
                        
                         <div class="col-12 col-md-6 mb-2">
                  
                  Kategori 7
                  <input type="text" class="form-control mb-2" name="kategori6">
 
                        </div>
                   
                                   </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>

     
            <!-- End of Main Content -->
            <script>
                var a = document.getElementById('dashboard');
                a.classList.add('active');
            </script>
<?php
include 'footer.php';
?>