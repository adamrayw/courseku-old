<?php
error_reporting(0);
include "header.php";

// menampung session username
$user = $_SESSION['username'];

// fitur Search
$data = mysqli_query($db, "SELECT * FROM allcourse");

if (isset($_GET['btn-search'])) {
    $cari = $_GET['search'];
    $data = mysqli_query($db, "SELECT * FROM allcourse WHERE nama_allcourse = '$cari'");
} else {
    $data = mysqli_query($db, "SELECT * FROM allcourse");
}

// ------------------

// mengambil data admin

$date_admin = mysqli_query($db, "SELECT * FROM admin");

$date = mysqli_fetch_assoc($date_admin);

// -------------------

// mengambil data course

$bpemrograman = mysqli_query($db, "SELECT * FROM course");

// ------------------


?>


<?php if (!isset($_SESSION['username'])) { ?>
    <div class="error text-center mt-10">
        <i class="fas fa-exclamation-circle fa-4x text-red-600"></i>
        <p class='mt-6 text-2xl text-gray-500 mb-4'>Anda melakukan tindakan illegal!</p>
        <a class='text-red-500 font-semibold text-center' href='index.php'>BACK TO HOME</a>
    </div>

<?php
    die();
}
?>

<div class="view my-6 px-2 md:max-w-2xl mx-auto">
    <div class="wrapper shadow-lg p-4 text-center">
        <h2 class="text-2xl font-semibold text-gray-700">Selamat Datang, <?= $user; ?></h2>
        <p class="text-sm font-light text-gray-500 mb-2"><?= $date['date'] ?></p>
        <a class="text-red-600 text-lg font-medium" href="logout.php">Log out</a>
    </div>
    <div class="search mt-8">
        <form class="flex justify-end items-center" action="admin-dashboard.php" method="GET">
            <input class="border p-2 w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition  rounded-md" type="text" name="search" placeholder="Cari Course">
            <button class="text-white ml-2 bg-blue-500 font-semibold px-4 py-2 rounded-md" type="submit" name="btn-search">Cari</button>
        </form>
    </div>
    <div class="total_course mt-6 overflow-x-auto">
        <div class="mb-2 flex justify-between items-center">
            <h1 class="font-semibold text-xl text-gray-700">List Course Aktif</h1>
            <a href="add-course.php" class="bg-blue-500 text-white text-sm px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = true"><i class="fas fa-plus-circle fa-lg"></i></a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="border font-light w-full">
            <thead>
                <tr class="font-medium">
                    <td class="border p-4">Id</td>
                    <td class="border p-4">Nama Course</td>
                    <td class="border p-4">Channel</td>
                    <td class="border p-4">Code</td>
                    <td class="border p-4">Action</td>
                </tr>
            </thead>
            <tbody class="border">
                <?php
                if (mysqli_num_rows($data) > 0) {
                    while ($course = mysqli_fetch_assoc($data)) {
                ?>
                        <tr>
                            <td class="border text-center p-2 text-sm"><?= $course['id']; ?></td>
                            <td class="border p-2 text-sm"><?= $course['nama_allcourse'] ?></td>
                            <td class="border p-2 text-sm"><?= $course['author_allcourse'] ?></td>
                            <td class="border p-2 text-sm"><?= $course['code'] ?></td>
                            <td class="border text-center p-2">
                                <a href="edit-course.php?course=<?= $course['id']; ?>" class="bg-blue-500 inline-block text-white text-sm px-4 py-2 rounded no-outline focus:shadow-outline select-none">Edit</a>
                            </td>
                        </tr>
                <?php }
                } else {
                    $errMsg = "Course tidak ada, coba keyword harus jelas dan lengkap.";
                } ?>
            </tbody>
        </table>
    </div>


    <!-- Bahasa Pemrogramn -->


    <div class="total_course mt-6 overflow-x-auto">
        <div class="mb-2 flex justify-between items-center">
            <h1 class="font-semibold text-xl text-gray-700">Bahasa Pemrograman Aktif</h1>
            <a href="add-bpemrograman.php" class="bg-blue-500 text-white text-sm px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = true"><i class="fas fa-plus-circle fa-lg"></i></a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="border font-light w-full">
            <thead>
                <tr class="font-medium">
                    <td class="border p-4">Id</td>
                    <td class="border p-4">Logo</td>
                    <td class="border p-4">Nama Course</td>
                    <td class="border p-4">Code</td>
                    <td class="border p-4">Action</td>
                </tr>
            </thead>
            <tbody class="border">
                <?php
                if (mysqli_num_rows($bpemrograman) > 0) {
                    while ($courses = mysqli_fetch_assoc($bpemrograman)) {

                ?>
                        <tr>
                            <td class="border text-center p-2 text-sm"><?= $courses['id']; ?></td>
                            <td class="border p-2"><img src="<?= $courses['logo_course']; ?>" alt="logo"></td>
                            <td class="border p-2 text-sm"><?= $courses['nama_course'] ?></td>
                            <td class="border p-2 text-sm"><?= $courses['code'] ?></td>
                            <td class="border text-center p-2">
                                <a href="edit-bpemrograman.php?id=<?= $courses['id']; ?>" class="bg-blue-500 text-white text-sm px-4 py-2 rounded no-outline focus:shadow-outline select-none">Edit</a>
                            </td>
                        </tr>
                <?php }
                } else {
                    $errMsg = "Course tidak ada, coba keyword harus jelas dan lengkap.";
                } ?>
            </tbody>
        </table>
    </div>

    <div class="errMsg m-10 text-center">
        <p class="text-gray-500">
            <?php if (isset($errMsg)) {
                echo $errMsg;
            } ?></p>
    </div>

</div>
</div>