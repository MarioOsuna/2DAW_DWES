<?php

namespace App\Models;

// require_once './vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;



class Blog extends Model
{
    protected $table='blog';
  

    /**
     * Get the value of table
     */ 
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set the value of table
     *
     * @return  self
     */ 
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }
    
}
?>