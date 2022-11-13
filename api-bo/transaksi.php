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
                        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
                        
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                                </div>
                                <div class="col" style="text-align:right">
                                    <form method="Post">
                                    Filter 
                                    <select class="form-select" aria-label="Default select example" name="filter">
  <option selected value="all">Semua Transaksi</option>
  <option value="1">Transaksi Sukses</option>
  <option value="2">Transaksi Pending</option>
  <option value="3">Transaksi Gagal</option>
</select>
<button class="btn btn-primary btn-sm" type="submite">Cari</button>
</form>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Nomor Pengisian</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                       <?php
                                       $no = 1;
                                       while ($trx = mysqli_fetch_array($data_transaksi)){
                                           
                                           ?>
                                           <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$trx['no_pembayaran']?></td>
                                            <td><?=$trx['tujuan']?>(<?=$trx['server']?>)</td>
                                            <td><?=$trx['status_pembayaran']?></td>
                                            <td><?=$trx['status_pengiriman']?></td>
                                            <td><a href="detail_transaksi?id=<?=$trx['id']?>" class="btn btn-primary btn-sm"><i class="bi bi-search"></i></a> <a href="edit_transaksi?id=<?=$trx['id']?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="api/hapus_transaksi?id=<?=$trx['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a> </td>
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
            
            
            
            
            
            
            
            <!-- End of Main Content -->
            <script>
                var a = document.getElementById('transaksi');
                a.classList.add('active');
            </script>
<?php
include 'footer.php';
?>