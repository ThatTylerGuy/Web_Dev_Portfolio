<?php
if (! empty($_POST["send"])) {

    if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        $toEmail = "tylercurtis098@gmail.com";

        // CRLF injection attack prevention
        $name = strip_crlf($name);
        $email = strip_crlf($email);
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";

        if (mail($toEmail, $subject, $message, $mailHeaders)) {
            ?>
    <div id="success">Your contact information is received successfully!</div>
<?php
        }
    }
}
?>