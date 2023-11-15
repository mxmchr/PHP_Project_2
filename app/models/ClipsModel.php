<?php

require_once './app/config.php';
class ClipsModel {
    private $db;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct() {
        $this->db = new Database();
    }

    // Méthode pour récupérer tous les clips
    public function getAllClips() {
        try {
            // Établir la connexion à la base de données
            $conn = $this->db->connect();

            // Préparer la requête SQL
            $query = "SELECT * FROM Clips";

            // Exécuter la requête
            $stmt = $conn->query($query);

            // Récupérer tous les résultats sous forme d'objets
            $clips = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Fermer la connexion à la base de données
            $conn = null;

            return $clips;
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des clips : " . $e->getMessage());
        }
    }

    public function formatCreatedAt($createdAt)
    {
        // Convertir la date au format strtotime pour pouvoir la formater
        $timestamp = strtotime($createdAt);

        // Formater la date comme "d M Y"
        $formattedDate = date('j F Y', $timestamp);

        return $formattedDate;
    }
}
