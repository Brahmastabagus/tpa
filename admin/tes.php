<?php
require_once "connect.php";

$tgl = date('Y-m-d H:i:s');
echo 'current : '.$tgl;
echo '  '.strtotime($tgl);

?>