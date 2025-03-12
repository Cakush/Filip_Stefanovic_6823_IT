<?php

require_once '../../db.php';

$stmt = $pdo-> prepare("
    Delete from proizvodi where id = :id
");

$stmt->execute([
    'id' => $_GET['id']
]);

header("Location: ../index.php")
?>