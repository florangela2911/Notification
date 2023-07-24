<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GodLovesYou extends Model
{
    use HasFactory;

    public $bases;
    public $id;
    public $nro_hist;
    public $identifi;
    public $historia;
    public $edad;
    public $regimen_usuario;
    public $tipo_usuario;
    public $fechareg;
    public $registro;
    public $fechacita;
    public $hora;
    public $cedprof;
    public $nombre;
    public $especial;
    public $observacion;
    public $codigo;
    public $procedim;
    public $codent;
    public $nomenti;
    public $asistio;
    public $fecha_asistio;
    public $fecha_atendido;
    public $na;
    public $cancelada;
    public $usuario_canc;
    public $fecha_na;
    public $fecha_can;
    public $motivo;
    public $usuario_confirma;
    public $fecha_confirma;
    public $motivo_conf;
    public $del;
    public $sede;
    public $direccion;
    public $gmail;
    
    
    public function __construct($bases)
           {
            $this->id = $bases;
            $this->nro_hist = $bases;
            $this->identifi = $bases;
            $this->historia = $bases;
            $this->edad = $bases;
            $this->regimen_usuario = $bases;
            $this->fechareg = $bases;
            $this->registro = $bases; 
            $this->fechacita = $bases;
            $this->hora = $bases;
            $this->cedprof = $bases;
            $this->nombre = $bases;
            $this->especial = $bases;
            $this->observacion = $bases;
            $this->codigo = $bases;
            $this->codigo = $bases;
            $this->procedim = $bases;
            $this->codent = $bases;
            $this->nomenti = $bases;
            $this->asistio = $bases;
            $this->fecha_asistio = $bases;
            $this->fecha_atendido = $bases;
            $this->na = $bases;
            $this->cancelada = $bases;
            $this->usuario_canc = $bases;
            $this->fecha_na = $bases;
            $this->fecha_can = $bases;
            $this->motivo = $bases;
            $this->usuario_confirma = $bases;
            $this->fecha_confirma = $bases;
            $this->del = $bases;
            $this->sede = $bases;
            $this->direccion = $bases;
            $this->gmail = $bases;
            
        }
        public function getNotification(){
            return $this->bases;
          }
}            
        $bases = new GodLovesYou("valor predeterminado");
        echo $bases->getNotification();

