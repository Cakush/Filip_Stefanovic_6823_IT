<?php include "admin-modules/head.php"; ?>
<?php include "../db.php";?>

<?php

    $stmt = $pdo -> prepare("
        SELECT * FROM proizvodi
        WHERE id = :id
    ");

    $stmt -> execute([
        'id' => $_GET['id']
    ]);

    $proizvod = $stmt -> fetch();

?>

<?php 

    $error = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $naziv = $_POST['naziv'];
        $cena = $_POST['cena'];
        $popust = $_POST['popust'];
        $deskripcija = $_POST['deskripcija'];

        if(empty($naziv) || empty($cena)){
            $error = 'Morate popuniti barem naziv i cenu';
        } else {
            print_r("$naziv, $cena, $popust, $deskripcija");

            $stmt = $pdo->prepare("
                UPDATE proizvodi
                SET naziv = :naziv, cena = :cena, popust = :popust, deskripcija = :deskripcija
                WHERE id = :id
            ");
        
            $stmt->execute(["naziv" => $naziv, "cena" => $cena, "popust" => $popust, "deskripcija" => $deskripcija, 'id' => $_GET['id']]);

            header("Location: index.php");
            exit();
        }
    }
?>

<h1>Izmeni proizvod</h1>

<h3 style="color: red;"><?= $error ?></h3>
<form action="" method="post">
    <div class="form-group">
        <label for="">Unesite naziv</label>
        <input type="text" class="form-control" name="naziv" value="<?= $proizvod['naziv']?>">
    </div>
    <div class="form-group">
        <label for="">Unesite cenu</label>
        <input type="number" class="form-control" name="cena" value="<?= $proizvod['cena']?>">
    </div>
    <div class="form-group">
        <label for="">Unesite popust (opciono)</label>
        <input type="number" class="form-control" name="popust" value="<?= $proizvod['popust']?>">
    </div>
    <div class="form-group">
        <label for="">Unesite deskripciju (opciono)</label>
        <textarea name="deskripcija" class="form-control"><?= $proizvod['deskripcija']?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Izmeni proizvod</button>
    <a href="index.php" class="btn btn-danger">Odustani</a>
</form>

<?php include "admin-modules/foot.php"; ?>