<?php

    require_once '../db.php';

    $stmt = $pdo -> prepare("
        INSERT INTO komentari (komentar, proizvod_id)
        VALUES (:komentar, :proizvod_id)
    ");

    $stmt ->execute([
        'komentar' => $_POST["komentar"],
        'proizvod_id' => $_POST["proizvod_id"]
    ]);

    header("Location: ../opsirnije.php?id=". $_POST['proizvod_id']);

?>