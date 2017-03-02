<?php

class Connection
{
    public static function make ($config)
    {
        try
        {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['databasename'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch (PDOException $e)
        {
            die('Der kunne ikke oprettes forbindelse til databasen, vi beklager.');
        }
    }
}