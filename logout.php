<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /practica3_ignaciojordi_joanisern');
?>