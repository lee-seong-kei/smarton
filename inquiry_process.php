<?php
// inquiry_process.php - 전속 계약 문의 처리
require_once 'db_config.php';

// 입력값 받기
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');
$agree = isset($_POST['agree']) ? 1 : 0;

if (!$name || !$phone || !$message || !$agree) {
    echo '<script>alert("모든 항목을 입력하고 개인정보 동의에 체크해 주세요."); history.back();</script>';
    exit;
}

// DB 저장
$stmt = $conn->prepare("INSERT INTO ga_inquiries (name, phone, message, agree, regdate) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param('sssi', $name, $phone, $message, $agree);
$success = $stmt->execute();
$stmt->close();

// 메일 전송
$to = 'info@gaontrans.co.kr'; // 실제 운영시 변경
$subject = '[스마트탁송] 전속 계약 문의';
$body = "성함 및 직급: $name\n연락처: $phone\n문의사항: $message";
$headers = "From: webmaster@localhost\r\nContent-Type: text/plain; charset=utf-8";
@mail($to, $subject, $body, $headers);

if ($success) {
    echo '<script>alert("정상적으로 접수되었습니다. 감사합니다."); location.href="inquiry.php";</script>';
} else {
    echo '<script>alert("접수에 실패했습니다. 다시 시도해 주세요."); history.back();</script>';
} 