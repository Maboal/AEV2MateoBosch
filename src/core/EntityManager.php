<?php

namespace App\Core;

use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

class EntityManager 
{
    private $entityManager;

    public function __construct()
    {
        // $this->dbConfig = json_decode(file_get_contents(__DIR__.'/../../config/dbConfig.json'));
        // Estas dos lineas sustituyen a la anterior porque usamos una libreria que lee el archivo .env
        // Donde indicamos la ruta del archivo, que hemos colocado en la carpeta config, aunque en muchos proyectos esta en la raiz.
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../config/');
        $dotenv->load();
                 
        // Guardamos la ruta donde estan ubicados todas las entidades.
        $paths = array(__DIR__.'/../entity');
        // Indicamos que estamos en modo desarrollo. Cogemos el valor de la configuracion.
        $isDevMode = boolval($_ENV["DEVELOP_MODE"]);
        // Caragamos en un array los datos de la conexion desde el archivo .env
        $dbParams = array(
            'host' => $_ENV["db_server"],
            'driver' => $_ENV["db_driver"],
            'user' => $_ENV["db_user"],
            'password' => $_ENV["db_password"],
            'dbname' => $_ENV["db_name"]
        );

        // Creamos la configuracion de donde y como
        $config = ORMSetup::createAnnotationMetadataConfiguration($paths,$isDevMode,null,null);
        // Creamos el objeto EntityManager con la configuracion que hemos definido
        // para poder instanciarlo en esta clase 
        $this->entityManager = \Doctrine\ORM\EntityManager::create($dbParams,$config);
    }

    /**
     * Get the value of entityManager
     */ 
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}