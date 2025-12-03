<?php

$id =$_GET['id'];
$query =mysqli_query($koneksi,"SELECT*FROM penjualan LEFT JOIN pelanggan on pelanggan.idpelanggan = penjualan.idpelanggan WHERE idpenjualan=$id"); 
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">            
<h1 class="mt-4">Detail Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Pembelian</li>
                        </ol>
                        <a href="?page=pembelian" class="btn ttn-danger">Kembali</a>
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td widht="200">Nama Pelanggan</td>
                                    <td widht ="1">:</td>
                                    <td>
                                   <?php echo $data['namapelanggan'];?>
                                    </td>
                                </tr>
                               <?php
                                $pro = mysqli_query($koneksi, "SELECT*FROM detailpenjualan LEFT JOIN produk on produk.idproduk =detailpenjualan.idproduk WHERE idpenjualan=$id");
                                while($produk = mysqli_fetch_array($pro)){

                               ?>
                                 <tr>
                                    <td><?php echo $produk['namaproduk'];?></td>
                                    <td>:</td>
                                    <td>
                                   Harga Satuan : <?php echo $produk['harga'];?><br>    
                                    Jumlah : <?php echo $produk['jumlahproduk'];?><br>
                                    Sub Total : <?php echo $produk['subtotal'];?><br>
                                 </td>
                                </tr>
                                <?php
                                }
                                ?>
                               
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td>
                                       <?php echo $data['totalharga'];?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        
                    </div>