<?php

namespace Acme\Database;

use Acme\Helpers\Config;

class Connection extends \PDO {

    /**
     * Current connection
     *
     * @var null
     */
    private static $connection = null;

    /**
     * Set up connection
     *
     * @return Connection|null
     */
    public static function get() {
        if (is_null(self::$connection)) {
            self::$connection = new self;
        }
        return self::$connection;
    }

    /**
     * PDO connection to DB
     * Connection constructor.
     */
    public function __construct() {

        $dbtype   = Config::get('database/DB_TYPE');
        $host     = Config::get('database/DB_HOST');
        $dbname   = Config::get('database/DB_NAME');
        $username = Config::get('database/username');
        $password = Config::get('database/password');

        $dsn = "$dbtype:host=$host;dbname=$dbname";

        try {
            parent::__construct($dsn, $username, $password);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die(include view('page', 'errors/db.connection'));
        }
    }
}