<?php
namespace App\Core\Interfaces;

/**
 * Al crear la interfaz garantizamos que la clase que extienda de la misma contenga los mÃ©todos de la interfaz
 */
interface IDataBase{
    public function executeSQL($sql);
}