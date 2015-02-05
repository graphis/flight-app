<?php
/**
 *
 * Flight index.php
 *
 */


/**
 * The directory in which your application specific resources are located.
 * The application directory must contain the bootstrap.php file.
 *
 * @see  http://kohanaframework.org/guide/about.install#application
 */
$application = '../application';



/**
 * Set the PHP error reporting level. If you set this in php.ini, you remove this.
 * @see  http://php.net/error_reporting
 *
 * When developing your application, it is highly recommended to enable notices
 * and strict warnings. Enable them by using: E_ALL | E_STRICT
 *
 * In a production environment, it is safe to ignore notices and strict warnings.
 * Disable them by using: E_ALL ^ E_NOTICE
 *
 * When using a legacy application with PHP >= 5.3, it is recommended to disable
 * deprecated notices. Disable with: E_ALL & ~E_DEPRECATED
 */
error_reporting(E_ALL | E_STRICT);


// setting up paths
// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// Make the application relative to the docroot, for symlink'd index.php
if ( ! is_dir($application) AND is_dir(DOCROOT.$application))
	$application = DOCROOT.$application;

// Make the system relative to the docroot, for symlink'd index.php
if ( ! is_dir($system) AND is_dir(DOCROOT.$system))
	$system = DOCROOT.$system;

// Define the absolute paths for configured directories
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

// Clean up the configuration vars
unset($application, $modules, $system);










// includes
// require '../vendor/autoload.php';
// require 'flight/autoload.php';

// framework method
use flight\Engine;

$app = new Engine();

$app->route('/', function(){
    echo 'hello world!';
	print_r(APPPATH);
	print_r(SYSPATH);
});







// views 
Flight::set('flight.views.path', __DIR__ . '/../application/templates');








// Before Flight
Flight::before('start', function(&$params, &$output){
	echo '<pre><code>';
});

// After Flight
Flight::after('start', function(&$params, &$output){
	echo '</code></pre>';
});








// Routing
try
{
    // set a default route
    Flight::route('/', function(){
        echo 'hello world! -- from route /';
    });

	// Mappings.
	Flight::map('notFound', function() {
		Flight::render('404.php', array());
	//	Flight::render('hello.php', array('name' => 'Bob'));
		echo 'Uh oh, page not found. Sorry.';
	});

	// start the Framework
	Flight::start();
}
catch (\Exception $e)
{
	die($e->getMessage());
}


// eof