<?php

namespace Core;

class Database
{
    private $db;

    public function __construct($config)
    {
        $this->db = new \PDO($this->getDsn($config));
    }

    private function getDsn($config)
    {
        $driver = $config['driver'];
        unset($config['driver']);

        $dsn = $driver.':'.http_build_query($config, '', ';');

        if ($driver == 'sqlite') {

            $dsn = $driver.':'.$config['database'];
        }

        // if ($driver == 'mysql') {
        //         $config = [
        //                 'driver' => 'mysql',
        //                 'host' => '127.0.0.1',
        //                 'port' => 3306,
        //                 'dbname' => 'database',
        //                 'user' => 'root',
        //         ];
        // }

        return $dsn;
    }

    public function query($query, $class = null, $params = [])
    {
        $prepare = $this->db->prepare($query);

        if ($class) {
            $prepare->setFetchMode(\PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
    }
}
