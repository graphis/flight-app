<?php
/**
 *
 * index.php
 *
 */


// define paths
define('DS', DIRECTORY_SEPARATOR);
// Set the full path to the docroot
// define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// define('FLIGHTPATH', realpath(__DIR__.'/../src').DS);
define('FLIGHTPATH', realpath(__DIR__.'/../vendor/mikecao/flight/flight').DS); // for starting flight as a framework
define('VENDORPATH', realpath(__DIR__.'/../vendor').DS);

/**
 * Define the start time of the application, used for profiling.
 */
//if ( ! defined('KOHANA_START_TIME'))
//{
// define('FLIGHT_START_TIME', microtime(TRUE));

//}


// flag to load via composer or standalone for example.
$composer = 1; 
/**
* Example for loading the framework via composer or standalone.
* Flight is PSR-0 compliant 
*/
if($composer && file_exists(VENDORPATH.'autoload.php')){
	/* 
	* Composer:
	* installed as a composer package include the composer autoloader and good to go. 
	* tip: when composer autoloader runs it checks the classmap first so to create 
	* the class map for faster loading.
	* run cmd: composer install mmcp/flight --optimize-autoloader | -o
	* or if installed 
	* run cmd: composer dump-autoload -o
	*/
	require VENDORPATH.'autoload.php';
	
} else {

	/**
	* Standalone:
	* Using Flight as standalone simply include flight/src/Flight.php and boom.
	* Alternativly you can include flight/src/autoload.php and good to go.
	* 
	* If using this way and composer autoload registered then the Flight autoload
	* shouldn't run for the framework as composer (classmaped | PSR-0) will take 
	* care of loading as its the first look up. 
	* However the Flight autoload still gets registered to handle any paths added by
	* Flight::path("my/path/to/load/from") instead of making a special case if composer
	* fallbacks present.
	*/
	// print_r( FLIGHTPATH.'autoload.php' );

//	use flight\Engine;
//	$app = new Engine();
//	$app->route('/', function(){
//	    echo 'hello world!';
//	});
//	$app->start();

	require FLIGHTPATH.'Flight.php';
	require FLIGHTPATH.'autoload.php';
}



//
\Flight::set('flight.log_errors', true);

// setting up paths 
\Flight::set('flight.views.path', __DIR__ . '/../app/views');



// before and after hooks
\Flight::before('start', function(&$params, &$output){
	// echo '<hr><pre><code>';
	Flight::set('start', microtime(true));
	// $start = microtime(true);
});

\Flight::after('start', function(&$params, &$output){
	// echo '</code></pre><hr>';
	$end = microtime(true);
	$start = Flight::get('start');
	$creationtime = ($end - $start);
	printf("Page created in %.6f seconds.", $creationtime);
});




// as a framework
// use flight\Engine;
// $app = new Engine();
// use \App\App;

try
{
<<<<<<< HEAD
	// set a default route
	\Flight::route('/', function(){
=======
	// root route
	\Flight::route('/zzz', function(){
	// $app->route('/', function(){
>>>>>>> FETCH_HEAD
		echo 'hello world!';
	});

	// routing wiith a class
	\Flight::route('/', array('\Controller\Greeting', 'hello'));
	\Flight::route('/name/@name',
		array('\Controller\Greeting', 'hello'), true);


	// set a named route
	\Flight::route('/@name', function($name){
		echo 'hello: '.$name;
	});


	// EXAPLE ROUTES
	////////////////////////

	// set a default route
	\Flight::route('/zorro', function(){
        echo 'hello world! -- from route /zorro';
		
		$zzz = new \App\App;
		$zzz2 = $zzz->app();
		print_r($zzz2);
    });

	////////////////////////

	////////////////////////
	// Mappings.
	\Flight::map('notFound', function() {

		// set the header
		http_response_code(404);
		// header("HTTP/1.0 404 Not Found");

		// 
		\Flight::render('404.php', array());
	});



	// set a wildcard catch all route
	// \Flight::route('/*', function(){
	// $app->route('/*', function(){
		// echo 'hello: wildcard';
	// });



	////////////////////////
	// start the Framework
	// $app->start(); 		// as a framework
	\Flight::start(); 	// as static
}
catch (\Exception $e)
{
   die($e->getMessage());
}



// eof