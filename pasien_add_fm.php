<?php include "include/header.php"; ?>
<!-- membuat menu navigasi -->
<nav class="navbar ">
    <!-- membuat container -->
    <div class="container">

        <!-- membuat jumbotron -->
        <div class="jumbotron">

            <center>
                <h2>Masukkan Data Diri Anda</h2>
            </center>

            <form
                onsubmit="return validasi(this)"
                method="post"
                name="form1"
                target="_self"
                action="pasienaddsim.php">
                <table class="" style="border:0px;" border="0" align="center">

                    <tr>
                        <td>
                            <h4>Nama &nbsp;</h4>
                        </td>
                        <td><input name="TxtNama" type="text" placeholder="Contoh : Anto bin Kaco">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Kelamin &nbsp;</h4>
                        </td>
                        <td>
                            <select name="cbojk" id="cbojk">
                                <option value="0" selected="selected">-Jenis Kelamin-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <h4>Umur &nbsp;</h4>
                        </td>
                        <td><input name="TxtUmur" type="text" placeholder="Contoh : 23">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Alamat &nbsp;</h4>
                        </td>
                        <td>
                            <input name="TxtAlamat" type="text" placeholder="Contoh : Campalagian....">
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <h4>
                                Nama Orang Tua &nbsp;
                            </h4>
                        </td>
                        <td width="">
                            <input type="text" name="textnamaorangtua" placeholder="Contoh : Kaco">
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="btn btn-primary" name="Submit" value="Lanjut">
                            <input type="reset" class="btn btn-warning" name="Submit2" value="Reset"/></td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
</nav>

<?php include "include/footer.php"; ?>