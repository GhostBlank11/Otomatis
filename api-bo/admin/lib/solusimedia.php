<?php

include '../../koneksi.php';

$data_transaksi = mysqli_query($koneksi,'select * from transaksi order by id DESC');


$semua_trx = mysqli_num_rows($data_transaksi);

$trx_sukses = mysqli_num_rows(mysqli_query($koneksi,'select * from transaksi where status_pengiriman = "sukses"' ));

$trx_gagal = mysqli_num_rows(mysqli_query($koneksi,'select * from transaksi where status_pengiriman = "gagal"' ));

$trx_pending = mysqli_num_rows(mysqli_query($koneksi,'select * from transaksi where status_pengiriman = "pending"' ));