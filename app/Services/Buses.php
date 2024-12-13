<?php
namespace App\Services;
use App\Models\Buse;
class buses
{
    public function get()
    {
        $buses=Buse::get();
        $busesArray['']='Seleccione un Bus';
        foreach($buses as $bus)
        {
            $busesArray[$bus->id]=$bus->Num_Bus;
        }
        return $busesArray;
    }
}
?>
