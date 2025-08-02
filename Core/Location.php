<?php

namespace Core;

class Location
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function getAll()
    {
        return $this->db->query('SELECT * FROM locations WHERE status = :status ORDER BY name', [
            'status' => 'active'
        ])->get();
    }

    public function findById($id)
    {
        return $this->db->query('SELECT * FROM locations WHERE id = :id', [
            'id' => $id
        ])->find();
    }

    public function findByName($name)
    {
        return $this->db->query('SELECT * FROM locations WHERE name = :name', [
            'name' => $name
        ])->find();
    }

    public function create($data)
    {
        $sql = "INSERT INTO locations (name, address, phone, email, status) 
                VALUES (:name, :address, :phone, :email, :status)";
        
        $this->db->query($sql, [
            'name' => $data['name'],
            'address' => $data['address'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'status' => $data['status'] ?? 'active'
        ]);

        return $this->db->connection->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE locations SET name = :name, address = :address, phone = :phone, email = :email, status = :status WHERE id = :id";
        
        $this->db->query($sql, [
            'id' => $id,
            'name' => $data['name'],
            'address' => $data['address'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'status' => $data['status'] ?? 'active'
        ]);
    }

    public function delete($id)
    {
        $this->db->query('UPDATE locations SET status = :status WHERE id = :id', [
            'id' => $id,
            'status' => 'inactive'
        ]);
    }
}