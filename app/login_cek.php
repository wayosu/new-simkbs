<?php
session_start();

include 'app/koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);

        if (!empty($username) && !empty($pass)) {
            $sql_query = "SELECT * FROM user WHERE username='$username'";
            $result = $mysqli->query($sql_query);
            $row = mysqli_num_rows($result);

            if ($row === 1 ) {
                $q = mysqli_fetch_assoc($result);
                if ($pass == $q['pass']) {
                    $_SESSION['username'] = $username;
                    $_SESSION['nama'] = $q['nama'];

                    header('Location: dashboard');
                    exit;
                } else {
                    ?>
                    <script>
                        alert("Password yang anda masukkan salah!'");
                        document.location.href = 'login';
                    </script>
                <?php
                    return false;
                }
            } else {
                ?>
                <script>
                    alert("Email yang anda masukkan salah!'");
                    document.location.href = 'login';
                </script>
            <?php
                return false;
            }
        } else {
            ?>
            <script>
                alert("Mohon masukkan email dan password anda!'");
                document.location.href = 'login';
            </script>
        <?php
            return false;
        }
}
?>