<?php
//Load Config
require_once 'config/config.php';

//Load Helpers
require_once 'helpers/url_helper.php';

//Load Session Helper
require_once 'helpers/session_helper.php';

//Load Form Validators
require_once 'helpers/form_validators.php';

//Load Pixel Form Validators
require_once 'helpers/pixels_validators.php';

//Load libraries statically
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// Autoload Core Libraries
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});