<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:22
 */

namespace app\services;


class Db
{
    private $config;

    /**
     * Db constructor.
     */
    public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }



}