<?php
//get data from form  

// $name = $_POST['name'];
// $email= $_POST['email'];
// $message= $_POST['message'];
// $to = "dassoahmed@mail.com";
// $subject = "Mail From website";
// $txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
// $headers = "From: noreply@yoursite.com" . "\r\n" .
// "CC: somebodyelse@example.com";
// if($email!=NULL){
//     mail($to,$subject,$txt,$headers);
// }
$to = "dassoahmed@gmail.com";
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $headers = ['From' => ($name?"<$name> ":'').$from,
            'X-Mailer' => 'PHP/' . phpversion()
           ];

    mail($to, $subject, $message."\r\n\r\nfrom: ".$_SERVER['REMOTE_ADDR'], $headers);
    die('OK');
    
} else {
    die('Invalid address');
}
//redirect
echo"message send";
?>