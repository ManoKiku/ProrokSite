<?php

require_once '../config.php';
header('Content-Type: application/json');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Невозможно подключиться к базе данных']);
    exit;
}

$data = json_decode(file_get_contents("php://input"));
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Невалидный JSON']);
    exit;
}

$caption = trim($data->caption);
$name = trim($data->name);

if (empty($caption)) {
    echo json_encode(['status' => 'error', 'message' => 'Значение описания свечки пусто']);
    exit;
}

if (empty($name)) {
    echo json_encode(['status' => 'error', 'message' => 'Значение имени пусто']);
    exit;
}

if (mb_strlen($caption) > 100) {
    echo json_encode(['status' => 'error', 'message' => 'Значение описания свечки превышает 100 символов']);
    exit;
}

if (mb_strlen($name) > 50) {
    echo json_encode(['status' => 'error', 'message' => 'Значение имени превышает 50 символов']);
    exit;
}

$ip = $_SERVER['HTTP_CLIENT_IP'] ?? 
      $_SERVER['HTTP_X_FORWARDED_FOR'] ?? 
      $_SERVER['HTTP_X_FORWARDED'] ?? 
      $_SERVER['HTTP_FORWARDED_FOR'] ?? 
      $_SERVER['HTTP_FORWARDED'] ?? 
      $_SERVER['REMOTE_ADDR'] ?? 
      null;

if (empty($ip)) {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка во время добавления свечки: невозможно получить ip адрес отправителя']);
    exit;
}

$query = 'SELECT * FROM rate_limit WHERE ip = ?';
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $ip);

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при проверке лимита']);
    exit;
}

$result = $stmt->get_result();
$record = $result->fetch_assoc();
$current_time = date('Y-m-d H:i:s');

if (empty($record)) {
    $query = 'INSERT INTO rate_limit (ip, last_access, request_count) VALUES (?, ?, 1)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $ip, $current_time);
    
    if (!$stmt->execute()) {
        error_log("Insert failed: " . $stmt->error);
        echo json_encode(['status' => 'error', 'message' => 'Ошибка при создании записи']);
        exit;
    }
} else {
    $last_access = strtotime($record['last_access']);
    
    if ($last_access + 3600 >= time()) {
        echo json_encode(['status' => 'error', 'message' => 'Свечку можно ставить не чаще чем 1 раз в час!']);
        exit;
    }
    
    $query = 'UPDATE rate_limit SET last_access = ? WHERE ip = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $current_time, $ip);
    
    if (!$stmt->execute()) {
        error_log("Update failed: " . $stmt->error);
        echo json_encode(['status' => 'error', 'message' => 'Ошибка при обновлении лимита']);
        exit;
    }
}
$query = 'INSERT INTO candles (caption, name) VALUES (?, ?)';
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $caption, $name);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Свечка успешно поставлена']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при добавлении свечки']);
}

$stmt->close();
$conn->close();