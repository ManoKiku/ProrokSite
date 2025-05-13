<?php

require_once '../config.php';
header('Content-Type: application/json');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Невозможно подключиться к базе данных']);
    exit;
}

$query = 'SELECT * FROM candles ORDER BY id DESC';
$stmt = $conn->prepare($query);
$stmt->execute();

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Неполучилось получить свечки']);
    exit;
}

$result = $stmt->get_result();
$records = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode([
    'status' => 'success',
    'message' => 'Свечки были получены',
    'records' => $records
]);

$stmt->close();
$conn->close();