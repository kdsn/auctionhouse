<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /*
     * Select statements
     */

    /**
     * Select all records from a database table.
     *
     * @param $tabel
     * @return array
     */
    public function selectAll($tabel)
    {
        $statement = $this->pdo->prepare("select * from {$tabel}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Select records from a database table.
     *
     * @param $tabel
     * @param $field
     * @param $value
     * @return array
     */
    public function selectWhere($tabel, $field, $value)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$tabel} WHERE {$field} = '{$value}'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Count records from a database table.
     *
     * @param $tabel
     * @param $field
     * @param $value
     * @return int
     */
    public function selectCount($tabel, $field, $value)
    {

            $statement = $this->pdo->prepare("SELECT * FROM {$tabel} WHERE $field = '{$value}'");
            $statement->execute();
            return $statement->rowCount();

    }

    /*
     * Update statements
     */
    public function update($table, $parameters, $field, $value)
    {
        $sql = sprintf(
            'UPDATE %s SET (%s) values (%s) WHERE %s = %s',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
            $field,
            $value
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }
    /*
     * Insert statements
     */

    /*
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }

    /*
     * Delete statements
     */

    /*
     * Delete a record from a table.
     *
     * @param  string $table
     * @param  string $column
     * @param  string $identifier
     */
    public function delete($table, $column, $identifier)
    {
        $sql = sprintf(
            'DELETE FROM %s WHERE %s = %s',
            $table,
            $column,
            $identifier
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }
}