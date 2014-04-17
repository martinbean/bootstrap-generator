<?php
namespace MCB\Bootstrap\Generator\Repository;

abstract class Repository
{
    protected $database;
    protected $entityClass;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function __destruct()
    {
        $this->database = null;
    }

    protected function fetchResults(\PDOStatement $statement)
    {
        return $statement->fetchAll(\PDO::FETCH_CLASS, $this->entityClass);
    }
}
