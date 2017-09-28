<?php

namespace App\Core;

use PDO;

/**
 * Class DB
 * @package App\Core
 */
class DB
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * DB constructor.
     *
     * @param string $host
     * @param string $dbName
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $dbName, string $user, string $password)
    {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
        } catch (PDOException $e) {

        }
    }

    /**
     * @param string $modelClass
     *
     * @return array
     */
    public function all(string $modelClass): array
    {
        $result = [];
        $query  = $this->db->query(sprintf("SELECT * FROM %s", $modelClass::getTableName()));

        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $result[] = new $modelClass($row);
        }

        return $result;
    }

    /**
     * @param string $modelClass
     * @param array  $data
     *
     * @return bool
     */
    public function save(string $modelClass, array $data)
    {
        $keys = array_keys($data);
        $stmt = $this->db->prepare(sprintf("INSERT INTO %s (%s) VALUES (%s)", $modelClass::getTableName(), implode(',', $keys), $this->getMappings($keys)));

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            return new $modelClass($data);
        }

        return false;
    }

    /**
     * @param string $modelClass
     * @param array  $data
     *
     * @return bool
     */
    public function remove(string $modelClass, array $data)
    {
        $stmt = $this->db->prepare(sprintf("DELETE FROM %s WHERE %s", $modelClass::getTableName(), $this->prepareForRemove($data)));

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function prepareForRemove(array $data)
    {
        $result = [];

        foreach (array_keys($data) as $key) {
            $result[] = "$key = :$key";
        }

        return implode(' AND ', $result);
    }

    /**
     * @param array $array
     *
     * @return string
     */
    private function getMappings(array $array): string
    {
        $mappings = [];

        foreach ($array as $key) {
            $mappings[] = ":$key";
        }

        return implode(',', $mappings);
    }
}