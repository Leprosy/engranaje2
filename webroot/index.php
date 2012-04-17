<?php

if (isset($_GET['url']) && $_GET['url'] === 'favicon.ico') {

    // Avoid "not found" errors for favicon, which is automatically requested by most browsers.
} else {

    // Load core application config
    include_once('../config/application.php');

    try {

        // Process the HTTP request using only the routers we need for this application.
        $fc = new Eng_FrontController();
        $fc->addRouter(new Eng_RegexRewriteRouter($regexRoutes));
        $fc->processRequest(new Eng_HttpRequest());
    } catch (Eng_Exception $e) {

        // Log the error message
        error_log($e->getMessage());

        // Get a request for the 404 error page.
        $request = new Eng_Request();
        $request->setControllerName('error');
        $request->setActionName('view');
        $request->setActionParams(array('error' => '404'));

        // Get a new front controller without any routers, and have it process our handmade request.
        $fc = new Eng_FrontController();
        $fc->processRequest($request);
    } catch (Exception $e) {
        // Some other error, output "technical difficulties" message to user?
        error_log($e->getMessage());
        if (APP_ENV == 'dev' && isset($e->xdebug_message)) {
            echo ('<table>' . $e->xdebug_message . '</table>');
            echo "<hr>";
            var_dump($e);
        }
    }
}