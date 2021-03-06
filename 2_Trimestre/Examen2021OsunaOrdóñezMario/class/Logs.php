<?php
require_once('DBAbstractModel.php');

class Logs extends DBAbstractModel
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
    private $usuario;
    private $nombre;
    private $passwd;
    private $perfil; // Básico, Premium
    private $fecha_alta;

    # Obtiene los datos del usuario pasando la id
    public function getDatos($id = '')
    {
        $this->query = "
                SELECT *
                FROM usuarios
                WHERE id = :id
                ";
        $this->parametros['id'] = $id;
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
    public function get()
    {
        $this->query = "
                SELECT `id`, `fecha_hora`, `usuario`, `descripcion` 
                FROM `logs` ORDER BY `id` DESC                
        ";
        $this->get_results_from_query();
        // $this->close_connection();

        return $this->rows;
        $this->mensaje = 'Datos extraidos';
    }


    # Crear un nuevo usuario
    public function set($nombre = '')
    {

        $this->query = "INSERT INTO logs
                                    (fecha_hora, usuario, descripcion)
                                    VALUES
                                    (:fecha, :usuario, :descripcion)";
        // $this->parametros['nombre'] = $user_data["nombre"];
        $this->parametros['fecha'] = date('Y-m-d H:i:s');
        $this->parametros['usuario'] = $nombre;
        $this->parametros['descripcion'] = "Intento de inicio de sesisón";
        $this->get_results_from_query();
        // $this->close_connection();
        $this->mensaje = 'log agregado exitosamente';
    }


    # Modificar un usuario
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

    # Eliminar un usuario
    public function delete($id = '')
    {
        if ($id != '') {
            $this->query = "
                DELETE FROM usuarios
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado';
        }
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
