<?php

abstract class DbConnect{

    private static $dsn    = "mysql:host=localhost:3306;dbname=session";
    private static $dbuser = "root";
    private static $dbpass = "";

    public static $bdd;

    protected function connect(){

        try {

            self::$bdd = new PDO(self::$dsn, self::$dbuser, self::$dbpass);
            self::$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            self::$bdd->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

            //self::$bdd->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException $err) {

            $now = new DateTime("", new DateTimeZone('Europe/Paris'));
            $now = $now->format("d-M-Y H:i:s");
            $msg = $now." - ERREUR BDD : ".$err->getMessage().PHP_EOL;
            file_put_contents('log.txt', $msg, FILE_APPEND);
            die();
        }


    }

    //permet l'utilisation de la fonction query ou prepare dans les autres class
    protected function executeQuery($requete, $params = null){  //prend  en parametre un SELECT ($requete) et un parametre (optionelle)
        if($params == null){
            $stmt = self::$bdd->query($requete);
        }
        else{
            $stmt = self::$bdd->prepare($requete); // prepare la requete sql
            foreach($params as $key => &$value)
            { 	//&value == la valeur orignel de la vairable
                $stmt->bindParam($key, $value, PDO::PARAM_STR);
            }
            $stmt->execute(); //execute le parametre (exemple : $id)

        }
        return $stmt; // retourne le resultat de la requete sql
    }


}