<?php
include("config.php");
include("setup.php");

$webhook = json_decode(file_get_contents('php://input', 'rb'), true);
if (!empty($webhook)) {
    foreach ($webhook['_push']['android_tokens'] as $token) {
        $req = $db->prepare("INSERT INTO tokens (user_id, app_id, token) VALUES(:user_id, :app_id, :token)");
        $req->execute(array(
            'user_id' => $webhook['user_id'],
            'app_id' => $webhook['app_id'],
            'token' => $token,
        ));
    }
}
?>