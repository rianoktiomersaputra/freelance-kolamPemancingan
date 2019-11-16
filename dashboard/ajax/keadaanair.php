<?php 

    include_once('../../head.php');
    $phAir = $_GET['phAir'];
    $suhuAir = $_GET['suhuAir'];
    $tGaram = $_GET['tGaram'];
 ?>

<div class="mx-0" id="inputDatabase">
    <form action="" method="post">
        <input type="number" id="phAir" name="phAir" value=<?= $phAir?> hidden>
        <input type="number" id="suhuAir" name="suhuAir" value=<?= $suhuAir ?> hidden>
        <input type="number" id="tGaram" name="tGaram" value=<?= $tGaram ?> hidden>
        <div class="mx-auto">
            <button type="submit" name="update" class="btn btn-primary">Update
                today!</button>
        </div>
    </form>
</div>