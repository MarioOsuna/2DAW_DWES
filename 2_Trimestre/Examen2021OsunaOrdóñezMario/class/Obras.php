<?php
require_once('DBAbstractModel.php');

class Obras extends DBAbstractModel
{
    private static $instancia;
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación no está permitida.', E_USER_ERROR);
    }

    private $id;
    private $titulo;
    private $perfil;


    # Obtiene los datos del usuario pasando la id
    public function getDatos()
    {
        /*   $this->query = "
                SELECT *
                FROM obras
                "; */

        $this->query = "
        SELECT * FROM obras            
        ORDER BY obras.fecha_inicio ASC";
        // $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
        $this->mensaje = 'Datos extraidos';
    }
    /* public function getId($usuario = '')
    {
        
        if ($usuario != '') {
            $this->query = "SELECT id FROM usuarios WHERE usuario = :usuario";
            $this->parametros['usuario'] = $usuario;
            $this->get_results_from_query();
            // $this->close_connection();
        } else {
            $this->mensaje = "Usuario no encontrado";
        }

        return $this->rows;
    } */

    # Obtiene los datos un usuario
    public function get($id = '')
    {
        if ($id != '') {
            $this->query = "SELECT * FROM obras WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            // $this->close_connection();
        } else {
            $this->mensaje = "Usuario no encontrado";
        }

        return $this->rows;
    }


    # Crear un nuevo usuario
    public function set($user_data = array())
    {

        $this->query = "INSERT INTO obras
                                    (titulo,descripcion, portada,fecha_inicio,fecha_final,numero_valoraciones,valoracion_media)
                                    VALUES
                                    (:titulo, :descripcion, :portada, :fechaIn,:fechaFin,null,null)";

        $this->parametros['titulo'] = $user_data["titulo"];
        $this->parametros['descripcion'] = $user_data["descripcion"];
        $this->parametros['portada'] = $user_data["file"];
        $this->parametros['fechaIn'] = $user_data["fechaIn"];
        $this->parametros['fechaFin'] = $user_data["fechaFin"];
        $this->get_results_from_query();
        // $this->close_connection();
        $this->mensaje = 'obra agregada exitosamente';
    }


    public function edit($user_data = array())
    {
        /*    foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
                UPDATE secre_usuario
                SET nombre=:nombre,
                usuario=:usuario
                WHERE perfil = :perfil
                ";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['usuario'] = $usuario;
        $this->parametros['perfil'] = $perfil;

        $this->get_results_from_query();
        $this->mensaje = 'Usuario modificado'; */
    }

    public function delete($id = '')
    {
        /* if ($id != '') {
            $this->query = "
                DELETE FROM usuarios
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado';
        } */
    }


    public function valorar($id = '', $valoracion = '')
    {
        $this->query = "SELECT numero_valoraciones, valoracion_media FROM obras WHERE id = :id";

        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $fila = $this->rows;

        //var_dump($fila);

        if ($fila[0]['numero_valoraciones'] == null) {

            $this->query = "
                UPDATE obras
                SET 
                numero_valoraciones=:cont,
                valoracion_media=:valoracion
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->parametros['valoracion'] = $valoracion;
            $this->parametros['cont'] = 1;

            $this->get_results_from_query();
            $this->mensaje = 'Obra valorada';
        } else {
            $this->query = "
                UPDATE obras
                SET valoracion_media=:valoracion,
                numero_valoraciones=:cont
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->parametros['cont'] = $fila[0]['numero_valoraciones'] + 1;
            $val_med = $fila[0]['valoracion_media'];
            $suma = $val_med + $valoracion;
            $this->parametros['valoracion'] = intval($suma /  $fila[0]['numero_valoraciones']);

            $this->get_results_from_query();
            $this->mensaje = 'Obra valorada';
        }
    }


    public function bloquear($id = '')
    {
        /* if ($id != '') {
            $this->query = "
                UPDATE usuarios
                SET bloqueado = :bloqueado
                WHERE id = :id
                ";
            $this->parametros['bloqueado'] = "1";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        } */
    }



    public function getMensaje()
    {
        return $this->mensaje;
    }

    # Método constructor
    function __construct()
    {
        $this->db_name = 'usuarios';
    }

    # Método destructor del objeto
    function __destruct()
    {
        $this->conn = null;
    }
}
