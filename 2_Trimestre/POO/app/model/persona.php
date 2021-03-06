<?php class persona
{
    private $_nombre;
    private $_ap1;
    private $_ap2;


    public function __construct($nombre, $ap1, $ap2)
    {

        $this->_nombre = $nombre;
        $this->_ap1 = $ap1;
        $this->_ap2 = $ap2;
    }
    public function __destruct()
    {
        echo $this->_nombre . "destruido";
    }
    public function saluda()
    {
        echo "Hola mundo<br>";
    }

    public function Nombre()
    {
        return $this->_nombre . " " . $this->_ap1 . " " . $this->_ap2;
    }
}
