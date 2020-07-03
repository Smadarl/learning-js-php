<?php

$pattern = "/^background ([a-z]+)$/";

if (preg_match($pattern, $_POST['task'], $matches)) {
    header("Location: /index.php?bg=" . $matches[1]);
    exit();
}

include("db_connection.php");

$sql = "INSERT INTO tasks (name, createdTime) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['task'], date('Y-m-d H:i:s')]);

header("Location: /index.php");
