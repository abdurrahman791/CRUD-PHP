<?php
include 'koneksi.php';


// Simpan
if (isset($_POST['bsimpan'])) {

        $simpan = mysqli_query($koneksi, "INSERT INTO tb_monitoring (project_name, client, picture_leader, name_leader, email_leader, start_date, end_date)
                                          VALUES ('$_POST[tprojectname]',
                                                  '$_POST[tclient]',
                                                  '$_POST[tpicture]',
                                                  '$_POST[tnameleader]',
                                                  '$_POST[temailleader]',
                                                  '$_POST[tstartdate]',
                                                  '$_POST[tenddate]') ");
        
        if ($simpan) {
            echo "<script>
                    alert('Simpan data sukses!');
                    document.location='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan data gagal!');
                    document.location='index.php';
                  </script>";
        }
}


// Update
if (isset($_POST['b_ubah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE tb_monitoring SET
                                            project_name   = '$_POST[tprojectname]',
                                            client         = '$_POST[tclient]',
                                            picture_leader = '$_POST[tpicture]',
                                            name_leader    = '$_POST[tnameleader]',
                                            email_leader   = '$_POST[temailleader]',
                                            start_date     = '$_POST[tstartdate]',
                                            end_date       = '$_POST[tenddate]'
                                    WHERE id_monitoring = '$_POST[id_monitoring]' ");
    
    if ($ubah) {
        echo "<script>
                alert('Edit data sukses!');
                document.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Edit data gagal!');
                document.location='index.php';
              </script>";
    }
}

// Hapus
if (isset($_POST['bhapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM tb_monitoring WHERE id_monitoring = '$_POST[id_monitoring]' ");
    
    if ($hapus) {
        echo "<script>
                alert('Edit data sukses!');
                document.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Edit data gagal!');
                document.location='index.php';
              </script>";
    }
}