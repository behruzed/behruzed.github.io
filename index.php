<?php

error_reporting(0);
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok = false;
foreach ($telegram_ip_ranges as $telegram_ip_range) {
    if (!$ok) {
        $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
        $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
        if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) {
            $ok = true;
        }
    }
}
if (!$ok) {
    die("kill signal");
}

define('API_KEY', 'YOUR_API_KEY_HERE');

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res, true);
    }
}

$up = json_decode(file_get_contents('php://input'), true);
$message = $up['message'];
$text = $message['text'];
$chat_id = $message['chat']['id'];
$from_id = $message['from']['id'];
$file_id = $message['audio']['file_id'];
$file_size = $message['audio']['file_size'];
$duration = $message['audio']['duration'];
$channel = '@munisa_onlinesavdo_wechat'; // Kanal nomi

$resuser = bot('getchatmember', ['chat_id' => $channel, 'user_id' => $from_id]);

if (in_array($resuser['result']['status'], ['left', 'kicked']) || !$resuser['ok']) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "🤖 Robotda foydalanishni davom etish uchun $channel kanaliga obuna bo'ling"
    ]);
} else {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Siz kanalga obuna bo'ldingiz"
    ]);
}

unlink('error_log');
?>
