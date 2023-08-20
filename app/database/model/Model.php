<?php

namespace app\database\model;

use app\database\Connection;
use PDO;

abstract class Model
{
    protected string $table;

    /**
     * @return static
     */
    public function find(string $field, mixed $value)
    {
        $connection = Connection::get();
        $prepare = $connection->prepare("select * from {$this->table} where {$field} = :{$field}");
        $prepare->execute([$field => $value]);

        return $prepare->fetchObject(static::class);
    }

    /**
     * @return static[]
     */
    public function all()
    {
        $connection = Connection::get();
        $prepare = $connection->prepare("select * from {$this->table}");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function update(array $attributes, array $where)
    {
        $connection = Connection::get();
        $sql = "update {$this->table} set ";
        foreach (array_keys($attributes) as $key) {
            $sql .= "{$key} = :{$key},";
        }
        $sql = rtrim($sql, ',');
        $sql .= ' where id = :id';
        $prepare = $connection->prepare($sql);

        return $prepare->execute([
            ...$attributes, ...$where,
        ]);
    }
}
