<!--
Run once only
This script calls the php that creates the database as well as its tables.
-->

<html>
<head></head>
<body>
<?php
require_once("databaseCreation.php");
databaseSetup();
?>
</body>
</html>