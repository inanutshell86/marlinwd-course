<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->store("notes", $_POST);
header("Location: /"); exit;