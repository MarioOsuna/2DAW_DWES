<?php
require_once('DBAbstractModel.php');

class Tarifas extends DBAbstractModel
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

    # Obtiene los datos del usuario pasando la id
    public function getDatos($id = '')
    {
        $this->query = "
                SELECT *
                FROM tarifas
                WHERE idObra = :id
                ";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
        $this->mensaje = 'Datos extraidos';
    }
    
    # Obtiene los datos un usuario
    public function get($usuario = '')
    {
        if ($usuario != '') {
            $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario";
            $this->parametros['usuario'] = $usuario;
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
        if (sizeof($this->get($user_data['usuario'])) == 1) {
            $this->mensaje = 'El usuario ya existe';
            return;
        } else {
            $this->query = "INSERT INTO usuarios
                                    (nombre, usuario, password, perfiles_perfil)
                                    VALUES
                                    (:nombre, :usuario, :passwd, :perfil)";
            $this->parametros['nombre'] = $user_data["nombre"];
            $this->parametros['usuario'] = $user_data["usuario"];
            $this->parametros['passwd'] = $user_data["passwd"];
            $this->parametros['perfil'] = $user_data["perfil"];
            $this->get_results_from_query();
            // $this->close_connection();
            $this->mensaje = 'Usuario agregado exitosamente';
        }
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

    # Busca un usuario
    public function buscarUsuario($busqueda = '')
    {
        if ($busqueda != '') {
            $this->query = "SELECT * FROM usuarios
            WHERE 
            usuario LIKE :filtro
            ";
            $this->parametros['filtro'] = "%" . $busqueda . "%";
        }
        $this->get_results_from_query();

        return $this->rows;
    }

   
    public function bloquear($id = '')
    {
        if ($id != '') {
            $this->query = "
                UPDATE usuarios
                SET bloqueado = :bloqueado
                WHERE id = :id
                ";
            $this->parametros['bloqueado'] = "1";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
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
