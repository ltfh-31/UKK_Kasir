<?php
if (isset($_POST['idpelanggan'])){
    $idpelanggan = $_POST['idpelanggan'];
    $produk = $_POST['produk'];
    $total =0;
    $tanggal = date('Y/m/d');

    $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggalpenjualan,idpelanggan) values('$tanggal', '$idpelanggan')");
   $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*FROM penjualan ORDER BY idpenjualan DESC"));
   $idpenjualan= $idTerakhir['idpenjualan'];
   foreach($produk as $key=>$val){
        $pr = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*FROM produk WHERE idproduk = $key"));
        
        if($val > 0){
        $sub =$val * $pr ['harga'];
        $total +=$sub; 
        $query = mysqli_query($koneksi, "INSERT INTO detailpenjualan(idpenjualan,idproduk,jumlahproduk,subtotal)values('$idpenjualan','$key','$val','$sub')");
        
    $updateproduk = mysqli_query($koneksi,"UPDATE produk set stok=stok-$val WHERE idproduk=$key");
    }
    }
    
    $query = mysqli_query($koneksi, "UPDATE penjualan SET totalharga=$total WHERE idpenjualan=$idpenjualan");
    
    if($query){
        echo'<script>alert("Tambah data berhasil")</script>';
    }else{
        echo'<script>alert("Tambah data gagal")</script>';
    }

    }

?>


<div class="container-fluid px-4">            
<h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pembelian</li>
                        </ol>
                        <a href="?page=pembelian" class="btn ttn-danger">Kembali</a>
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td widht="200">Nama Pelanggan</td>
                                    <td widht ="1">:</td>
                                    <td>
                                    <select class="form-control form-select" name="idpelanggan">
                        <?php
                        $p = mysqli_query($koneksi, "SELECT*FROM pelanggan");
                        while($pel = mysqli_fetch_array($p)){
                            ?>
                        <option value="<?php echo $pel['idpelanggan']; ?>"><?php echo $pel['namapelanggan']; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                                    </td>
                                </tr>
                               <?php
                                $pro = mysqli_query($koneksi, "SELECT*FROM produk");
                                while($produk = mysqli_fetch_array($pro)){

                               ?>
                                 <tr>
                                    <td><?php echo $produk['namaproduk']. '(stok : '.$produk['stok'].')';?></td>
                                    <td>:</td>
                                    <td><input class ="form-control" type="number"
                                     step="0" value ="0" max="<?php echo $produk['stok'];?>" name="produk[<?php echo $produk['idproduk'];?>]" </td>
                                </tr>
                                <?php
                                }
                                ?>
                               
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit"class="btn btn-primary">Simpan</button>
                                        <button type="reset"class="btn btn-danger">Reset</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        
                    </div>