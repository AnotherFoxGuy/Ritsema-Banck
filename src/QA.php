<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/includes/navbar.php';

use RitsemaBanck\QA_Manager;

$qam = new QA_Manager();

$list = $qam->GetListFromDB();
?>
<style>
    .wrapper {
        margin: 1em;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
    }
    .qa{
        border: 2px solid lightgrey;
        height: 10em;
    }
    .q{
        font-weight: bold;
        padding: 0.5em;
        margin: 0;
        border-bottom: 2px solid lightgrey;
    }
    .a{
        padding: 0.5em;
    }
</style>

<div class="twelve wide container">
    <div class="ten wide container">
        <div class="wrapper">
            <?php
            foreach ($list as $i) {
                echo "
                 <div class='qa'>
                    <p class='q'>$i[1]</p>
                    <p class='a'>$i[2]</p>
                </div>";
            }
            ?>
        </div>
    </div>
</div>


<?php require __DIR__ . '/includes/footer.php'; ?>
