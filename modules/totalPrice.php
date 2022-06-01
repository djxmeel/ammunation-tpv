<?php
    session_start();
?>
<h1>Total: <?php if(isset($_SESSION["total"])) echo $_SESSION["total"];?></h1>