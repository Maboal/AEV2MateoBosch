<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\EmpresasEntity;

class EmpresasController extends AbstractController
{
    public function getAll()
    {
        if(!isset($_POST['id_empresa'])){
            // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
            $entityManager = (new EntityManager())->getEntityManager();
            // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
            $empresasRepository = $entityManager->getRepository(EmpresasEntity::class);
            // Aplicamos el metodo predefinido de doctrine
            $data = $empresasRepository->findAll(); 
            // Renderizamos mediante twig una plantilla, le pasamos los resultados del findAll()
            $this->render("list.html.twig", [
                "table_for" => "empresas",
                "list_tittle" => "Lista de Empresas",
                "results" => $data
            ]);
        }

        if(isset($_POST['id_empresa'])){
            $_SESSION['id_empresa'] = $_POST['id_empresa'];
            header('Location: http://localhost:8000/update');
            $this->update();
        }
        
    }

    public function insert()
    {   
        if (!isset($_POST['nombre']) && !isset($_POST['cif']) && !isset($_POST['tipo'])){
        $this->render("layout.html.twig", [
            "action" => "/insert",
            "form_name" => "Insertar Empresa",
            "value_submit" => "Insertar"
        ]);
        };

        if (isset($_POST['nombre']) && isset($_POST['cif']) && isset($_POST['tipo'])){
            // Obtenemos el objeto EntityManager para poder realizar la insercion
            $entityManager = (new EntityManager())->getEntityManager();
            // Creamos nuevo objeto entidad
            $newEmpresa = new EmpresasEntity();
            // Settear valores
            $newEmpresa->setNombre($_POST['nombre']);
            $newEmpresa->setCif($_POST['cif']);
            $newEmpresa->setTipo($_POST['tipo']);
            // Persistir en doctrine y flush en BBDD
            $entityManager->persist($newEmpresa);
            $entityManager->flush();
            // Regresamos a la vista /business
            $this->getAll();
        }
    }

    public function update()
    {   
        
        // Obtenemos el objeto EntityManager para poder realizar la busqueda de datos
        $entityManager = (new EntityManager())->getEntityManager();
        // Obtenemos el repositorio desde la entidad y llamamos en este caso a un metodo predefinido de doctrine
        $empresasRepository = $entityManager->getRepository(EmpresasEntity::class);
        // Aplicamos el metodo predefinido de doctrine
        $data = $empresasRepository->findOneBy(['id'=>$_SESSION['id_empresa']]);
        
        if (!isset($_POST['nombre']) && !isset($_POST['cif']) && !isset($_POST['tipo'])){
            if($data->getTipo()==0){
                $this->render("layout.html.twig", [
                "action" => "/update",
                "form_name" => "Editar Empresa",
                "id_value" => $data->getId(),
                "nombre_value" => $data->getNombre(),
                "cif_value" => $data->getCif(),
                "proveedor_selected" => "selected",
                "value_submit" => "Actualizar"
                ]);
            }else if($data->getTipo()==1){
                $this->render("layout.html.twig", [
                "action" => "/update",
                "form_name" => "Editar Empresa",
                "nombre_value" => $data->getNombre(),
                "cif_value" => $data->getCif(),
                "cliente_selected" => "selected",
                "value_submit" => "Actualizar"
                ]);
            }
            };
        
        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['cif']) && isset($_POST['tipo'])){
            $data->setNombre($_POST['nombre']);
            $data->setCif($_POST['cif']);
            $data->setTipo($_POST['tipo']);
            $entityManager->persist($data);
            $entityManager->flush();
            // $this->getAll();
            header('Location: http://localhost:8000/business');
        }
    }

    public function delete($id=null) 
    {
        if(!isset($_POST['id'])){
            $this->render('delete.html.twig', [
                "id_empresa" => $id
            ]);
        }
        else if ($_POST['eliminar']=="si"){
            // Instanciamos entity manager
            $entityManager = (new EntityManager())->getEntityManager();
            // Instanciamos el producto que vamos a eliminar y lo eliminamos
            $empresa = $entityManager->getRepository(EmpresasEntity::class);
            $entityManager->remove($empresa->find($_POST['id']));
            $entityManager->flush();

            $this->getAll();
        }
        else if ($_POST['eliminar']=="no"){
            $this->getAll();
        }
    }
}