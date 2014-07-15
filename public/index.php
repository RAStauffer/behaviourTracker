<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
error_reporting(E_ERROR);
ini_set('display_errors', true);
chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
