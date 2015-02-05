<?php
/**
 * Flight: An extensible micro-framework.
 *
 * @copyright   Copyright (c) 2011, Mike Cao <mike@mikecao.com>
 * @license     MIT, http://flightphp.com/license
 */


namespace Controller;
//namespace \App;
/**
 * The Flight class is a static representation of the framework.
 */
class Greeting {
    public static function hello() {
		\Flight::render('index', array(), 'content');
		\Flight::render('layout', array());
//		$name = \Flight::route;
 //      echo 'hello world! from class, my name is ' . $name;
 
// $r = Flight::get('id');
 
//	 	print_r( $r );
    }
}