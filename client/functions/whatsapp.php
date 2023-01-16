<?php
require_once "db.php";
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("location: login.php");
    exit;
}
$email = $_SESSION['email'];

$sql = "SELECT * FROM users";
$query = mysqli_query($connection, $sql);

?>
<?php
$query = mysqli_query($connection, "SELECT * FROM users WHERE email= '$email'");
while ($row = mysqli_fetch_array($query)) {
  ?>
<?php

$curl = curl_init();



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance25781/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=7x8uwjlsajue75q9&to=%2B94778638568&body=Hi! Let us know how we can help and we'll respond shortly.&priority=1&referenceId=",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));
 
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  header('Location: https://api.whatsapp.com/send/?phone=0781667268&text&type=phone_number&app_absent=0');
}
?>
<?php } ?>