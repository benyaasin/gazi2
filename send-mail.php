<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $message = $_POST['message'] ?? '';

    $to = "yasynaydyn@gmail.com";
    $subject = "Yeni Servis Talebi";
    
    $email_content = "Yeni bir servis talebi alındı:\n\n";
    $email_content .= "Ad Soyad: " . $name . "\n";
    $email_content .= "Telefon: " . $phone . "\n";
    $email_content .= "Adres: " . $address . "\n";
    $email_content .= "Mesaj: " . $message . "\n";
    
    $headers = "From: " . $name . " <" . $to . ">\r\n";
    $headers .= "Reply-To: " . $to . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if(mail($to, $subject, $email_content, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Talebiniz başarıyla alınmıştır. En kısa sürede size dönüş yapacağız.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Bir hata oluştu. Lütfen daha sonra tekrar deneyin.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Geçersiz istek metodu.']);
}
?> 