<?php
include("config.php");
include("setup.php");

$webhook = json_decode(file_get_contents('php://input', 'rb'), true);
if (!empty($webhook)) {
    foreach ($webhook['_push']['android_tokens'] as $token) {
        $req = $db->prepare("SELECT COUNT(*) FROM tokens WHERE user_id = ?");
        $req->execute(array($webhook['user_id']));
        $get_token = $req->fetchColumn();
        error_log($get_token);
        if ($get_token) {
            $req = $db->prepare("INSERT INTO tokens (user_id, app_id, token) VALUES(:user_id, :app_id, :token)");
            $req->execute(array(
                'user_id' => $webhook['user_id'],
                'app_id' => $webhook['app_id'],
                'token' => $token,
            ));
        }
    }
}
http_response_code(200);
?>