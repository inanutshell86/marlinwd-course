<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->addNote($_POST);
header("Location: /"); exit;