<?php
require 'vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();

$db->deleteById("notes", $_GET['id']);

header("Location: /");