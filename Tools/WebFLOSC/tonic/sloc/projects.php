<?php

/**
 * FLOSSC REST backend: return list of all projects
 *
 * @namespace Tonic\Examples\Sloc\Projects
 * @uri /projects
 */
class ProjectsResource extends Resource {
    
    
    /**
     * Handle a GET request for this resource
     * @param Request request
     * @return Response
     */
    function get($request) {
        
        $response = new Response($request);
        $response->code = Response::OK;

	$db_host = "localhost";
	$db_user = "root";
	$db_pwd = "osiris";
	$db_db = "flossc";

	$IdDB = mysql_connect($db_host ,$db_user, $db_pwd);
	mysql_select_db($db_db);
	$query = "Select P.Id, P.Name, P.Version, ROUND(SUM(PFna)) as PFna, ROUND(SUM(PFna) * (0.65 + ((2-P.Indus)+(2-P.Archi)+(2-P.Dep))/20)) as PFa from V_Projet, Project P where P.Id = Project_Id GROUP BY P.Id ORDER BY P.Name, P.Version";
	$result = mysql_query($query, $IdDB);

	$projects = array();
	while($row = mysql_fetch_row($result)) {
	  array_push($projects, array( "Id" => (int)$row[0], "Name" => "$row[1]", "Version" => "$row[2]", "PFna" => (int)$row[3], "PFa" => (int)$row[4] ));
	}

	$body["identifier"] = "Id";
	$body["items"] = $projects;
    
	$response->addHeader('Content-type', 'application/json');
	$response->body = json_encode($body);

        return $response;
        
    }
    
}

