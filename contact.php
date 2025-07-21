<?php
// contact.php - 고객센터 페이지
require_once 'db_config.php';

$sql = "select title, contents from ga_contact order by regdate desc limit 10";  
$res = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>고객센터 | 스마트탁송</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="index.php" class="logo">스마트탁송</a>
            <nav>
                <ul>
                    <li><a href="index.php">홈</a></li>
                    <li><a href="service.php">서비스안내</a></li>
                    <li><a href="recruit.php">기사모집</a></li>
                    <li><a href="contact.php" class="active">고객센터</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="page-title">
            <h1>고객센터</h1>
        </section>
        <section class="contact-detail">
            <h2>고객센터 안내</h2>
            <p>문의사항이 있으시면 언제든 연락주세요.</p>
            <ul>
                <li>대표번호: <strong>1533-6074</strong></li>
                <li>이메일: <strong>info@gaontrans.co.kr</strong></li>
                <li>주소: 서울특별시 강남구 영동대로 602 6층 제트141(삼성동, 삼성동 미켈란107)</li>
            </ul>
            <a href="inquiry.php" class="cta-btn">전속 계약 문의</a>
        </section>
    </main>
<?
    include "footer.php";
?>
</body>
</html> 