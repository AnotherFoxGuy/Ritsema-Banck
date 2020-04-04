<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/includes/navbar.php';

use RitsemaBanck\Database;
?>
<div class="ten wide container">
      <div class="padded row">
            <div class="ten wide column">
                  <?php
                        $database = new Database();
                        $result = $database->select("SELECT * FROM terms WHERE 1 = ?", array(1));
                        if($result->num_rows > 0){
                              print($database->fetch($result)["text"]);
                        } else {
                              print("Whoopsie de poopsie er mist iets in de database");
                        }
                  ?>
            </div>
      </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>