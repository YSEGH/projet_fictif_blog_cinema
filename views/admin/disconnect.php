<?php
session_start();
session_destroy();
header('Location: ' . $router->generate('signin'));