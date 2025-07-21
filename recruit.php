<?php
// recruit.php - 기사모집 페이지
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>기사모집 | 스마트탁송</title>
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
                    <li><a href="recruit.php" class="active">기사모집</a></li>
                    <li><a href="faq.php">고객센터</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="page-title">
            <h1>기사모집</h1>
        </section>
        <section class="recruit-detail">
            <h2>스마트탁송 기사 모집 안내</h2>
            <p>스마트탁송과 함께할 성실한 기사님을 모집합니다.<br>
            차량 운송 경험이 있으신 분, 책임감 있고 친절하신 분 환영합니다.</p>
            <ul>
                <li>지원 자격: 1종 보통 이상 운전면허 소지자</li>
                <li>근무 형태: 프리랜서/계약직</li>
                <li>지원 방법: 아래 지원서 작성 또는 고객센터 문의</li>
            </ul>
            <a href="contact.php" class="cta-btn">지원/문의하기</a>
        </section>
    </main>
<?
    include "footer.php";
?>
</body>
</html> 