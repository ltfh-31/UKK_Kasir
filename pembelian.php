<div class="container-fluid px-4">            
<h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pembelian</li>
                        </ol>
                        <a href="?page=pembelian_tambah" class="btn ttn-primary">+ Tambah Pembelian</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal Pembelian</th>
                                <th>Pelanggan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $query =mysqli_query($koneksi,"SELECT*FROM penjualan LEFT JOIN pelanggan on pelanggan.idpelanggan = penjualan.idpelanggan");
                            while($data=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $data['tanggalpenjualan'];?></td>
                                    <td><?php echo $data['namapelanggan'];?></td>
                                    <td><?php echo $data['totalharga'];?></td>
                                    <td>
                                        <a href="?page=pembelian_detail&&id=<?php echo $data['idpenjualan'];?>"class="ttn btn-secondary">Detail</a>
                                        <a href="?page=pembelian_hapus&&id=<?php echo $data['idpenjualan'];?>"class="ttn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }

                            
                            
                            ?>
                        </table>
                        </div>