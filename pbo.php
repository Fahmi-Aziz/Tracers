<?php
class Koneksi
{
    private $host = 'localhost';
    private $uname = 'root';
    private $pass = '';
    private $db_name = 'tracer';
    protected $conn = '';

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db_name);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>
