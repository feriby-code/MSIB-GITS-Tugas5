<?php

require_once './conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TUGAS 5 MSIB GITS</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #f7f7f7;">

  <main class="container mt-5">
    <section>
      <button type="button" class="btn btn-outline-primary mb-4" data-bs-target="#add_data" data-bs-toggle="modal">Tambah Data</button>
    </section>
    <section>
      <table class="table table-striped table-hover">
        <thead>
          <tr class="fs-5">
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Grade</th>
            <th>Nilai Rata-Rata</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          $query = mysqli_query($conn, "SELECT * FROM nilai");

          while ($result = mysqli_fetch_assoc($query)) {
            $no++
          ?>
            <tr>
              <td><?php echo ($no) ?></td>
              <td><?php echo ($result['nama']) ?></td>
              <td><?php echo ($result['mata_kuliah']) ?></td>
              <td><?php echo ($result['grade']) ?></td>
              <td><?php echo ($result['nilai_rata_rata']) ?></td>
              <td>
                <button data-bs-target="#edit_data" data-bs-toggle="modal" class="btn btn-warning fw-bold">Edit</button>
                <button class="btn btn-danger fw-bold">Hapus</button>
              </td>
            </tr>

            <!-- Modal edit Data -->
            <div class="modal fade" id="edit_data">
              <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="./edit_data.php" name="add_data" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Mata Kuliah</label>
                      <input type="text" name="mata_kuliah" class="form-control" />
                    </div>
                    <div class="mb-5">
                      <label class="form-label">Grade</label>
                      <select class="form-select" name="grade">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>
    </section>
  </main>

  <!-- Modal Add Data -->
  <div>
    <div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="./add_data.php" name="add_data" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Mata Kuliah</label>
              <input type="text" name="mata_kuliah" class="form-control" />
            </div>
            <div class="mb-5">
              <label class="form-label">Grade</label>
              <select class="form-select" name="grade">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
