<?php
    session_start();
    unset($_SESSION['logado']);
    unset($_SESSION['login']);
    session_destroy();
    echo "<script type='text/javascript' language='javascript'> window.location.href='index.php'; </script>";
    ?>
