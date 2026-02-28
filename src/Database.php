<?php

namespace Framework;
use PDO;
use PDOStatement;

class Database
{
    private PDO $connection;
    private string $name;

    public function __construct($name) {
        $this->connection = new PDO('sqlite' . $name);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->connection->exec('PRAGMA foreign_keys = ON');
    }

    public function query(string $query): PDOStatement | false {
        return $this->connection->prepare($query);
    }

    public function run(string $query): PDOStatement | false {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }

    public function migrate(string $migrationDirectory): void {
        $files = scandir($migrationDirectory);
    }
}