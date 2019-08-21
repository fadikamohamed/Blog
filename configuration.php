<?php

session_start();
require_once 'models/connectionDB.php';
require_once 'models/modelAdmin.php';
require_once 'models/modelAlbum.php';
require_once 'models/modelPicture.php';
require_once 'models/modelComments.php';
require_once 'controllers/controllerSideComments.php';
require_once 'assets/regex.php';
?>