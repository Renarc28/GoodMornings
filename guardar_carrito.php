<?php
session_start();

$cart = json_decode(file_get_contents('php://input'), true);

$_SESSION['cart'] = $cart;

echo json_encode(['success' => true]);
?>