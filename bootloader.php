<?php
session_start();

//Load Config
require_once 'config/config.php';

//Load Database class
require_once 'classes/Database.php';

//Load Validation class
require_once 'classes/Validation.php';

//Load Session Helper
require_once 'helpers/session_functions.php';