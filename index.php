<?php
include "header.php";

$result = mysqli_query($db, "SELECT * FROM course");

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
$f_course = $data;

?>

<section class="hero mb-48 md:mb-80">
    <div class="hero flex flex-col md:flex-row justify-between mt-28 items-center">
        <div class="hero-left max-w-xl text-center md:text-left ">
            <h1 class="font-bold text-4xl md:text-6xl  tracking-wide leading-tight text-gray-700 animate__animated animate__fadeInUp">Temukan course pemrograman terbaik disini!</h1>
            <p class="font-light text-xl tracking-wide text-gray-500 mt-4 mb-10 animate__animated animate__fadeInUp animate__delay-1s">website ini dibangun untuk membantu kalian yang ingin belajar pemrograman.</p>
            <a class="text-lg font-semibold rounded-md bg-blue-500 text-white px-6 py-3 hover:bg-blue-700 transition duration-300 animate__animated animate__fadeInUp animate__delay-2s" href="all-course.php">Lihat Course</a>
        </div>
        <div class="hero-right hidden md:block">
            <img class="animate__animated animate__fadeInRight" src="assets/img/hero.svg" alt="" width="400">
        </div>
    </div>
</section>
<section class="course mb-14 px-4" id="course">
    <div class="course-head text-center">
        <h1 class="font-semibold text-2xl text-gray-700">Apa yang ingin kamu pelajari?</h1>
    </div>
    <div class="course-body text-center mt-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
            <?php
            $i = 0;
            foreach ($f_course as $course) : ?>
                <a href="course.php?id=<?= $course['id']; ?>&code=<?= $course['code']; ?>">
                    <div class="card px-10 py-5 rounded-md shadow-md hover:bg-gray-100 transition duration-300">
                        <div class="card-head flex justify-center">
                            <img src="<?= $course['logo_course']; ?>" />
                        </div>
                        <div class="card-body my-2">
                            <p class="text-gray-500"><?= $course['nama_course']; ?></p>
                        </div>
                    </div>
                </a>
                <?php if (++$i == 4) break ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="course-lainnya mb-10 mt-10 text-center">
        <a href="all-course.php" class="py-2 px-4 border-2 rounded-md text-blue-500  hover:text-white hover:bg-blue-500 transition duration-300 border-blue-500">Lihat lainnya...</a>
    </div>
</section>
<?php
include "footer.php";
?>