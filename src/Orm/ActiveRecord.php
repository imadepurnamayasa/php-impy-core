<?php

namespace Imadepurnamayasa\PhpInti\Database;

abstract class ActiveRecord
{

    protected $id;

    // Abstract method to define the table name
    abstract protected static function tableName(): string;

    // Abstract method to define the primary key column name
    abstract protected static function primaryKey(): string;

    // Constructor method
    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->load();
        }
    }

    // Load method to retrieve record from the database
    protected function load()
    {
        // Logic to load record from the database using $this->id
        // and populate object properties
    }

    // Save method to insert or update the record
    public function save()
    {
        // Logic to save the record to the database
    }

    // Delete method to delete the record
    public function delete()
    {
        // Logic to delete the record from the database
    }

    // Static method to find a record by ID
    public static function findById($id)
    {
        // Logic to find a record by ID from the database
    }

    // Static method to find all records
    public static function findAll()
    {
        // Logic to find all records from the database
    }
}
