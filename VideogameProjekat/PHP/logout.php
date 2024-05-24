<?php
    session_start();
    session_destroy();
    header("Location: ../loginStranica.php?success=2");
?>