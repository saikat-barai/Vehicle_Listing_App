<?php 
require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VechicleManager extends VehicleBase implements VehicleActions{
    use FileHandler;

    public function addVehicle($data){
        $vechiles = $this->readFile();
        $vechiles[] = $data;
        $this->writeFile($vechiles);
    }

    public function editVehicle($id, $data){
        $vechiles = $this->readFile();
        $vechiles[$id] = $data;
        $this->writeFile($vechiles);
    }

    public function deleteVehicle($id){
        $vechiles = $this->readFile();        
        if (isset($vechiles[$id])) {
            unset($vechiles[$id]);
            $this->writeFile(array_values($vechiles));
        }
    }

    public function getVehicles(){
        return $this->readFile();
    }

    public function getDetails()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}