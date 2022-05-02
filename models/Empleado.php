<?php 
    require_once"connection/Connection.php";
    class Empleado{
        public static function getAll(){
            $db=new Connection();
            $consulta="SELECT * FROM empleados";
            $resultado=$db->query($consulta);
            $datos=[];
            if($resultado->num_rows)  {
                while($row=$resultado->fetch_assoc()){
                    $datos[]=[
                        'id'=>$row['id'],
                        'dni'=>$row['dni'],
                        'password'=>$row['password'],
                        'nombre'=>$row['nombre'],
                        'apellido'=>$row['apellido'],
                        'turno'=>$row['turno'],
                    ];        
                }//end while
                return $datos;
            }// end if 
            return $datos;
        }//end getAll
        public static function getWhere($id_empleado){
            $db=new Connection();
            $consulta="SELECT * FROM empleados WHERE id=$id_empleado";
            $resultado=$db->query($consulta);
            $datos=[];
            if($resultado->num_rows)  {
                while($row=$resultado->fetch_assoc()){
                    $datos[]=[
                        'id'=>$row['id'],
                        'dni'=>$row['dni'],
                        'password'=>$row['password'],
                        'nombre'=>$row['nombre'],
                        'apellido'=>$row['apellido'],
                        'turno'=>$row['turno']
                    ];        
                }//end while
                return $datos;
            }// end if 
            return $datos;
        }//end getWhere
        public static function insert($dni,$password,$nombre,$apellido,$turno){
            $db=new Connection();
            $consulta="INSERT INTO empleados (dni,password,nombre,apellido,turno)
            VALUES ('".$dni."','".$password."','".$nombre."','".$apellido."','".$turno."')";
            $db->query($consulta);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end insert
        public static function update($id_empleado,$dni,$password,$nombre,$apellido,$turno){
            $db=new Connection();
            $consulta="UPDATE empleados SET 
            dni='".$dni."',password='".$password."',nombre='".$nombre."',apellido='".$apellido."',turno='".$turno."'
            WHERE id=$id_empleado";
            $db->query($consulta);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end update
        public static function delete($id_empleado){
            $db=new Connection();
            $consulta="DELETE FROM empleados WHERE id=$id_empleado";
            $db->query($consulta);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end delete
    }//end class Empleado
?>