<?php
class Database {     
    private function sqlConnect(array $selection, string $table, string $order_by = "") : array
    {
        $config = parse_ini_file("database.conf", true);
        $conn = new mysqli
        (
            $config['servername'], 
            $config['username'], 
            $config['password'], 
            $config['database']
        );
    
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        $selection_formated = "";

        for ($i = 0; $i < count($selection); $i++) {
            $selection_formated .= $selection[$i];
            if ($i < count($selection) - 1) {
                $selection_formated .= ", ";
            }
        }

        $sql = "SELECT $selection_formated name FROM $table ORDER BY `timestamp` DESC";
        $result = $conn->query($sql);
    
        $data = [];
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        } 
        return $data;
    }
    
    public function getSavedgames() : array
    { 
        $a = $this->sqlConnect(["player_ID","name"], "savegames");
        return $a;
        
    }
}
?>