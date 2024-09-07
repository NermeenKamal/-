<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8">
    <title>فَصَاحَة</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fustat:wght@200;400&family=Reem+Kufi:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="icon" href="img/imgg.png">
</head>
<body>

<header>
    <img id="logo" src="img/فَصَاحَة.png">
    <nav>
        <a href="index.html" class="page active">الصفحة الرئيسية</a>
        <a href="poetry.html" class="page">شعر</a>
        <a href="poem.html" class="page">قصائد</a>
        <a href="team.html" class="page">الفريق</a>
        <a href="References.html" class="page">المراجع</a>
    </nav>
</header>

<section class="rec">
    <div class="container">
        <h1>تسجيل مقترحات</h1>

        <form action="content.php" method="POST">
            <div class="op">
                <label>الإسم</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="name" required>
            </div>
            <div class="oop">
                <label>الإيميل</label>&nbsp;
                <input type="email" name="email" required>
            </div>
            <label>الإقتراحات</label>
            <br>
            <textarea name="recommendation" required></textarea>
            <br> <br>
            <button type="submit" id="submit">إرسال</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $recommendation = $_POST['recommendation'];
            $serverName = "NERMEEN";
            $connectionOptions = array(
                "Database" => "recommend",
                "TrustServerCertificate" => true
            );
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            if ($conn === false) {
                die("<p>Error connecting to the database: " . print_r(sqlsrv_errors(), true) . "</p>");
            }
            $sql = "INSERT INTO Recommendations (name, email, recommendation) VALUES (?, ?, ?)";
            $params = array($name, $email, $recommendation);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                die("<p>Error inserting data: " . print_r(sqlsrv_errors(), true) . "</p>");
            } else {
                echo "<script>alert('!تم الإرسال');</script>";
            }
            sqlsrv_close($conn);
        }
        ?>

    </div>
</section>

<footer id="footer">
    <img class="d" src="img/ض.png">
    <div class="bar-div">
        <img class="bar" src="img/bar.png">
    </div>
    <div class="footer-contact">
        <h5>يمكنك متابعتنا على</h5>
        <div class="icons">
            <i class="fa-brands fa-facebook-f" onclick='window.location.href="https://www.facebook.com/NermeenKamalEldin"' style="color: #f8ffca;"></i>
            <i class="fa-brands fa-instagram" onclick='window.location.href="https://www.instagram.com/nermeen_kamaleldin/"' style="color: #f8ffca;"></i>
            <i class="fa-brands fa-github" onclick='window.location.href="https://github.com/NermeenKamal"' style="color: #f8ffca;"></i>
            <i class="fa-brands fa-linkedin-in" onclick='window.location.href="https://www.linkedin.com/in/nirmn-kamal/"' style="color: #f8ffca;"></i>
            <i class="fa-brands fa-behance" onclick='window.location.href="https://www.behance.net/Nermeen_Kamal"' style="color: #f8ffca;"></i>
        </div>
        <button class="recommend" onclick='window.location.href="content.php"'>إرسال مقترحات</button>
    </div>
</footer>

<script src="js/script.js"></script>
</body>
</html>
