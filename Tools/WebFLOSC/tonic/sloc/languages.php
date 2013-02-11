<?php

/**
 * FLOSSC REST backend: return languages stats for a specific project (identified by Id)
 *
 * @namespace Tonic\Examples\Sloc\Project
 * @uri /languages/{Id}
 */
class ProjectLanguagesResource extends Resource {
    
    
    /**
     * Handle a GET request for this resource
     * @param Request request
     * @return Response
     */
    function get($request, $Id) {
        
        $response = new Response($request);
        $response->code = Response::OK;

	$db_host = "localhost";
	$db_user = "root";
	$db_pwd = "osiris";
	$db_db = "flossc";

	$IdDB = mysql_connect($db_host ,$db_user, $db_pwd);
	mysql_select_db($db_db);
	$query = $query = "SELECT Name, Sloc, Ratio, PFna FROM V_Projet WHERE Project_Id = '$Id' ORDER BY PFna DESC";
	$result = mysql_query($query, $IdDB);

	$languages = array();
	while($row = mysql_fetch_row($result)) {
	  array_push($languages, array( "Name" => $row[0], "Sloc" => (int)$row[1], "Ratio" => (int)$row[2], "PFna" => (int)$row[3] ));
	}

	$body["identifier"] = "Name";
	$body["items"] = $languages;
    
	$response->addHeader('Content-type', 'application/json');
	$response->body = json_encode($body);

        return $response;
        
    }
    
}