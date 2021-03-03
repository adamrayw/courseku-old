<?php
include "header.php";


$id = $_GET['course'];

// ambil data allcourse

$edit_db = mysqli_query($db, "SELECT * FROM allcourse WHERE id='$id'");

// --------------

// Edit Data
$id = $_GET['course'];

if (isset($_POST['btn-edit'])) {
    $logo = $_POST['icon'];
    $nama = $_POST['nama'];
    $author = $_POST['author'];
    $video = $_POST['total'];
    $desc = $_POST['deskripsi'];
    $code = $_POST['code'];
    $tingkat = $_POST['level'];
    $link = $_POST['link'];

    mysqli_query($db, "UPDATE allcourse SET logo_allcourse='$logo', nama_allcourse='$nama', author_allcourse='$author', video_allcourse='$video', desc_allcourse='$desc', code='$code', tingkat='$tingkat', link='$link' WHERE id='$id'");

    echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Course telah di edit!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
        window.location = 'admin-dashboard.php';
    });</script>";
    die();
}

if (isset($_POST['btn-delete'])) {
    mysqli_query($db, "DELETE FROM allcourse WHERE id='$id'");

    echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Course telah di hapus!',
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
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="icon" value="<?= $edit['logo_allcourse'] ?>">
                    </label>
                    <br>
                    <label for="nama" class="text-gray-500">Nama Course <br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="nama" value="<?= $edit['nama_allcourse'] ?>">
                    </label>
                    <br>
                    <label for="author" class="text-gray-500">Author Course <br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="author" value="<?= $edit['author_allcourse'] ?>">
                    </label>
                    <br>
                    <label for="total" class="text-gray-500">Total Video <br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="total" value="<?= $edit['video_allcourse'] ?>">
                    </label>
                    <br>
                    <label for="deskripsi" class="text-gray-500"> Deskripsi <br>
                        <textarea class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" cols="30" rows="6" name="deskripsi"><?= $edit['desc_allcourse'] ?></textarea>
                    </label>
                    <br>
                    <label for="code" class="text-gray-500">Code<br>
                        <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="code" value="<?= $edit['code'] ?>">
                    </label>
                    <br>
                    <label for="level" class="text-gray-500">Level<br>
                        <input class="border w-full mb-6 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="level" value="<?= $edit['tingkat'] ?>">
                    </label>
                    <br>
                    <label for="link" class="text-gray-500">Link<br>
                        <input class="border w-full mb-6 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="link" value="<?= $edit['link']; ?>">
                    </label>
                    <br>
                    <div class="flex justify-center mt-8">
                        <input class="bg-blue-500 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="btn-edit" value="Simpan">
                        <input class="bg-red-500 hover:bg-red-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="btn-delete" value="Hapus">
                    </div>
                </form>
            <?php } ?>
    </div>
</section>