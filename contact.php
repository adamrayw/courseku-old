<?php
include "header.php";

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $addCourse = "INSERT INTO feedback (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    if (mysqli_query($db, $addCourse)) {
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Pesan telah dikirim!',
            text: 'Anda di alihkan ke home...',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = 'index.php';
        });</script>";
        die();
    } else {
        $errMsg = "Ada kesalahan di sistem!";
    }
}

?>

<section class="all-course mt-6 mb-10 px-2 text-center h-auto mx-auto">
    <div class="text-left bg-white my-6 px-4 py-6 max-w-7xl md:w-96 md:p-6 lg:p-8 shadow-xl rounded mx-auto">
        <div class="text-center">
            <h2 class="text-2xl mb-1 font-semibold text-gray-600">Feedback/Contact</h2>
            <p class="text-sm text-gray-400 font-light">Silahkan kirim feedback, karna feedback kalian sangat penting bagi kami.</p>
        </div>

        <hr class="mt-2 mb-4">
        <ul class="list-decimal y-4">
            <form method="POST">
                <label for="icon" class="text-gray-500">Nama Lengkap<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="nama" required>
                </label>
                <br>
                <label for="nama" class="text-gray-500">Email <br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="email" name="email" required>
                </label>
                <br>
                <label for="deskripsi" class="text-gray-500">Feedback<br>
                    <textarea class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" cols="30" rows="6" name="pesan" required></textarea>
                </label>
                <br>
                <p class="text-center text-red-400 text-sm"><?php if (isset($errMsg)) {
                                                                echo 'Maaf, ' . $errMsg;
                                                            } ?></p>
                <div class="flex justify-center mt-8">
                    <input class="bg-blue-500 w-24 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="tambah" value="Kirim">
                </div>
            </form>

    </div>
</section>