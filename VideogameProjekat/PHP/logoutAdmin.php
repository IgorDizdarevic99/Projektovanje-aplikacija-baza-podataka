<?php
    session_start();
    session_destroy();
    header("Location: ../loginStranicaAdmin.php?success=2");
?>