<?php 
include 'header.php';

$filter = $_POST['filter'];

if($filter == "1"){
    $data_transaksi = mysqli_query($koneksi,"select * from transaksi where status_pengiriman = 'sukses'");
}else if ($filter == "2"){
    $data_transaksi = mysqli_query($koneksi,"select * from transaksi where status_pengiriman = 'Pending'");
}else if ($filter == "3"){
    $data_transaksi = mysqli_query($koneksi,"select * from transaksi where status_pengiriman = 'Gagal'");
}
?>
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Setting API</h1>
                        
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h6 class="m-0 font-weight-bold text-primary">Setting API</h6>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <form method="post" action="api/setting">
                            <div class="row">
                                 <div class="col-12 col-md-6 mb-2">
                                     Nama Website
                                     <input type="text" class="form-control" name="nama" value="<?=$setting['nama']?>">
                                </div>
                                 <div class="col-12 col-md-6 mb-2">
                                     Link Logo
                                     <input type="text" class="form-control" name="url" value="<?=$setting['owner']?>">
                                </div>
                                 <div class="col-12 col-md-6 mb-2">
                                     Username
                                     <input type="text" class="form-control" name="username" value="<?=$setting['username']?>">
                                </div>
                                 <div class="col-12 col-md-6 mb-2">
                                     Password
                                     <input type="text" class="form-control" name="password" value="<?=$setting['password']?>">
                                </div>
                                 <div class="col-12 col-md-6 mb-2">
                                     <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            
            
            
            
            
            
            
            <!-- End of Main Content -->
            <script>
                var a = document.getElementById('transaksi');
                a.classList.add('active');
            </script>
<?php
include 'footer.php';
?>