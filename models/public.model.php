 <?php
    require_once "models/conection.db.model.php";
    class PublicModel
    {
        private $conection;

        public function __construct()
        {
            $this->conection = new Conection_db_Model();
        }
        //ÉSTA FUNCION OBTIENE SOLAMENTE GENEROS MUSICALES
        public function getGenres()
        {

            $db = $this->conection->createConexion();
            $sentencia = $db->prepare("SELECT * FROM genres");
            $sentencia->execute();
            $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

            return $generos;
        }

        public function getCdsByGenres($id)
        {
            //var_dump($id); die;
            $db = $this->conection->createConexion();
            $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ba.image
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g 
                                    WHERE Ge.id_g = ?");
            $sentencia->execute([$id]);
            $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

            return $generos;
        }

        //TRAIGO DE LA BASE DE DATOS PARA "LISTA COMPLETA-->DETALLES"
        function getDetails($id_detalles)
        {

            $db = $this->conection->createConexion();
            $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ba.image
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g
                                    WHERE Ba.id_b = ?");
            $sentencia->execute([$id_detalles]);
            $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);

            return $detalles;
        }

        public function getAllBands()
        {

            $db = $this->conection->createConexion();
            $sentencia = $db->prepare("SELECT Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ba.image, Ge.genres 
                                   FROM bands Ba
                                   INNER JOIN genres Ge
                                   ON Ba.id_g_fk = Ge.id_g ");
            //SELECT --> DE CADA TABLA AGARRO LO QUIERO TRAER Y LE ASIGNO UN PREFIJO
            //FROM --> DE LA TABLA "BANDS" QUE LE ASIGNE PREFIJO "BA"(QUE TIENE EL FORANIO)
            //INNER JOIN --> UNIDO A LA TABLA "GENRES" QUE LE DI PREFIJO "GE"
            //ON --> DONDE LA TABLA BANDS(USO PREFIJO)CON EL NOMBRE DEL FORANIO (ID_G_FK) SEA IGUAL A LA TABLA GENRES(USO PREFIJO) CON EL NOMBRE DEL ID(ID_G)                        
            $sentencia->execute();
            $bandas = $sentencia->fetchAll(PDO::FETCH_OBJ);

            return $bandas;
        }
    }
