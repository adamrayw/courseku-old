<?php
include "header.php";

if (isset($_POST['tambah'])) {

    // simpan data dari form
    $icon = $_POST['icon'];
    $nama = $_POST['nama'];
    $code = $_POST['code'];

    $addCourse = "INSERT INTO course (logo_course, nama_course, code) VALUES ('$icon', '$nama', '$code')";
    if (mysqli_query($db, $addCourse)) {
        echo "<script>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Terimakasih sudah ber-kontribusi!',
                text: 'Link course akan kami review terlebih dahulu.',
                showConfirmButton: true,
                // timer: 2000
            }).then(function() {
                window.location = 'index.php';
            });</script>";
        die();
    } else {
        echo "ERROR";
    }
}

?>

<section class="all-course my-12 px-6 text-center h-auto mx-auto">
    <div class="text-left bg-white my-6 p-4 max-w-7xl md:w-96 md:p-6 lg:p-8 shadow-xl rounded mx-auto">
        <div class=" text-center">
            <h1 class="text-2xl font-semibold text-gray-500">Selamat datang contributor!</h1>
            <p class="text-sm font-light text-gray-400">Silahkan submit link video/artikel pada form di bawah.</p>
        </div>

        <hr class="mt-2 mb-4">
        <ul class="list-decimal y-4">
            <form method="POST">
                <label for="icon" class="text-gray-500">Nama<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md text-sm p-2" type="text" name="icon" placeholder="" required>
                </label>
                <br>
                <label for="icon" class="text-gray-500">Link<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md text-sm p-2" type="text" name="icon" placeholder="" required>
                </label>
                <br>
                <div class="flex justify-center mt-8">
                    <input class="bg-blue-500 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="tambah" value="Submit">
                </div>
            </form>

    </div>
</section>