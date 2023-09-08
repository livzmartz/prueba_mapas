<?php

namespace Controllers;

use Model\Marcador;
use MVC\Router;

class MapaController{
    public static function index(Router $router){
        $router->render('mapa/index', []);
    }

    public static function buscarAPI(){
        $mar_nombre = $_GET['mar_nombre'] ?? '';
        $sql = "SELECT * FROM mars WHERE mar_situacion = '1' ";
    
        if (!empty($mar_nombre)) {
            $mar_nombre = strtolower($mar_nombre);
            $sql .= " AND LOWER(mar_nombre) LIKE '%$mar_nombre%' ";
        }
    
        try {
            $marcadores = Marcador::fetchArray($sql); 
            echo json_encode($marcadores);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }


//     public static function guardarApi(){
     
//         try {
//             $marcador = new Marcador($_POST);
//             $resultado = $marcador->crear();

//             if ($resultado['resultado'] == 1) {
//                 echo json_encode([
//                     'mensaje' => 'Registro guardado correctamente',
//                     'codigo' => 1
//                 ]);
//             } else {
//                 echo json_encode([
//                     'mensaje' => 'Ocurrió un error',
//                     'codigo' => 0
//                 ]);
//             }

//             // echo json_encode($resultado);
            
//         } catch (Exception $e) {
//             echo json_encode([
//                 'detalle' => $e->getMessage(),
//                 'mensaje' => 'Ocurrió un error',
//                 'codigo' => 0
//             ]);
//         }
}

