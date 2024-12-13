<?php
namespace App\Services;
use App\Models\Agencia;
class agencias
{
    public function get()
    {
        $agencias=Agencia::get();
        $agenciasArray['']='Seleccione una Agencia';
        foreach($agencias as $agencia)
        {
            $agenciasArray[$agencia->id]=$agencia->Agencia;
        }
        return $agenciasArray;
    }
}
?>
