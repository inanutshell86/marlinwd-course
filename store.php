<?php
require 'vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();
$db->store("notes", $_POST);
header("Location: /"); exit;