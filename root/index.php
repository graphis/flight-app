<?php
/**
 *
 * index.php
 *
 */


// define paths
define('DS', DIRECTORY_SEPARATOR);
// define('FLIGHTPATH', realpath(__DIR__.'/../src').DS);
define('FLIGHTPATH', realpath(__DIR__.'/../vendor/mikecao/flight/flight').DS); // for starting flight as a framework
define('VENDORPATH', realpath(__DIR__.'/../vendor').DS);



//flag to load via composer or standalone for example.
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
\Flight::set('flight.views.path', __DIR__ . '/../app/templates');



// before and after hooks
\Flight::before('start', function(&$params, &$output){
	echo '<hr><pre><code>';
});

\Flight::after('start', function(&$params, &$output){
	echo '</code></pre><hr>';
});




// as a framework
// use flight\Engine;
// $app = new Engine();
// use \App\App;

try
{
	// set a default route
	\Flight::route('/', function(){
	// $app->route('/', function(){
		echo 'hello world!';
	});

	// set a named route
	\Flight::route('/@name', function($name){
	// $app->route('/@name', function($name){
		echo 'hello: '.$name;
	});


	// EXAPLE ROUTES
	////////////////////////

	// set a default route
	\Flight::route('/zorro', function(){
	// $app->route('/zorro', function(){
        echo 'hello world! -- from route /zorro';
		
		$zzz = new \App\App;
		$zzz2 = $zzz->app();
		print_r($zzz2);
    });

	////////////////////////


	// set a wildcard catch all route
	\Flight::route('/*', function(){
	// $app->route('/*', function(){
		echo 'hello: wildcard';
	});

	// start the Framework
	// $app->start(); 		// as a framework
	\Flight::start(); 	// as static
}
catch (\Exception $e)
{
   die($e->getMessage());
}



// eof