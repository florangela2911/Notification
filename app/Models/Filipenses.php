<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filipenses extends Model
{
    use HasFactory;
    public $Reports;
    public $id;
    public $historia;
    public $fechacita;
    public $hora;
    public $nombre;
    public $procedim;
    public $sede;
    public $direccion;
    public $gmail;

    public function __construct($Reports)
    {
        $this->id = $Reports;
        $this->historia = $Reports;
        $this->fechacita = $Reports;
        $this->hora = $Reports;
        $this->nombre = $Reports;
        $this->procedim = $Reports;
        $this->sede = $Reports;
        $this->direccion = $Reports;
        $this->gmail = $Reports;
    }
        public function getGmail(){
        return $this->Reports;
        }
}

