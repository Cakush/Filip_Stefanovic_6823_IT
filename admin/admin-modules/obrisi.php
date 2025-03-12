<?php require_once '../../db.php'; ?>

<?php

    $stmt = $pdo -> prepare("
        Delete from komentari where proizvod_id = :id
    ");

    $stmt -> execute([
        "id" => $_GET['id']
    ]);
?>

<?php
$stmt = $pdo-> prepare("
    Delete from proizvodi where id = :id
");

$stmt->execute([
    'id' => $_GET['id']
]);

header("Location: ../index.php")
?>