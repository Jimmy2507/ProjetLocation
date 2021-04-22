<?php

class DbConnect
{
    private static $db;

    public static function getDb()
    {
        return DbConnect::$db;
    }

    public static function init()
    {
        try {
            self::$db= new PDO ('mysql:host=localhost;dbname=location;port=3306', 'root', '');
        } catch ( Exception $e ) {
            die ( 'Erreur : ' . $e->getMessage () );
        }
        catch (Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arr�te tout
            die('Erreur : ' . $e->getMessage());
        }

    }
}
