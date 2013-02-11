<?php

// load Tonic library
require_once '../lib/tonic.php';

// load examples
require_once '../sloc/projects.php';
require_once '../sloc/project.php';
require_once '../sloc/languages.php';

// handle request
$request = new Request(array(
    'baseUri' => '/WebFLOSC/tonic/docroot'
));

try {
    $resource = $request->loadResource();
    $response = $resource->exec($request);

} catch (ResponseException $e) {
    switch ($e->getCode()) {
    case Response::UNAUTHORIZED:
        $response = $e->response($request);
        $response->addHeader('WWW-Authenticate', 'Basic realm="WebFLOSC"');
        break;
    default:
        $response = $e->response($request);
    }
}
$response->output();

