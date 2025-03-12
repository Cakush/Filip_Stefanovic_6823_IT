<?php

require_once '../../db.php';

$id = $_GET['id'];

// Fetch the product ID before deleting the comment
$stmt = $pdo->prepare("
    SELECT proizvod_id FROM komentari WHERE id = :id
");
$stmt->execute(['id' => $id]);
$komentar = $stmt->fetch();
$proizvod_id = $komentar['proizvod_id'];

// Delete the comment
$stmt = $pdo->prepare("
    DELETE FROM komentari WHERE id = :id
");
$stmt->execute(['id' => $id]);

// Redirect to the product details page
header("Location: ../opsirnije.php?id=$proizvod_id");
exit();
?>