<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>PROJECT MONITORING</title>
  </head>
  <body>
    <div class="container">
        <h3 class="text-center mt-5 fw-bold">PROJECT <i class="text-primary">MONITORING</i> </h3>
        <hr>

         <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaltambah">
          Tambah data
        </button>

        <table class="table table-striped mt-5 table-bordered">
            <thead class=" table-dark ">
              <tr class="text-center">
                <th scope="col">NO</th>
                <th scope="col">PROJECT NAME</th>
                <th scope="col">CLIENT</th>
                <th scope="col">PROJECT LEADER</th>
                <th scope="col">START DATE</th>
                <th scope="col">END DATE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody class="align-middle">

            <?php

            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_monitoring ORDER BY id_monitoring DESC");
            while($data = mysqli_fetch_array($tampil)) :
            ?>

              <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $data['project_name'] ?></td>
                <td><?= $data['client'] ?></td>
                <td>
                    <table>
                        <tr>
                            <td><img src="picture/img1.png" width="70px solid"></td>
                            <td>
                                <h5 style="padding-left:5px; margin-left:15x"><?= $data['name_leader'] ?></h5>
                                <p style="padding-left:5px; margin-left:15x"><?= $data['email_leader'] ?></p>
                            </td>
                        </tr>
                    </table>
                    
                    
                </td>
                <td><?= $data['start_date'] ?></td>
                <td><?= $data['end_date'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#modalubah<?= $no ?>"></button>
                    <button type="button" class="btn btn-danger bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $no ?>"></button>
                </td>
              </tr>

              <!-- Modal form ubah data -->
              <div class="modal fade" id="modalubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Ubah Data Monitoring</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="aksi.php">
                      <input type="hidden" name="id_monitoring" value="<?= $data['id_monitoring'] ?>">

                      <div class="modal-body">

                          <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="tprojectname" value= "<?= $data['project_name'] ?>" placeholder="Input Your Project Name">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" class="form-control" name="tclient" value= "<?= $data['client'] ?>" placeholder="Input Your Client">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Picture Leader</label>
                            <input class="form-control" type="file" name="tpicture" value= "<?= $data['picture_leader'] ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Name Leader</label>
                            <input type="text" class="form-control" name="tnameleader" value= "<?= $data['name_leader'] ?>" placeholder="Input Your Name Leader">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Email Leader</label>
                            <input type="email" class="form-control" name="temailleader" value= "<?= $data['email_leader'] ?>" placeholder="email@gmail.com">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="tstartdate" value= "<?= $data['start_date'] ?>" placeholder="2000-09-01">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="tenddate" value= "<?= $data['end_date'] ?>" placeholder="2000-09-01">
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name=b_ubah>Update</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Modal Hapus data -->
              <div class="modal fade" id="modalhapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="aksi.php">
                      <input type="hidden" name="id_monitoring" value="<?= $data['id_monitoring'] ?>">

                      <div class = "modal-body">

                        <h5 class = "text-center"> Apakah anda yakin ingin menghapus data ini?
                          <span class = "text-danger"><?= $data['project_name'] ?> - <?= $data['client'] ?></span>
                        </h5>      
                          
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name=bhapus>Ya, hapus aja!</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
              
            </tbody>
          </table>
          <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>

         

        <!-- Modal form input data -->
        <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Input Data Monitoring</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="aksi.php">
              <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" class="form-control" name="tprojectname" placeholder="Input Your Project Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Client</label>
                    <input type="text" class="form-control" name="tclient" placeholder="Input Your Client">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Picture Leader</label>
                    <input class="form-control" type="file" name="tpicture">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Name Leader</label>
                    <input type="text" class="form-control" name="tnameleader" placeholder="Input Your Name Leader">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email Leader</label>
                    <input type="email" class="form-control" name="temailleader" placeholder="email@gmail.com">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="tstartdate" placeholder="2000-09-01">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="tenddate" placeholder="2000-09-01">
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" name=bsimpan>Save</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>