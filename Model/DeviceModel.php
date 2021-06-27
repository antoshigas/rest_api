<?php

namespace App\Model;

use App\Model\Database;
 
class DeviceModel extends Database
{
    public function getAllDevices()
    {
        return $this->select("SELECT * FROM devices ORDER BY device_id ASC");
    }

    public function getDeviceByID($id)
    {
        return $this->select("SELECT * FROM devices WHERE device_id = ?", ["i", $id]);
    }

    public function insertNewDevice($data)
    {
        return $this->simpleStatementHandler("INSERT INTO devices (device_id, device_type, damage_possible) VALUES(?, ?, ?)", ["isi", array_values($data)]);
    }

    public function updateOneDevice($data)
    {
        return $this->simpleStatementHandler("UPDATE devices SET device_type = ?, damage_possible = ? WHERE device_id = ?", ["sii", array_values($data)]);
    }

    public function deleteDeviceByID($id)
    {
        return $this->simpleStatementHandler("DELETE FROM devices WHERE device_id = ?", ["i", $id]);
    }
}