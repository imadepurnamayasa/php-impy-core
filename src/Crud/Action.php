<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use DateTime;
use Exception;
use Imadepurnamayasa\PhpInti\Database\IConnection;

class Action implements Icrud, IcrudAction
{
    protected IConnection $connection;
    protected string $table = '';
    protected array $primaryKeys = [];
    protected array $columnTypes = [];
    protected array $hideColumns = [];

    public function __construct(IConnection $connection)
    {
        $this->connection = $connection;
    }

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function primaryKeys(array $columns)
    {
        $this->primaryKeys = $columns;
    }

    public function columnTypes(array $columns)
    {
        $this->columnTypes = $columns;
    }

    public function hideColumns(array $columns)
    {
        $this->hideColumns = $columns;
    }

    public function process(string $action = '')
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>'; 
        
        if ($action === 'insert') {
            return $this->insert();
        } else if ($action === 'update') {
            return $this->update();
        } else if ($action === 'delete') {
            return $this->delete();
        } else {
            return json_encode([
                'messages' => 'Action not available.'
            ]);
        }
    }

    public function insert()
    {
        if (!isset($_POST['crud_form'])) {
            return json_encode([
                'messages' => "Form data no available."
            ]);
        }

        $data = $_POST['crud_form'];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->primaryKeys)) {
                unset($data[$key]);
            }
        }

        $sql = "INSERT INTO $this->table (";
        $sql .= implode(", ", array_keys($data));
        $sql .= ") VALUES (";
        $sql .= ":" . implode(", :", array_keys($data));
        $sql .= ")";

        $stmt = $this->connection->connection()->prepare($sql);

        foreach ($data as $key => $value) {
            if (in_array($key, array_keys($this->columnTypes))) {
                if ($this->columnTypes[$key] === 'DATETIME') {
                    $dateTime = DateTime::createFromFormat('d-m-Y H:i:s', $value);
                    if ($dateTime instanceof DateTime) {
                        $value = $dateTime->format('Y-m-d H:i:s');
                    } else {
                        $currentDateTime = new DateTime();
                        $value = $currentDateTime->format('Y-m-d H:i:s');
                    }
                }
            }
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
            return json_encode([
                'messages' => "Record inserted successfully."
            ]);
        } catch (Exception $e) {
            return json_encode([
                'messages' => $e->getMessage()
            ]);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
