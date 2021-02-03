<?php
// load config file
require_once 'config/config.php';

//Load Game class
require_once 'classes/Gameboard.php';

//Load Helpers
require_once 'helpers/url_helper.php';

//Load Session Helper
require_once 'helpers/session_helper.php';

//Load Form Validators Helper
require_once 'helpers/form_validators.php';

// load libraries automatically
spl_autoload_register(function ($className) {
    require_once "libraries/$className.php";
});