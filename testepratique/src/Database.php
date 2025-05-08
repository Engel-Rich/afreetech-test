<?php
class Database
{
    private $host = 'mysql';
    private $db   = 'testdb';
    private $user = 'user';
    private $pass = 'password';
    private $charset = 'utf8mb4';

    public $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            // echo "Connexion réussie ✅";
        } catch (\PDOException $e) {
            exit('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}
