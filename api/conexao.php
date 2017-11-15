<?php 
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'judaicom_diogene' );
define( 'MYSQL_PASSWORD', 'm}Z.dFzccr?O' );
define( 'MYSQL_DB_NAME', 'judaicom_abranit' );

try
{
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD,
    array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ) );
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

?>