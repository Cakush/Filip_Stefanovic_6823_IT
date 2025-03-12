<?php include "admin-modules/head.php"?>
<?php include "../db.php" ?>

<?php 
// Fetch product details
$stmt = $pdo->prepare("
    SELECT * FROM proizvodi
    WHERE id = :id
");

$stmt->execute([
    "id" => $_GET['id']
]);

$proizvod = $stmt->fetch();
?>

<?php 
// Fetch comments for the product
$stmt = $pdo->prepare("
    SELECT * FROM komentari
    WHERE proizvod_id = :id
");

$stmt->execute([
    "id" => $_GET['id']
]);

$komentari = $stmt->fetchAll();
?>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <?php include "admin-modules/akcija.php"?>
        </div>
        <a href="index.php" class="btn btn-primary">Nazad na sve proizvode</a>
    </div>
    <div class="col-md-9">
        <h1><?= $proizvod['naziv'] ?></h1>
        <h3>Cena: <?= $proizvod['cena'] ?> din</h3>
        <h3>Cena sa popustom:
            <?php if ($proizvod['popust'] != null) {
                $popust = ($proizvod['cena'] * $proizvod['popust']) / 100;
                echo ($proizvod['cena'] - $popust);
            } else {
                echo "Nije na popustu";
            } ?>
        </h3>
        <h4 class="text-muted"><?= $proizvod['deskripcija'] ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2>Ostavite komentar</h2>
        <form action="admin-modules/dodaj-komentar.php" method="post">
            <div class="form-group">
                <textarea name="komentar" class="form-control" placeholder="Unesite komentar" id=""></textarea>
                <input type="hidden" name="proizvod_id" value="<?= $proizvod['id'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Postavi</button>
        </form>
    </div>
</div>

<div class="row">
    <h2>Komentari:</h2>
    <div class="col-md-5">
        <div class="list-group">
            <?php foreach ($komentari as $komentar) { ?>
                <div class="jbg">
                    <div class="list-group-item">
                        <small class="text-muted"><?= date("d.m.Y. H:i", strtotime($komentar['objavljen'])) ?></small>
                        <p><?= $komentar['komentar'] ?></p>
                        <a href="admin-modules/obrisi-komentar.php?id=<?= $komentar['id'] ?>" class="btn btn-danger">Obrisi</a>
                    </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include "admin-modules/foot.php" ?>