<?php

define('HOST','mysql:host=localhost;dbname=patinhas_felizes;charset=utf8');
define('USER','root');
define('PASSWORD','');

class ClasseConexao
{
    private static $conn;

    public static function Conexao()
    {
        try 
        {
            if (!isset(self::$conn)):
                self:: $conn = new PDO(HOST,USER,PASSWORD);
                self:: $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            endif;
                return self::$conn;
        }
        catch (PDOException $e)
        {
            echo "Falha na conexão com o banco de dados." . $e -> getMessage();
            die();
        }
    }
}

?>
