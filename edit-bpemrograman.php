<?php
include "header.php";


$id = $_GET['id'];

// ambil data allcourse

$edit_db = mysqli_query($db, "SELECT * FROM course WHERE id='$id'");

// --------------

// Edit Data
$id = $_GET['id'];

if (isset($_POST['btn-edit'])) {
    $logo = $_POST['icon'];
    $nama = $_POST['nama'];
    $code = $_POST['code'];

    mysqli_query($db, "UPDATE course SET logo_course='$logo', nama_course='$nama', code='$code' WHERE id='$id'");

    echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Bahasa telah di edit!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
        window.location = 'admin-dashboard.php';
    });</script>";
    die();
}

if (isset($_POST['btn-delete'])) {
    mysqli_query($db, "DELETE FROM course WHERE id='$id'");

    echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Bahasa telah di hapus!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
        window.location = 'admin-dashboard.php';
    });</script>";
    die();
}

// ------------------
?>
<section class="all-course w-80 my-12 px-2 text-center h-auto mx-auto">
    <div class="text-left bg-white my-6 p-4 max-w-7xl md:w-96 md:p-6 lg:p-8 shadow-xl rounded mx-auto">
        <h2 class="text-2xl font-semibold text-gray-500">Edit Course</h2>
        <hr class="mt-2 mb-4">
        <ul class="list-decimal y-4">
            <?php while ($edit = mysqli_fetch_assoc($edit_db)) { ?>
                <form method="POST">
                    <label for="icon" class="text-gray-500">Icon Course<br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="icon" value="<?= $edit['logo_course'] ?>" required>
                    </label>
                    <br>
                    <label for="nama" class="text-gray-500">Nama Course <br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="nama" value="<?= $edit['nama_course'] ?>" required>
                    </label>
                    <br>
                    <label for="code" class="text-gray-500">Code<br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="code" value="<?= $edit['code'] ?>" required>
                    </label>
                    <br>
                    <br>
                    <div class="flex justify-center mt-8">
                        <input class="bg-blue-500 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="btn-edit" value="Simpan">
                        <input class="bg-red-500 hover:bg-red-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="btn-delete" value="Hapus">
                    </div>
                </form>
            <?php } ?>
    </div>
</section>