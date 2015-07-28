<?php
include("config.php");
$url = "https://push.ionic.io/api/v1/push";

$data = $db->query("SELECT * FROM tokens");

$tokens = array();
foreach ($data as $token) {
    if ($token['app_id'] == $app_id) {
        $tokens[] = $token['token'];
    }
}

$data = array();
$data['tokens'] = $tokens;

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $data['notification']['alert'] = $message;
} else {
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $data['notification']['alert'] = $message;
    } else {
        ?>
        <form action="" method="post">
            <input name="message" type="text">
            <input type="submit" value="Submit">
        </form>
        <?php
    }
}

if (isset($message)) {
    $data = json_encode($data);
    $private_key = preg_replace("/\n/", "", base64_encode($ionic_private_key));
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "X-Ionic-Application-Id: " . $app_id,
        "Authorization: Basic " . $private_key,
    ));

    $result = curl_exec($ch);
    if ($result == true) {
        echo "Pushed!";
    } else {
        echo "Error!";
    }
}