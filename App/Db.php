<?php

namespace App;

class Db
{

    private \PDO $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('pgsql:host=localhost;dbname=test', 'test', 'test');
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

}
