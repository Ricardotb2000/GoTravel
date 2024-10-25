<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Leer el índice del producto a eliminar
    $data = json_decode(file_get_contents('php://input'), true);
    $index = $data['index'];

    if (isset($_SESSION['cart'][$index])) {
        // Eliminar el producto del carrito
        $removedItem = $_SESSION['cart'][$index];
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el array

        // Calcular nuevo total
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'];
        }

        echo json_encode(['success' => true, 'total' => $total]);
    } else {
        echo json_encode(['success' => false]);
    }
}
