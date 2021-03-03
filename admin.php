<?php
include_once "header.php";
error_reporting(0);

$result = mysqli_query($db, "SELECT * FROM admin");

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
        if ($_POST['username'] = '' && $_POST['password'] = '') {
            $err_msg = 'form kosong!';
        }
        $_SESSION['username'] = $row['username'];
        $time_login = date('d F Y');
        mysqli_query($db, "UPDATE admin SET date='$time_login'");
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $err_msg = 'username atau password salah!';
    }

    // if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
    // } else {
    // }
}
?>
<section class="all-course w-80 mt-24 px-2 text-center h-screen mx-auto">
    <div class="cardAdmin p-4 shadow-md rounded-lg">
        <div class="header mb-8">
            <h1 class="text-4xl font-semibold text-gray-500">Login Admin</h1>
        </div>
        <div class="form">
            <form method="POST">
                <label for="username">
                    <input class="mb-4 shadow-lg rounded-md text-lg font-light p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Username" type="text" name="username" required>
                </label>
                <br>
                <label for="password">
                    <input class="mb-8 shadow-lg rounded-md text-lg font-light p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Password" type="password" name="password" required>
                </label>
                <br>
                <input class="bg-blue-500 text-white px-6 py-2 rounded-md transition duration-300 cursor-pointer shadow-md hover:shadow-lg" type="submit" name="submit" value="Login">
                <br>
                <p class="mt-2 text-red-400 transition duration-300"><?= $err_msg; ?></p>
            </form>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>