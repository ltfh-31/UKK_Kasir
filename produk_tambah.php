<?php
if (isset($_POST['namaproduk'])){
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "INSERT INTO produk(namaproduk,harga,stok)values('$namaproduk','$harga','$stok')");
    if($query){
        echo'<script>alert("Tambah data berhasil")</script>';
    }else{
        echo'<script>alert("Tambah data gagal")</script>';
    }

    }

?>


<div class="container-fluid px-4">            
<h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                        <a href="?page=produk" class="btn ttn-danger">Kembali</a>
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td widht="200">Nama Produk</td>
                                    <td widht ="1">:</td>
                                    <td><input class ="form-control" type="text" name="namaproduk"</td>
                                </tr>
                               
                                 <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><input class ="form-control" type="number" step="0" name="harga"</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td><input class ="form-control" type="number" step="0" name="stok"</td>
                                </tr>
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
                       