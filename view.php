<?php
include "header.php";

$id = $_GET['id'];
$name = $_GET['name'];

$result = mysqli_query($db, "SELECT * FROM allcourse WHERE id='$id'");


// Mengambil jumlah review
$jmlhReview = mysqli_query($db, "SELECT * FROM comment WHERE code='$id'");

// -------------

// Menampilkan reviewrr
$comment = mysqli_query($db, "SELECT * FROM comment WHERE code='$id'");

?>

<div class="view my-6 px-2 md:max-w-lg mx-auto">
    <div class="shadow-md rounded-b-lg">
        <?php
        while ($course = mysqli_fetch_assoc($result)) { ?>
            <div class="view-head flex flex-col justify-start rounded-t-lg py-4 px-3 text-gray-300 " style="background-image: url('assets/img/image.jpg'); background-repeat: no-repat;
            background-size: cover; 
            background-position: center;">
                <img class="rounded-t-md mb-1" src="<?= $course['logo_allcourse'] ?>" width="96" />
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="font-bold text-2xl"><?= $course['nama_allcourse'] ?></h2>
                        <div class="view-head-sub mt-2">
                            <p class="text-sm text-gray-300"><?= $course['video_allcourse'] ?> | <?= mysqli_num_rows($jmlhReview); ?> Reviews</p>
                        </div>
                    </div>
                    <div>
                        <a class="inline-block px-6 py-2 rounded-md hover:bg-blue-700 transition bg-blue-500 font-semibold text-base text-white" href="<?= $course['link'] ?>" target="_blank">Mulai Belajar</a>
                    </div>
                </div>

            </div>
            <div class="py-4 px-3">
                <div class="view-informations mb-4">
                    <h2 class="mb-2 text-lg text-gray-500 font-semibold">Informasi</h2>
                    <p class="text-lg text-gray-500 font-light"><?= $course['desc_allcourse'] ?></p>
                </div>
                <div class="instructor flex justify-between items-center mb-2">
                    <h2 class="text-gray-500 text-lg font-semibold">Instrukur</h2>
                    <p class="text-lg font-light text-gray-500"><?= $course['author_allcourse'] ?></p>
                </div>
                <hr class="mb-2">
                <div class=" level flex justify-between items-center">
                    <h2 class="text-gray-500 text-lg font-semibold">Tingkat</h2>
                    <p class="text-lg font-light text-gray-500"><?= $course['tingkat'] ?></p>
                </div>
                <!-- <div class="learn-now mt-6 gap-y-2 grid grid-cols-1 md:grid-cols-2 md:gap-x-2 text-center">
                     <a class="px-6 py-2 rounded-md hover:bg-blue-700 hover:text-white transition border hover:border-blue-700 border-blue-500 font-semibold text-base text-blue-500" href="#"><i class="text-red-600 fab fa-youtube fa-lg pr-2"></i>Subscribe</a>

                </div> -->
            </div>
        <?php } ?>
    </div>
    <div class="review mt-10 mb-10">
        <div class="review-head flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-500">Reviews</h2>
            <a class="text-blue-500 hover:underline" href="add-review.php?course=<?= $id; ?>&name=<?= $name ?>">Beri Review</a>
        </div>
        <hr class="mt-2 mb-4">
        <div class="pl-0 review-section grid grid-cols-1 md:grid-cols-1 gap-y-4 md:gap-x-2">
            <?php
            if (mysqli_num_rows($comment) > 0) {
                while ($d = mysqli_fetch_assoc($comment)) { ?>
                    <div class="card-review px-4 py-3 bg-white rounded-lg shadow-md">
                        <div class="card-head flex items-center justify-between">
                            <p class="font-bold text-lg text-gray-800"><?= $d['nama'] ?></p>
                        </div>
                        <p><i class="text-yellow-500 fas fa-star mr-2 mb-3"></i><?= $d['star'] ?></p>
                        <p class=" text-gray-500 font-light"><?= $d['pesan'] ?></p>
                    </div>
                <?php }
            } else { ?>
                <p class="text-center text-sm mt-6 text-gray-500">Jadilah orang pertama yang me review!</p>
            <?php } ?>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>