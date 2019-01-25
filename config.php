<?php

const PATH_TO_SQLITE_FILE = __DIR__ . '/sqlite.db';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');