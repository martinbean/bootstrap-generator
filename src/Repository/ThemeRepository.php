<?php
namespace MCB\Bootstrap\Generator\Repository;

class ThemeRepository extends Repository
{
    protected $entityClass = '\\MCB\\Bootstrap\\Generator\\Entity\\Theme';

    public function findLatest($limit = 10)
    {
        $sql = "SELECT * FROM `themes` ORDER BY `created` LIMIT ?";

        $statement = $this->database->prepare($sql);
        $statement->execute(array($limit));

        return $this->fetchResults($statement);
    }
}
