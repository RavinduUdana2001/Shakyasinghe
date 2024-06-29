<?PHP

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = uniqid();
        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'srishakyasinhesarasavilk@gmail.com';
        $mail->Password = 'bbok emqc zlsu ccef';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('srishakyasinhesarasavilk@gmail.com', 'Reset Password');
        $mail->addReplyTo('srishakyasinhesarasavilk@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'srishakyasinhesarasavi';
        $bodyContent = '<h3 style="color:black;">Your Verification Code is '    .$code.'</h3>';
        $mail->Body    = $bodyContent;


        

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            echo 'Success';
        }
    } else {
        echo ("Enter Email Address.");
    }
} else {
    echo ("Please enter your Email Address in Email Field.");
}
