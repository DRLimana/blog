<?php

session_start();
session_destroy();
echo "<script>alert('Até mais!'); location = '../view/Home.php';</script>";
