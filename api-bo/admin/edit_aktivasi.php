<?php 
include 'header.php';

$id= $_GET['id'];
$detail_trx = mysqli_query($koneksi,"select * from pulsa where id = '$id'");
$list = mysqli_fetch_array($detail_trx);
?>
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Aktivasi</h1>
                        
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Aktivasi <?=$list['']?></h6>
                                </div>
                              
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <form method="post" action="api/edit_transaksi">
                           <div class="row">
                               <div class="col-12 col-md-6 mb-2">
                                   Kode Aktivasi
                                   <input type="text" class="form-control"  value="<?=$list['kode']?>" name="kode">
                               </div>
                                <div class="col-12 col-md-6 mb-2">
                                   Website
                                   <div class="row">
                                    
                                   <input type="text" class="form-control"  value="<?=$list['web']?>" name="website">

                                  
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 mb-2">
                                   Kategori 1
                                   <input type="text" class="form-control"  value="<?=$list['kategori']?>" name="kategori">
                               </div>
                               <div class="col-12 col-md-6 mb-2">
                                   Kategori 2
                                   <input type="text" class="form-control"  value="<?=$list['kategori1']?>" name="kategori1">
                               </div>
                               
                                <div class="col-12 col-md-6 mb-2">
                                   Kategori 3
                                   <input type="text" class="form-control"  value="<?=$list['kategori2']?>" name="kategori2">
                               </div>
                                <div class="col-12 col-md-6 mb-2">
                                   Kategori 4
                                   <input type="text" class="form-control"  value="<?=$list['kategori3']?>" name="kategori3">
                               </div>
                               
                                <div class="col-12 col-md-6 mb-2">
                                   Kategori 5
                                   <input type="text" class="form-control"  value="<?=$list['kategori4']?>" name="kategori4">
                               </div>
                                <div class="col-12 col-md-6 mb-2">
                                   Kategori 6
                                   <input type="text" class="form-control"  value="<?=$list['kategori5']?>" name="kategori5">
                               </div>
                               
                                <div class="col-12 col-md-6 mb-2">
                                   Kategori 7
                                   <input type="text" class="form-control"  value="<?=$list['kategori6']?>" name="kategori6">
                               </div>
                               
                               <div class="col-12 col-md-6 mb-2">
                                  
                               </div>
                               <input type="hidden" name="id" value ="<?=$list['id']?>">
                               <div class="col">
                                   <button  class="btn btn-primary mb-2 mt-2"type="submit">Simpan</button>
                                
                                  </form>
                               </div>
                           </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            
            
            
            <!-- Ubah TRX Modal-->
    <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="api/transaksi">
                    <select class="form-control" aria-label="Default select example" name="status">
                 <option selected value="all">Pilih Pembayaran</option>
                  <option value="UNPAID">Belum Lunas</option>
                  <option value="PAID">Dibayar</option>
                  <option value="REFAUND">Dikembalikan</option>
</select>
<input type="hidden" name="id" value="<?=$list['id']?>">
<input type="hidden" name="ket" value="bayar">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>

            
    <!-- Ubah Pengiriman Modal-->
    <div class="modal fade" id="pengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="api/transaksi">
                    Status Pengiriman
                    <select class="form-control mb-2" aria-label="Default select example" name="status">
                 <option selected value="all">Pilih Pengiriman</option>
                  <option value="Pending">Pending</option>
                  <option value="Sukses">Sukses</option>
                  <option value="Gagal">Gagal</option>
</select>
Serial Number
<input type="text" class="form-control mb-2" name="sn">
 Kirim notifikasi ke User?
                    <select class="form-control" aria-label="Default select example" name="notif">
                 
                  <option value="Tidak">Tidak</option>
                  <option value="Ya">Ya</option>
                  
</select>
<input type="hidden" name="id" value="<?=$list['id']?>">
<input type="hidden" name="ket" value="kirim">
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
           
<?php
include 'footer.php';
?>