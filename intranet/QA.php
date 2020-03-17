<?php
require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\models\QA;
use RitsemaBanck\QA_Manager;

$qam = new QA_Manager();

$message = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dellID'])) {
        $qam->DeleteByID($_POST['dellID']);
        $message = "Successfully deleted new QA";
    } else {
        $qa = new QA($_POST['QuestionText'], $_POST['AnswerText']);
        $qam->SaveQA($qa);
        $message = "Successfully added new QA";
    }
}

?>

<html>
<head>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css"
          integrity="sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg=="
          crossorigin="anonymous">

</head>
<body>
<div class="grid-container">
    <?php

    if ($message)
        echo "
        <div class=\"callout success\">
        $message
        </div>"

    ?><br>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $list = $qam->GetListFromDB();
        foreach ($list as $i)
            echo "
            <tr>
                <td>$i[0]</td>
                <td>$i[1]</td>
                <td>$i[2]</td>
                <td>
                <form id=\"del\" action=\"\" method=\"post\">
                    <input name=\"dellID\" type=\"hidden\" value='$i[0]'/>
                    <button class=\"alert button\">Delete</button>
                 </form>
                </td>
            </tr>"
        ?>
        </tbody>
    </table>
    <form id="QAForm" action="" method="post">
        <input name="QuestionText" type="text" placeholder="Question"/><br>
        <textarea name="AnswerText" form="QAForm" placeholder="Enter Answer here..."></textarea>
        <input type="submit" class="success button" name="SubmitButton"/>
    </form>
</div>
</body>
</html>