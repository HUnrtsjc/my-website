<?php
// แทนค่าด้วย Channel Access Token ของคุณ
$access_token = 'Bearer c3771167bf7edbda136c88da729f017a';

// แทนค่าด้วย User ID ของบัญชี LINE ส่วนตัวของคุณ
$user_id = 'n0932820048t';

// รับข้อมูลจากฟอร์ม
$message = $_POST['message'];

// URL ของ LINE Messaging API
$url = 'https://api.line.me/v2/bot/message/push';

// ข้อมูลที่จะส่งไปยัง API
$data = [
    'to' => $user_id,
    'messages' => [
        ['type' => 'text', 'text' => $message]
    ]
];

// เปลี่ยนข้อมูลเป็น JSON
$post = json_encode($data);

// Headers สำหรับ HTTP request
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
];

// เริ่มต้นการเชื่อมต่อด้วย cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// ทำการส่งข้อมูล
$result = curl_exec($ch);

// ปิดการเชื่อมต่อ cURL
curl_close($ch);

// แสดงผลลัพธ์จากการส่งข้อมูล
echo $result;
?
