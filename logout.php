<?php
  require "config.php";
  $_SESSION["login"] = NULL;
  session_unset();
  session_destroy();
  header("Location:index.php");