<?php

namespace App\Controller\Api;

use App\Controller\Api\BaseController;
use App\Model\DeviceModel;

class DeviceController extends BaseController
{
    public $apiName = 'devices';

    /**
     * Method GET
     * All records
     * .../api/devices
     * @return string
     */
    public function indexAction()
    {
        $devices = (new DeviceModel())->getAllDevices();
        
        if($devices){
            return $this->response($devices, 200);
        }
        return $this->response('Data not found', 404);
    }

    /**
     * Method GET
     * One record by id
     * .../api/devices/{id}
     * @return string
     */
    public function viewAction()
    {
        $id = array_shift($this->requestUri);

        if($id){
            $device = (new DeviceModel())->getDeviceById((int) $id);
            if($device){
                return $this->response($device, 200);
            }
            return $this->response('Data not found', 404);
            }
        return $this->response('Data not found', 404);
    }

    /**
     * Method POST
     * Insert new record
     * .../api/devices + form-data {device_id, device_type, damage_possible}
     * @return string
     */
    public function createAction()
    {
        $device_id = $this->requestParams['device_id'] ?? '';
        $device_type = $this->requestParams['device_type'] ?? '';
        $damage_possible = $this->requestParams['damage_possible'] ?? '';
        if($device_id && $device_type && $damage_possible) {
            if((new DeviceModel())->insertNewDevice([
                'device_id' => (int) $device_id,
                'device_type' => $device_type,
                'damage_possible' => (int) $damage_possible
            ])) {
                return $this->response('Data saved', 200);
            }
        }
        return $this->response("Saving error", 500);
    }

    /**
     * Method PUT
     * Update one record by id
     * .../api/devices/{id} + x-www-form-urlencoded {device_type, damage_possible}
     * @return string
     */
    public function updateAction()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $deviceId = $parse_url['path'] ?? null;

        $deviceModel = new DeviceModel();

        if(!$deviceId || !$deviceModel->getDeviceById($deviceId)){
            return $this->response("Device with id=$deviceId not found", 404);
        }

        $device_type = $this->requestParams['device_type'] ?? '';
        $damage_possible = $this->requestParams['damage_possible'] ?? '';

        if($device_type && $damage_possible){
            if($deviceModel->updateOneDevice([
                'device_type' => $device_type,
                'damage_possible' => (int) $damage_possible,
                'device_id' => (int) $deviceId
            ])){
                return $this->response('Data updated', 200);
            }
        }
        return $this->response("Update error", 400);
    }

    /**
     * Method DELETE
     * Delete one record by id
     * .../devices/{id}
     * @return string
     */
    public function deleteAction()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $deviceId = $parse_url['path'] ?? null;

        $deviceModel = new DeviceModel();

        if(!$deviceId || !$deviceModel->getDeviceById((int) $deviceId)){
            return $this->response("Device with id=$deviceId not found", 404);
        }

        if($deviceModel->deleteDeviceById((int) $deviceId)){
            return $this->response('Data deleted', 200);
        }
        return $this->response("Delete error", 500);
    }
}