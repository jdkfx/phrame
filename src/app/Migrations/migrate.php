<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Migrations\Migration;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

if ($argc < 2) {
    echo "Usage: php migrate.php [migrate|rollback]\n";
    exit(1);
}

$command = $argv[1];
$migration = new Migration();

switch ($command) {
    case 'migrate':
        $migration->migrate();
        break;
    case 'rollback':
        $migration->rollback();
        break;
    default:
        echo "Invalid command. Use 'migrate' or 'rollback'.\n";
        exit(1);
}

exit(0);
