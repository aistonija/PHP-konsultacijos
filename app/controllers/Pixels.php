<?php

class Pixels extends Controller
{
    public function __construct()
    {
        $this->pixelModel = $this->model('Pixel');
        $this->userModel = $this->model('User');
    }


    public function index()
    {
        if ($this->pixelModel->getAllPixels()) {
            $pixels = $this->pixelModel->getAllPixels();
        }

        // init data
        $data = [
            'title' => 'All Stars Bash',
            'pixels' => $pixels ?? [],
            'pixelsError' => $errorMessage ?? '',
        ];

        // Load View
        $this->view('pixels/allPixels', $data);
    }

    public function myPixels()
    {
        if (!isLoggedIn()) {
            redirect('index');
        }

        if ($this->pixelModel->getUserPixels($_SESSION['user_id'])) {
            $pixels = $this->pixelModel->getUserPixels($_SESSION['user_id']);
        }

        // init data
        $data = [
            'title' => 'ONLY MINE',
            'pixels' => $pixels ?? [],
            'pixelsError' => $errorMessage ?? '',
        ];

        // Load View
        $this->view('pixels/myPixels', $data);
    }

    public function addPixel()
    {
        if (!isLoggedIn()) {
            redirect('index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Data from post
            $postData = [
                'user_id' => $_POST['user_id'],
                'pixel_x' => trim($_POST['pixel_x']),
                'pixel_y' => trim($_POST['pixel_y']),
                'color' => trim($_POST['color']),
                'size' => trim($_POST['size'])
            ];

            $errors = [];

            $trigger_x = true;
            $trigger_y = true;

            //Validate pixel x input
            if (!validate_field_not_empty($postData['pixel_x'])) {
                $errors['pixel_x_error'] = 'Please provide Coordinate X';
                $trigger_x = false;
            } elseif (!validate_numeric_value($postData['pixel_x'])) {
                $errors['pixel_x_error'] = 'Please provide Numeric Value';
                $trigger_x = false;
            }

            //Validate pixel y input
            if (!validate_field_not_empty($postData['pixel_y'])) {
                $errors['pixel_y_error'] = 'Please provide Coordinate Y';
                $trigger_y = false;
            } elseif (!validate_numeric_value($postData['pixel_y'])) {
                $errors['pixel_y_error'] = 'Please provide Numeric Value';
                $trigger_y = false;
            }

            // Validate pixel color selection
            if (!validate_field_not_empty($postData['color'])) {
                $errors['color_error'] = 'Please choose valid Color';
            }

            // Get all users pixels from db
            $pixels = $this->pixelModel->getAllPixels();

            // If coordinates x & y were provided correctly - check if within container and if not taken already
            if ($trigger_x && $trigger_y) {
                // Validate pixel coordinates not taken
                if (!validate_pixel_coordinates($postData, $pixels)) {
                    $errors['pixel_out_of_container'] = 'Coordinates are already taken';

                    // Otherwise check if within container
                } elseif (!empty(validate_coordinates_within_container_error($postData))) {
                    $errors['pixel_out_of_container'] = validate_coordinates_within_container_error($postData);
                }
            }

            // If empty errors array - create new pixel in db
            if (validate_empty_array($errors)) {
                if ($this->pixelModel->addPixel($postData)) {
                    $pixelCreateMessage = 'Pixel added successfully';
                } else {
                    $pixelCreateMessage = 'Something went terribly wrong..';
                }
            }
        }

        // init data
        $data = [
            'title' => 'ADD MORE PIXELLLTTHHHSS',
            'filled_data' => $postData ?? [],
            'errors' => $errors ?? [],
            'pixelCreatingMessage' => $pixelCreateMessage ?? '',
        ];
        // Load View
        $this->view('pixels/addPixel', $data);
    }

    public function editPixel()
    {
        if (!isLoggedIn()) {
            redirect('index');
        }

        if (isset($_POST['action']) && $_POST['action'] === 'Update') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            var_dump($_POST);

            $postData = [
                'pixel_id' => $_POST['pixel_id'],
                'user_id' => $_POST['user_id'],
                'pixel_x' => trim($_POST['pixel_x']),
                'pixel_y' => trim($_POST['pixel_y']),
                'color' => trim($_POST['color']),
                'size' => trim($_POST['size'])
            ];

            $errors = [];

            //Validate pixel x input
            if (!validate_field_not_empty($postData['pixel_x'])) {
                $errors['pixel_x_error'] = 'Please provide Coordinate X';
            } elseif (!validate_numeric_value($postData['pixel_x'])) {
                $errors['pixel_x_error'] = 'Please provide Numeric Value';
            }

            //Validate pixel y input
            if (!validate_field_not_empty($postData['pixel_y'])) {
                $errors['pixel_y_error'] = 'Please provide Coordinate Y';
            } elseif (!validate_numeric_value($postData['pixel_y'])) {
                $errors['pixel_y_error'] = 'Please provide Numeric Value';
            }

            // Validate pixel color selection
            if (!validate_field_not_empty($postData['color'])) {
                $errors['color_error'] = 'Please choose valid Color';
            }

            //Get All Pixels from db to check coordinates
            $pixels = $this->pixelModel->getAllPixels();

            $currentPixel = $postData['pixel_id'];

            if (!validate_pixel_coordinates($postData, $pixels, $currentPixel)) {
                $errors['pixel_out_of_container'] = 'Coordinates are already taken';
            }

            // Validate pixels are within container error
            if (!empty(validate_coordinates_within_container_error($postData))) {
                $errors['pixel_out_of_container'] = validate_coordinates_within_container_error($postData);
            }

            if (validate_empty_array($errors)) {
                if ($this->pixelModel->updatePixel($postData)) {
                    redirect('pixels/myPixels');
                } else {
                    $pixelCreateMessage = 'Something went terribly wrong..';
                }
            }
        } elseif ($_POST['action'] === 'edit') {
            if ($this->pixelModel->getPixelById($_POST['pixel_id'])) {
                $pixel = $this->pixelModel->getPixelById($_POST['pixel_id']);
            } else {
                redirect('pixels/allPixels');
            }
        } else {
            redirect('pixels/allPixels');
        }


        $data = [
            'title' => $pageError ?? 'Edit Mothafukka pixaaal',
            'pixel' => $pixel ?? null,
            'filled_data' => $postData ?? [],
            'errors' => $errors ?? [],
            'pixelCreatingMessage' => $pixelCreateMessage ?? '',
        ];

        // Load View
        $this->view('pixels/editPixel', $data);
    }

    public function deletePixel()
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            // var_dump($_POST);
            if ($this->pixelModel->deletePixel($_POST['pixel_id'])) {
                $pixelRemoval = 'Pixel was removed successfully';
            }

            $pixels = $this->pixelModel->getUserPixels($_SESSION['user_id']);
            $data = [
                'title' => 'ONLY MINE',
                'pixels' => $pixels ?? [],
                'pixelsError' => $errorMessage ?? '',
                'pixelRemoval' => $pixelRemoval ?? '',
            ];

            $this->view('pixels/myPixels', $data ?? []);
        } else {
            redirect('pixels/allPixels');
        }
    }
}