<div class="container">
    <h1 class="text-center"> Login</h1>
    <form action="login.php" method="POST" class="w-50 mx-auto">
        <label>Username</label><br>
        <input class="form-control" type="text" name="username" placeholder="Ex. rofi">
        <br>
        <label>password</label><br>
        <input class="form-control" type="text" name="password" placeholder="Ex. ---">
        <br>
        <input class="btn btn-primary" type="submit" name="login" value="masuk">
    </form>
</div>
<?php
include("./input-config.php");
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM akun WHERE username = '$username' AND password=MD5 ('$password');";
    $data = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($data) > 0) {
        $_SESSION["login"] = TRUE;
        $row = mysqli_fetch_array($data);

        $_SESSION["login"] = TRUE;
        $_SESSION["akun_id"] = $row["akun_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        echo "
            <script>
                alert('login berhasil');
                window.location = 'input-datadiri.php';
            </script>
            ";
    } else {
        echo " 
            <script>
                alert('akun tidak ditemukan, coba lagi NT DEKKK!');
                window.location = 'login.php';
            </script>
        ";
    }
}
?>