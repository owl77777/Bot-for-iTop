<?php
$token = 'ВАШ_ТОКЕН_БОТА';
$api_url = 'https://api.telegram.org/bot' . $token . '/';
//пишем в файл лог сообщений
$data = json_decode(file_get_contents('php://input'), TRUE);
file_put_contents('bot_log.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

// Проверяем тип обновления (в данном случае сообщение)
if (isset($data['message'])) 
    $chat_id = $data['message']['chat']['id'];
    $message = $data['message']['text'];
    
if ($message == '/start') 
        {sendMessage($chat_id, "Привет!👋 Я бот HelpMe. Сюда я буду отправлять уведомления о назначенных Вам заявках. Спасибо за регистрацию и коcмических Вам достижений!🚀");} 
        else
        {
      sendMessage($chat_id, "Скоро я освою ИИ. А пока я не понимаю, что Вы хотите мне сказать👽");
        }


function sendMessage($chat_id, $message) {
    global $api_url;
    $url = $api_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);
    file_get_contents($url);
}

?>
