<?php
class Connection
{
    private static $dsn = 'mysql:host=localhost;dbname=sys_cursos;port=3306';
    private static $user = 'root';
    private static $password = '';
    private static $connection = null;

    public static function getConnection(): PDO
    {
        if (Connection::$connection == null) {
            try {
                Connection::$connection = new PDO(Connection::$dsn, Connection::$user, Connection::$password);
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        return Connection::$connection;
    }

    public static function getPreparedStatement($sql): PDOStatement
    {
        $pst = null;
        if (Connection::getConnection() != null) {
            try {
                $pst = Connection::$connection->prepare($sql);
            } catch (PDOException $ex) { 
                echo $ex->getMessage();
            }
        }
        return $pst;
    }
}