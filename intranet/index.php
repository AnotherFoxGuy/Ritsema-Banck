<html>
<head>
    <title>Hello Intranet!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css"
          integrity="sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg=="
          crossorigin="anonymous">
</head>
<body>
<?php require __DIR__ . '/topbar.php'; ?>
<div class="grid-container">
    <P>New user:</P>
    <form action="createNewUser.php" method="post">
        <label for="idUserName">Gebruikersnaam</label><input type="text" name="username" id="idUserName"><br/>
        <label for="idVoornaam">Voornaam</label> <input type="text" name="voornaam" id="idVoornaam"><br/>
        <label for="idAchternaam">Achternaam</label> <input type="text" name="achternaam" id="idAchternaam"><br/>
        <button class="success button" type="submit">Opslaan</button>
    </form>
</div>
</body>
</html>
