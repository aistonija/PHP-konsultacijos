<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->pixelModel = $this->model('Pixel');
    }

    public function index()
    {
        $data = [
            'title' => 'Pixelotron 3000',
            'description' => 'Fun and creative way to learn coding and become developer'
        ];


        $this->view('pages/index', $data);
    }

    public function activityLog()
    {
        if (!isLoggedIn()) {
            redirect('index');
        }

        if ($this->pixelModel->getUserPixelsActivity($_SESSION['user_id'])) {
            $userActivity = $this->pixelModel->getUserPixelsActivity($_SESSION['user_id']);
        } else {
            $emptyEctivity = 'No user activity found';
        }
        // init data
        $data = [
            'title' => 'I\'ll check your history, you perv',
            'userActivity' => $userActivity ?? [],
            'emptyActivity' => $emptyEctivity ?? '',
        ];

        // Load View
        $this->view('pages/activityLog', $data);
    }
}