<?php include "admin-modules/head.php"; ?>

<?php
    include "../db.php"; 

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
                INSERT INTO proizvodi
                (naziv, cena, popust, deskripcija)
                VALUES (:naziv, :cena, :popust, :deskripcija)
            ");
        
            $stmt->execute(["naziv" => $naziv, "cena" => $cena, "popust" => $popust, "deskripcija" => $deskripcija]);

            header("Location: index.php");
            exit();
        }
    }
?>

<h1>Dodaj proizvod</h1>

<h3 style="color: red;"><?= $error ?></h3>
<form action="" method="post">
    <div class="form-group">
        <label for="">Unesite naziv</label>
        <input type="text" class="form-control" name="naziv">
    </div>
    <div class="form-group">
        <label for="">Unesite cenu</label>
        <input type="number" step="0.01" class="form-control" name="cena">
    </div>
    <div class="form-group">
        <label for="">Unesite popust (opciono)</label>
        <input type="number" class="form-control" name="popust">
    </div>
    <div class="form-group">
        <label for="">Unesite deskripciju (opciono)</label>
        <textarea name="deskripcija" class="form-control" placeholder="Unesite deskripciju" id=""></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Dodaj proizvod</button>
    <a href="index.php" class="btn btn-danger">Odustani</a>
</form>

<?php include "admin-modules/foot.php"; ?>