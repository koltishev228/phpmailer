<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'koltishev.1998@gmail.com';
                $mail->Password   = 'bqda zykj hmea ojoy';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom('koltishev.1998@gmail.com', '6weeks - Форма заповнена');
                $mail->addAddress('6weeks.12h@gmail.com');
                 $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $subject = "6weeks - Форма заповнена";
                $mail->Subject = $subject;
                $mail->isHTML(true);
                $mail->Body    = '<h3>Ім\'я: ' . $name . '</h3><p>Email: ' . $email . '</p><p>Поле для тексту: ' . $description . '</p>';
                $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Invalid email address";
        }
    } else {
        echo "Email is required";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form id="registrationForm" method="post">
    <input type="email" id="emailInput" name="email" placeholder="Email" required>
    <input type="text" name="name" placeholder="Ім'я">
    <textarea name="description"  placeholder="Поле для тексту">

    </textarea>
    <button type="submit" id="registerBtn">Відправити</button>
</form>



<script>

</script>

</body>
</html>
