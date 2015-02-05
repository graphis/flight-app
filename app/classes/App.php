<?php
/**
 * Flight: An extensible micro-framework.
 *
 * @copyright   Copyright (c) 2011, Mike Cao <mike@mikecao.com>
 * @license     MIT, http://flightphp.com/license
 */


namespace App;
//namespace \App;
/**
 * The Flight class is a static representation of the framework.
 */
class App {

    /**
     * @return object Application instance
     */
    public function app() {
        return 'zzz from ' . __FILE__;
    }
}

