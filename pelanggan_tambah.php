<?php
if (isset($_POST['namapelanggan'])){
    $nama = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $notelpon = $_POST['notelpon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(namapelanggan,alamat,notelpon)values('$nama','$alamat','$notelpon')");
    if($query){
        echo'<script>alert("Tambah data berhasil")</script>';
    }else{
        echo'<script>alert("Tambah data gagal")</script>';
    }

    }

?>


<div class="container-fluid px-4">            
<h1 class="mt-4">Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pelanggan</li>
                        </ol>
                        <a href="?page=pelanggan" class="btn ttn-danger">Kembali</a>
                        <hr>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td widht="200">Nama Pelanggan</td>
                                    <td widht ="1">:</td>
                                    <td><input class ="form-control" type="text" name="namapelanggan"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="alamat"rows="5"class="form-control"></textarea>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><input class ="form-control" type="number" step="0" name="notelpon"</td>
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
                       