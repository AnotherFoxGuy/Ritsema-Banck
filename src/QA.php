<?php
require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\QA_Manager;

$qa = new QA_Manager();

$list = $qa->GetListFromDB();
?>
<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="css/style.css">
</header>
<body>
<div class="twelve wide white rounded container">
    <div class="centered padded row">
        <?php
        foreach ($list as $i)
            echo "<div class=\"centered column\">
            $i[1] <br>
            $i[2]
        </div>"
        ?>
    </div>

</div>
</body>
</html>