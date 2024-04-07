<?php

namespace Cfw\Database;

use Cfw\Database\Database;

class Transaction
{
    public function __construct(
        private Database $database
    ) {
    }

    public function begin(): void
    {
        $this->database->getInstance()->beginTransaction();
    }

    public function commit(): void
    {
        $this->database->getInstance()->commit();
    }

    public function rollback(): void
    {
        $this->database->getInstance()->rollBack();
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->database->getInstance()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
