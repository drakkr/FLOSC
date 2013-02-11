<?php

/**
 * FLOSSC REST backend: return/store metadata of a specific project (identified by Id) 
 *
 * @namespace Tonic\Examples\Sloc\Project
 * @uri /project/{Id}
 */
class ProjectResource extends Resource {
    
    
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
	$query = "SELECT Id, Name, Version, SiteUrl, CodeUrl, Indus, Archi, Dep, Complexity FROM Project WHERE Id = $Id LIMIT 1";
	$result = mysql_query($query, $IdDB);

	$body["identifier"] = "Id";
	$body["items"] = mysql_fetch_assoc($result);
    
	$response->addHeader('Content-type', 'application/json');
	$response->body = json_encode($body);

        return $response;
    }

    /**
     * Handle a PUT request for this resource
     * @param Request request
     * @return Response
     */
    function put($request, $Id) {
        
        $response = new Response($request);
        
        if ($request->data) {
	    $response->addHeader('Content-type', 'text/plain');

	    $project = json_decode($request->data);
            $Name = $project->items->Name;
            $Version = $project->items->Version;
            $Indus = $project->items->Indus;
            $Archi = $project->items->Archi;
            $Dep = $project->items->Dep;
	    if(is_null($Indus)) $Indus = 0;
	    if(is_null($Archi)) $Archi = 0;
	    if(is_null($Dep)) $Dep = 0;

	    $db_host = "localhost";
	    $db_user = "root";
	    $db_pwd = "osiris";
	    $db_db = "flossc";

	    $IdDB = mysql_connect($db_host ,$db_user, $db_pwd);
	    mysql_select_db($db_db);
	    $query = "UPDATE Project SET Name = '$Name', Version = '$Version', Indus = $Indus, Archi = $Archi, Dep = $Dep WHERE Id = $Id";
	    if ($result = mysql_query($query, $IdDB)) {
		$response->code = Response::OK;
		$response->body = "$Name has been saved.";
	    } else {
		$response->code = Response::INTERNALSERVERERROR;
		$response->body = "Error when saving $Name.";
	    }
            
        } else {
            
            $response->code = Response::LENGTHREQUIRED;
            
        }
        
        return $response;
    }

    /**
     * Handle a DELETE request for this resource
     * @param Request request
     * @return Response
     */
    function delete($request, $Id) {
        
        $response = new Response($request);
	$response->addHeader('Content-type', 'text/plain');

	$db_host = "localhost";
	$db_user = "root";
	$db_pwd = "osiris";
	$db_db = "flossc";

	$IdDB = mysql_connect($db_host ,$db_user, $db_pwd);
	mysql_select_db($db_db);
	$query = "DELETE FROM Project WHERE Id = $Id";
	if ($result = mysql_query($query, $IdDB)) {
	    $response->code = Response::OK;
	    $response->body = "Project has been deleted.";
	} else {
	    $response->code = Response::INTERNALSERVERERROR;
	    $response->body = "Error when deleting project.";
	}
        
        return $response;
    }

    
}