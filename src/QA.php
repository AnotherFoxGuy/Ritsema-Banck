<?php
require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\QA_Manager;

$qam = new QA_Manager();

$list = $qam->GetListFromDB();
?>
<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="css/style.css">
</header>
<body>
<div class="eight wide white rounded container">
    <table style="width:50%">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($list as $i) {
            echo "
        <tr>
            <td>$i[1]</td>
            <td>$i[2]</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</div>
</body>
</html>