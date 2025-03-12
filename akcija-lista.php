<?php include "modul/head.php"?>
<?php include "db.php" ?>
<?php 

$stmt = $pdo -> prepare("
SELECT * FROM proizvodi
");

$stmt -> execute();

$proizvodi = $stmt -> fetchAll();
?>

<center><h1>Frizerksi proizvodi</h1></center>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <?php include "modul/akcija.php"?>
        </div>
        <a href="index.php" class="btn btn-primary">Nazad na sve proizvode</a>
    </div>
    <div class="col-md-9">
        <table class="table">
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Cena</th>
                    <th>Popust</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proizvodi as $proizvod) { 
                    if ($proizvod['popust'] != null) { ?>
                        <tr>
                        <td><?= $proizvod['naziv']?></td>
                        <td><?php if ($proizvod['popust'] != null){
                            $popust = ($proizvod['cena']*$proizvod['popust']) / 100;
                            echo ($proizvod['cena'] - $popust);
                        }
                        else{
                            echo $proizvod['cena'];
                        }?> din</td>
                        <td><?php if($proizvod['popust'] == null){
                            echo 'Nema';
                        } 
                        else {
                            echo '-' . $proizvod['popust'] . "%";
                        }?></td>
                        <td><a href="opsirnije.php?id=<?= $proizvod['id']?>">Opsirinije...</a></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
        </table>
    </div>
</div>


<?php include "modul/foot.php"?>