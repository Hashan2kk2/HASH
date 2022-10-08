<?php

session_start();
if(isset($_SESSION["userEmail"])){
    $_SESSION["userEmail"] = null;
    session_destroy();
    echo "Signed out";
}
