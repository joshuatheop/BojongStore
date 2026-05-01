<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bojongstore;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "✅ DB connected OK\n";
    $rows = $pdo->query('SELECT COUNT(*) as cnt FROM users')->fetch();
    echo "Users in table: " . $rows['cnt'] . "\n";
} catch (PDOException $e) {
    echo "❌ FAIL: " . $e->getMessage() . "\n";
}
