<?php
require_once 'models/coment.model.php';
require_once 'api/api.view.php';

class CommentsApiController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ComentsModel();
        $this->view = new APIview();
    }

    public function getComments()
    {
        $a = $this->model->getAll();
        $this->view->response($a, 200);
    }

    public function getComment($params)
    {
        $id = $params[':ID'];
        $a = $this->model->get($id);
        if ($a)
            $this->view->response($a, 200);
        else    
        $this->view->response("no existe la tarea", 404);
    }
}
