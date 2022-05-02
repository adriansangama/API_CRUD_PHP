<?php 
    require_once "models/Empleado.php";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])){
                echo json_encode(Empleado::getWhere($_GET['id']));
            }//end if
            else{
                echo json_encode(Empleado::getAll());
            //echo 'Este es el metodo GET';
            }       
            break;
        case 'POST':
            $datos=json_decode(file_get_contents('php://input'));
            if($datos!=null){
                if(Empleado::insert($datos->dni,$datos->password,$datos->nombre,$datos->apellido,$datos->turno,)){
                    echo 'Se insertó correctamente los datos';
                    //http_response_code(200);
                }//end if
                else{
                    http_response_code(400);
                }//end else
            }//end if
            else{
                http_response_code(405);
            }//end else
            break;
        case 'PUT':
            $datos=json_decode(file_get_contents('php://input'));
            if($datos!=null){
                if(Empleado::update($datos->id,$datos->dni,$datos->password,$datos->nombre,$datos->apellido,$datos->turno,)){
                    echo 'Se actualizó correctamente los datos';
                    //http_response_code(200);
                }//end if
                else{
                    http_response_code(400);
                }//end else
            }//end if
            else{
                http_response_code(405);
            }//end else
            break;
        case 'DELETE':
            if(isset($_GET['id'])){
                if(Empleado::delete($_GET['id'])){
                    echo 'Se eliminó correctamente los datos';
                    //http_response_code(200);
                }//end if
                else{
                    http_response_code(400);
                }//end else
            }//end if 
            else{
                http_response_code(405);
            }//end else
            break;    
        default:
            http_response_code(405);
            break;
    }//end while
?>