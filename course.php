<?php
include "header.php";

$id = $_GET['id'];
$code = $_GET['code'];


$result = mysqli_query($db, "SELECT * FROM allcourse WHERE code='$code'");

$name = mysqli_query($db, "SELECT * FROM course WHERE code='$code'");

$namaCourse = mysqli_fetch_assoc($name);

?>


<section class="all-course my-6 px-2 text-center md:h-screen max-w-3xl mx-auto ">


    <?php
    if (mysqli_num_rows($result) > 0) { ?>
        <div class="all-course-head text-left">
            <h1 class="font-semibold text-2xl md:text-4xl text-gray-700">Course <?= $namaCourse['nama_course'] ?> </h1>
            <p class="font-sm text-gray-500">Kami akan terus menambahkan course baru.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mt-6">
            <?php while ($course = mysqli_fetch_assoc($result)) { ?>


                <!-- // mengambil data comment -->
                <?php
                $id = $course['id'];
                $jmlhReview = mysqli_query($db, "SELECT * FROM comment WHERE code='$id'");

                ?>

                <a href="view.php?id=<?= $course['id']; ?>&name=<?= $course['nama_allcourse']; ?>">
                    <div class="card shadow-md transition duration-300 rounded-lg">
                        <!-- <p class="absolute px-2 py-1 bg-blue-500 text-white rounded-md text-sm font-light">Video</p> -->
                        <div class="card-head flex rounded-t-lg justify-center p-4 bg-gray-100">
                            <img class="" src="<?= $course['logo_allcourse']; ?>" />
                        </div>
                        <div class="card-body my-2 px-4 pb-4 text-left">
                            <p class="text-gray-500 text-lg font-semibold"><?= $course['nama_allcourse']; ?></p>
                            <p class="truncate text-sm text-gray-500"><?= $course['author_allcourse']; ?></p>
                            <div class="flex justify-end mt-4 items-center text-sm text-gray-500">
                                <i class="fas fa-comment mr-2"></i>
                                <p class=""><?= mysqli_num_rows($jmlhReview); ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <hr class="my-24">
        <div class="empty_course text-gray-500 text-sm text-gray-100-center mb-24">
            <p class="mb-4 text-xl font-light">Bantu kami mencari course untuk <?= $namaCourse['nama_course'] ?></p>
            <a class="inline-block font-semibold rounded-lg text-lg bg-blue-500 hover:bg-blue-700 transition text-white px-4 py-2 mt-2" href="kontribusi.php">Kontribusi</a>
        </div>
    <?php } ?>


    <?php if (mysqli_num_rows($result) < 1) { ?>
        <div class="empty_course text-gray-500 text-sm text-gray-100-center my-24 ">
            <p class="font-semibold mb-1 text-xl md:text-2xl">Maaf, Course <?= $namaCourse['nama_course'] ?> belum tersedia</p>
            <p class="mb-4 text-xl font-light">Bantu kami mencari course untuk <?= $namaCourse['nama_course'] ?></p>
            <a class="inline-block font-semibold rounded-lg text-lg bg-blue-500 hover:bg-blue-700 transition text-white px-4 py-2 mt-2" href="kontribusi.php">Kontribusi</a>
        </div>
    <?php } ?>

</section>


<?php
include "footer.php";
?>