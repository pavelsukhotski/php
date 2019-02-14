<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;

$this->title = 'Clayton Steam Generators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">


    <h3>
        SELECTED STEAM GENERATOR COST:</h3>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=courseproject', 'root');

    $pdostmt2 = $pdo->prepare("SELECT modelname, modelcapacity FROM `modellist` WHERE modellist.idmodellist = ?");
    $pdostmt2->bindParam(1, $idmodellist, PDO::PARAM_INT);
    $pdostmt2->execute();
    $pdostmt2->bindColumn(1, $modelname);
    $pdostmt2->bindColumn(2, $modelcapacity);
    $row = $pdostmt2->fetch(PDO::FETCH_BOUND);

    $pdostmt3 = $pdo->prepare("SELECT workingpress FROM `workingpress` WHERE workingpress.idworkingpress = ?");
    $pdostmt3->bindParam(1, $idworkingpress, PDO::PARAM_INT);
    $pdostmt3->execute();
    $pdostmt3->bindColumn(1, $press);
    $row = $pdostmt3->fetch(PDO::FETCH_BOUND);

    $pdostmt = $pdo->prepare("SELECT stgencost FROM `stgencost` WHERE stgencost.modellist_idmodellist = ? and stgencost.workingpress_idworkingpress = ?");
    $pdostmt->bindParam(1, $idmodellist, PDO::PARAM_INT);
    $pdostmt->bindParam(2, $idworkingpress, PDO::PARAM_INT);
    $pdostmt->execute();
    $pdostmt->bindColumn(1, $stgencost);
    $row = $pdostmt->fetch(PDO::FETCH_BOUND);
    echo '<table><tr><td>Steam generator ' . $modelname . ' (' . $modelcapacity . ' kg/h, ' . $press . ' bar): </td><td>' . $stgencost . ' </td><td>  &nbsp;Euro</td></tr>';
    echo '<tr><td>OPTIONS:</td></tr>';



    $sum = 0;
    foreach ($idoptionsinblock as $optvalue) {
        $pdostmt1 = $pdo->prepare("SELECT optionscost FROM `optionscost` WHERE optionscost.idmodellist = ? and optionscost.optionsinblock_idoptionsinblock = ?");
        $pdostmt1->bindParam(1, $idmodellist, PDO::PARAM_INT);
        $pdostmt1->bindParam(2, $optvalue, PDO::PARAM_INT);
        $pdostmt1->execute();
        $pdostmt1->bindColumn(1, $optcost);
        $row = $pdostmt1->fetch(PDO::FETCH_BOUND);

        $pdostmt4 = $pdo->prepare("SELECT optionsinblockname FROM `optionsinblock` WHERE optionsinblock.idoptionsinblock = ?");
        $pdostmt4->bindParam(1, $optvalue, PDO::PARAM_INT);
        $pdostmt4->execute();
        $pdostmt4->bindColumn(1, $optname);
        $row = $pdostmt4->fetch(PDO::FETCH_BOUND);

        if ($optcost > 0) {
            echo '<tr><td>' . $optname . ':</td><td>' . $optcost . '</td><td>&nbsp;Euro</td></tr>';
        } else {
            $optcost = 0;
            echo '<tr><td>' . $optname . ':</td><td>Not Available</td></tr>';
        };

        $sum = $sum + $optcost;
    }
    $total = $stgencost + $sum;
    echo '<tr><td><br><b>TOTAL COST:</b></td><td><br><b>' . $total . '</b></td><td><br><b>&nbsp;Euro</b></td></tr></table>';
    ?>

</div>

<!-- IMAGE ON PAGE
<div>
    <?php
    header('Content-Type: image/gif');
     $pic = '../views/test/pics/pic.gif';
     $image = imagecreatefromgif($pic);
     imagegif($image);
    
    ?>
</div>
