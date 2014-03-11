<?php
/**
 * DevramaMVC
 * Developed by devrama.com
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */

date_default_timezone_set('America/Toronto');

define('DEBUG_MODE', 'strict');
//define('DEBUG_MODE', 'smooth');
//define('DEBUG_MODE', 'log');

define('FROM_INDEX', TRUE);

require_once('config.php');
require_once('system/core/dmvc.php');

$_dmvc = DMVC::getInstance();
$_dmvc->init();

