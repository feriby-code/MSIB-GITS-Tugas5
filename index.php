<?php

require_once './conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TUGAS MSIB GITS</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.3.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="container mx-auto mt-20 w-full flex items-center     justify-center">
    <div class="overflow-x-auto w-10/12">
      <button onclick="add_data.showModal()" class="btn btn-secondary mb-8 ms-4">Tambah Data</button>
      <table class="table bg-blue-800 text-black">
        <thead>
          <tr class="text-white text-sm">
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
          $no = 1;
          $query = mysqli_query($conn, "SELECT * FROM nilai");

          while ($result = mysqli_fetch_assoc($query)) {
            
          ?>
            <tr class="text-white">
              <td><?= $no++; ?></td>
              <td><?= $result['nama']; ?></td>
              <td><?= $result['mata_kuliah']; ?></td>
              <td><?= $result['grade']; ?></td>
              <td><?= $result['nilai_rata_rata']; ?></td>
              <td>
                <button onclick="edit_data_<?php echo ($result['id']) ?>.showModal()" class="btn btn-sm bg-yellow-600 text-white border-none hover:bg-yellow-800">Edit</button>
                <button onclick="delete_data_<?php echo ($result['id']) ?>.showModal()" class="btn btn-sm bg-red-600 text-white border-none hover:bg-red-800">Delete</button>
              </td>
            </tr>


            <!-- Modal edit-->
            <dialog id="edit_data_<?php echo ($result['id']) ?>" class="modal">
              <form method="POST" name="edit_data" action="./edit_data.php">
                <div class="modal-box mt-auto">
                  <h3 class="font-bold text-lg">Ubah Data</h3>
                  <button type="button" onclick="edit_data_<?php echo ($result['id']) ?>.close()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

                  <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
                    <input hidden type="text" id="id" name="id" value="<?php echo ($result['id']) ?>" class="w-full input input-bordered input-primary" />
                    <div class="flex flex-col gap-2">
                      <label for="nama" class="ms-2">Nama</label>
                      <input type="text" id="nama" name="nama" value="<?php echo ($result['nama']) ?>" class="w-full input input-bordered input-primary" />
                    </div>
                    <div class="flex flex-col gap-2">
                      <label for="mata_kuliah" class="ms-2">Mata Kuliah</label>
                      <input type="text" id="mata_kuliah" name="mata_kuliah" value="<?php echo ($result['mata_kuliah']) ?>" class="w-full input input-bordered input-primary" />
                    </div>
                    <div class="flex flex-col gap-2">
                      <label for="grade" class="ms-2">Grade</label>
                      <select class="select select-bordered select-primary w-full max-w-xs" name="grade">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                      </select>
                    </div>
                  </div>

                  <div class="mt-10 flex justify-end me-3">
                    <button type="submit" class="btn btn-outline btn-success w-36">Ubah</button>
                  </div>
                </div>
              </form>
            </dialog>

            <!-- Modal delete -->
            <dialog id="delete_data_<?php echo ($result['id']) ?>" class="modal">
              <form method="POST" name="edit_data" action="./delete_data.php">
                <div class="modal-box mt-auto">
                  <h3 class="font-bold text-lg">Hapus Data</h3>
                  <button type="button" onclick="delete_data_<?php echo ($result['id']) ?>.close()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

                  <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
                    <input hidden type="text" id="id" name="id" value="<?php echo ($result['id']) ?>" class="w-full input input-bordered input-primary" />
                    <div class="flex flex-col gap-2">
                      <label for="nama" class="ms-2">Nama: <?php echo ($result['nama']) ?></label>
                    </div>
                    <div class="flex flex-col gap-2">
                      <label for="mata_kuliah" class="ms-2">Mata Kuliah: <?php echo ($result['mata_kuliah']) ?></label>
                    </div>
                    <div class="flex flex-col gap-2">
                      <label for="grade" class="ms-2">Grade: <?php echo ($result['grade']) ?></label>
                    </div>
                  </div>

                  <div class="mt-10 flex justify-end me-3">
                    <button type="submit" class="btn btn-primary w-36 me-8">YA</button>
                    <button type="button" onclick="delete_data_<?php echo ($result['id']) ?>.close()" class="btn btn-secondary w-36">TIDAK</button>
                  </div>
                </div>
              </form>
            </dialog>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Add-->
  <dialog id="add_data" class="modal w-full">
    <form method="POST" action="./add_data.php" class="modal-box">
      <h3 class="font-bold text-lg">Tambah Data</h3>
      <button type="button" onclick="add_data.close()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

      <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
        <div class="flex flex-col gap-2">
          <label for="nama" class="ms-2">Nama</label>
          <input type="text" id="nama" name="nama" class="w-full input input-bordered input-primary" />
        </div>
        <div class="flex flex-col gap-2">
          <label for="prodi" class="ms-2">Mata Kuliah</label>
          <input type="text" id="mata_kuliah" name="mata_kuliah" class="w-full input input-bordered input-primary" />
        </div>
        <div class="flex flex-col gap-2">
          <label for="grade" class="ms-2">Grade</label>
          <select class="select select-bordered select-primary w-full max-w-xs" name="grade">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
          </select>
        </div>
      </div>

      <div class="mt-10 flex justify-end me-3">
        <button class="btn btn-outline btn-success w-36">Tambah</button>
      </div>
    </form>
  </dialog>
</body>

</html>