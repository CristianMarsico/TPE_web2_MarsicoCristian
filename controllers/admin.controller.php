      <?php
    require_once 'models/admin.model.php';
    require_once 'views/admin.views.php';
    require_once 'models/bands.model.php';
    require_once 'models/public.model.php';
    require_once 'models/genres.model.php';



    class AdminController
    {

        private $modelGenres;
        private $modelAdmin;
        private $publicModel;
        private $bandsModel;
        private $view;

        public function __construct()
        {
            $this->modelAdmin = new AdminModel();
            $this->view = new AdminViews();
            $this->modelGenres = new GenresModel();
            $this->publicModel = new PublicModel();
            $this->bandsModel = new BandsModel();

            /**
             * no pongo el checklogged acá porque no me permitiria
             * acceso a la vista del form
             */
        }

        //verifica que exista un usuario loggeado 
        private function checklogged()
        {

            if (session_status() != PHP_SESSION_ACTIVE)
                session_start();

            if (!isset($_SESSION['ID_USER'])) {
                header('Location: ' . BASE_URL . 'admin');
                die();
            }
        }

        private function getUserName()
        {
            $this->checklogged();

            return $_SESSION['USERNAME'];
        }

        public function showForm()
        {

            $this->view->viewForm();
        }

        public function adminOption()
        {
            //barrera de seguridad
            $this->checklogged();

            $user = $this->getUserName();
            $this->view->choseTask($user);
        }

        public function show_A_B_M_Bands()
        {
            $this->checklogged();

            $user = $this->getUserName();
            $bandas = $this->publicModel->getAllBands();
            $this->view->showOptionsBands($bandas, $user);
        }

        public function addBand()
        {
            $this->checklogged();

            $user = $this->getUserName();
            $bandas = $this->modelGenres->getGenres();//ACA TENGO QUE PEDIR DE GENERO
            $this->view->showFormBand($bandas, $user);
        }

        public function saveBand()
        {
            $this->checklogged();

            if (
                empty($_POST['nombre'])
                || empty($_POST['album'])
                || empty($_POST['canciones'])
                || empty($_POST['anio'])
                || empty($_POST['genero'])
            ) {
                $genero = $this->modelGenres->getGenres();//ACA TENGO QUE PEDIR DE GENEROS
                $this->view->showFormBand($genero, "Ud debe completar todos los campos");
            } else {
                $nombre = $_POST['nombre'];
                $album = $_POST['album'];
                $cancion =  $_POST['canciones'];
                $año = $_POST['anio'];
                $genero = $_POST['genero'];

                $this->modelAdmin->insert($nombre, $album, $cancion, $año, $genero);

                header('Location: ' . BASE_URL . 'ABMbandas');
            }
        }

        public function removeBand($id)
        {
            $this->checklogged();

            $this->bandsModel->detele_band($id);
            header('Location: ' . BASE_URL . 'ABMbandas');
        }

        public function edit_Band($id)
        {
            $this->checklogged();

            $obtenerId = $this->bandsModel->get($id);
            //var_dump($obtenerId);die;
            $this->view->showFormEditForBands($obtenerId);
        }

        public function save_edit_band()
        {
            $this->checklogged();

            if (
                empty($_POST['nombre'])
                || empty($_POST['album'])
                || empty($_POST['cancion'])
                || empty($_POST['anio'])
            ) {
                echo ' los campos estan vacios';
            }
            $this->bandsModel->update(
                $_POST['nombre'],
                $_POST['album'],
                $_POST['cancion'],
                $_POST['anio'],
                $_POST['id']
            );

            header('Location: ' . BASE_URL . 'ABMbandas');
        }

        public function show_A_B_M_Genres()
        {
            $this->checklogged();

            $user = $this->getUserName();
            $generos = $this->modelGenres->getGenres();
            $this->view->showOptionsGenres($generos, $user);
        }

        public function addGenres()
        {
            $this->checklogged();

            $this->view->showAddGenres();
        }

        public function saveGenre()
        {
            $this->checklogged();

            if (empty($_POST['nombre_genero'])) {
                $this->view->showAddGenres("Debe completar los campos");
            } else {
                $genero = $_POST['nombre_genero'];
                $this->modelGenres->insert($genero);
                header('Location: ' . BASE_URL . 'ABMgeneros');
            }
        }

        public function deleteGenre($id)
        {
            $this->checklogged();

            $this->modelGenres->delete($id);
            header('Location: ' . BASE_URL . 'ABMgeneros');
        }

        public function editGenre($id)
        {
            $this->checklogged();

            $obtenerId = $this->modelGenres->get($id);
            //var_dump($obtenerId);die;
            $this->view->showFormEditForGenres($obtenerId);
        }

        public function save_edit_genre()
        {
            $this->checklogged();

            if (empty($_POST['nombre_generos'])) {
                $this->view->showFormEditForGenres("Los campos están vacios");
            } else {
                $this->modelGenres->update($_POST['id_genero'], $_POST['nombre_generos']);
                header('Location: ' . BASE_URL . 'ABMgeneros');
            }
        }

        public function show_A_B_M_Users()
        {
            $this->checklogged();
            $user = $this->getUserName();
            $admin = $this->modelAdmin->getAllAdmin();
            $this->view->showOptionsUsers($admin, $user);
        }

        public function addUsers()
        {
            $this->checklogged();

            $admin = $this->modelAdmin->getAllAdmin();
            $this->view->showAddAdmin();
        }

        public function saveUser()
        {
            $this->checklogged();

            if (
                empty($_POST['apellido_nombre']
                    || empty($_POST['nombre_usuario']))
                || empty($_POST['pass'])
            ) {
                $this->view->showFormEditForAdmin("Debe completar los campos");
            } else {
                $nombre = $_POST['apellido_nombre'];
                $user = $_POST['nombre_usuario'];
                $pass = $_POST['pass'];
                $this->modelAdmin->insert_user($nombre, $user, $pass);
                header('Location: ' . BASE_URL . 'ABMuser');
            }
        }

        public function deleteUser($id)
        {
            $this->checklogged();

            $this->modelAdmin->delete_user($id);
            header('Location: ' . BASE_URL . 'ABMuser');
        }

        public function editUser($id)
        {
            $this->checklogged();

            $obtenerId = $this->modelAdmin->get_admin($id);
            $this->view->showFormEditForAdmin($obtenerId);
        }

        public function save_edit_user()
        {
            $this->checklogged();

            if (
                empty($_POST['nombre_usuario']) ||
                empty($_POST['username']) ||
                empty($_POST['pass'])
            ) {
                $this->view->showAddAdmin("Debe completar los campos");
            } else {
                $this->modelAdmin->update_admin($_POST['id_admin'], $_POST['nombre_usuario'], $_POST['username'], $_POST['pass']);
                header('Location: ' . BASE_URL . 'ABMuser');
            }
        }
    }
