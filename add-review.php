<?php
include "header.php";

$id = $_GET['course'];
$name = $_GET['name'];

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $pesan = $_POST['pesan'];
    $code = $_GET['course'];

    $addCourse = "INSERT INTO comment (code, nama, email, star, pesan) VALUES ('$code', '$nama', '$email', '$rating', '$pesan')";
    if (mysqli_query($db, $addCourse)) {
        header("Location: view.php?id=$id&name=$name");
    } else {
        $errMsg = "Ada kesalahan di sistem!";
    }
}

?>

<section class="all-course w-80 my-12 px-2 text-center h-auto mx-auto">
    <div class="text-left bg-white my-6 p-4 max-w-7xl md:w-96 md:p-6 lg:p-8 shadow-xl rounded mx-auto">
        <h2 class="text-2xl font-semibold text-gray-600">Review - <?= $name ?></h2>
        <p class="text-sm text-gray-400 font-light">pastikan anda me review dengan jujur.</p>
        <hr class="mt-2 mb-4">
        <ul class="list-decimal y-4">
            <form method="POST">
                <label for="icon" class="text-gray-500">Nama Lengkap<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md text-sm p-2" type="text" name="nama" required>
                </label>
                <br>
                <label for="nama" class="text-gray-500">Email <br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md text-sm p-2" type="email" name="email" required>
                </label>
                <br>
                <label for="rating" class=" text-gray-500">Beri Rating <br>
                    <select name="rating" id="select" class="mt-2 border rounded-md  text-sm p-2 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                        <option value="1.0">1</option>
                        <option value="2.0">2</option>
                        <option value="3.0">3</option>
                        <option value="4.0">4</option>
                        <option value="5.0">5</option>
                    </select>
                </label>
                <br>
                <label for="deskripsi" class="text-gray-500"> Review <br>
                    <textarea class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md text-sm p-2" type="text" cols="30" rows="6" name="pesan" required></textarea>
                </label>
                <br>
                <p class="text-center text-red-400 text-sm">
                    <?php if (isset($errMsg)) {
                        echo 'Maaf, ' . $errMsg;
                    } ?>
                </p>
                <div class="flex justify-center mt-8">
                    <input class="bg-blue-500 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="tambah" value="Submit">
                </div>
            </form>

    </div>
</section>