<?php

$mysqli = new mysqli("localhost", "root", "", "db_bansos");

if (!$mysqli) {
    echo "Koneksi bermasalah !";
}
