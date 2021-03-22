<?php

/**
 * ajax -> data -> search
 * 
 * @package Sngine
 * @author Zamblek
 */

// fetch bootstrap
require('../../../../bootstrap.php');
require_once('../../../../includes/class-user-global.php');
// check AJAX Request
is_ajax();

// valid inputssearch_quick
if (!isset($_POST['query'])) {
	_error(400);
}

try {
	$userGlobal = new UserGlobal();
	// initialize the return array
	$return = array();

	//-- please do not remove this ltrim @
	$query = ltrim($_POST['query'], '@');
	// get results
	$results = $userGlobal->global_search_quick($query);
	//$results = $user->search_quick($_POST['query']);

	if ($results) {
		/* assign variables  */
		$smarty->assign('results', $results);
		/* return */

		$return['results'] = $smarty->fetch("global_ajax.search.tpl");
	}
	$smarty->assign('userGlobal', $userGlobal);
	// return & exit
	return_json($return);
} catch (Exception $e) {
	modal("ERROR", __("Error"), $e->getMessage());
}
