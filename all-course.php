<?php

include "header.php";

$result = mysqli_query($db, "SELECT * FROM course");

// fitur Search
$data = mysqli_query($db, "SELECT * FROM course");

if (isset($_GET['btn-search'])) {
    $cari = $_GET['search'];
    $data = mysqli_query($db, "SELECT * FROM course WHERE nama_course = '$cari'");
} else {
    $data = mysqli_query($db, "SELECT * FROM course");
}

?>

<section class="all-course mt-8 px-2 md:h-screen text-center">
    <div class="all-course-head text-center md:text-center">
        <h1 class="font-semibold text-2xl md:text-4xl text-gray-700">Temukan course & tutorial pemrograman terbaik!</h1>
    </div>
    <div class="search mt-8">
        <form class="flex justify-end items-center" action="all-course.php" method="GET">
            <input class="border p-2 w-full font-light text-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-md" type="text" name="search" placeholder="Cari bahasa yang ingin anda pelajari">
            <button class="text-white ml-2 bg-blue-500 text-lg font-light px-4 py-2 rounded-md" type="submit" name="btn-search"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-6">
        <?php
        if (mysqli_num_rows($data) > 0) {
            while ($course = mysqli_fetch_assoc($data)) {

        ?>
                <a href="course.php?id=<?= $course['id']; ?>&code=<?= $course['code']; ?>">
                    <div class="card px-10 py-5 rounded-md shadow-md hover:bg-gray-100 transition duration-300">
                        <div class="card-head flex justify-center">
                            <img src="<?= $course['logo_course']; ?>" />
                        </div>
                        <div class="card-body my-2">
                            <p class="text-gray-500 font-semibold"><?= $course['nama_course']; ?></p>
                        </div>
                    </div>
                </a>
        <?php }
        } else {
            $errMsg = "No Result Found!";
            $errMsg2 = "Kami adalah situs web berbasis komunitas. Silakan kirimkan course atau tutorial yang ingin Anda rekomendasikan kepada komunitas.";
        } ?>
    </div>
    <div class="errMsg mt-10 mb-36 text-center h-screen">
        <p class="text-gray-500 text-xl font-semibold">
            <?php if (isset($errMsg)) {
                echo $errMsg;
            } ?>
        </p>
        <p class="text-gray-500 text-sm mt-4">
            <?php if (isset($errMsg2)) {
                echo $errMsg2;
            } ?>
        </p>
    </div>
</section>

<?php
include "footer.php";
?>