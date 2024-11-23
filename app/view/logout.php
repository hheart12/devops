<?php
session_start();
session_unset();
session_destroy();
header("Location: /unkpresent/devops/index.php");
exit();