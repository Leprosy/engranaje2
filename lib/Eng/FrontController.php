<?php

/**
 * FrontController takes a Request object and invokes the appropriate controller
 * and action.
 * 
 * Example Usage:
 * 
 *     $fc = new Eng_FrontController();
 *     $fc->addRouter(new Eng_GetRouter());
 *     $fc->processRequest(new Eng_HttpRequest());
 * 
 * @package lightvc
 * @author Anthony Bush
 * @since 2007-04-20
 **/
class Eng_FrontController {
	protected $routers = array();
	
	/**
	 * Add a router to give it a chance to route the request.
	 * 
	 * The first router to return true to the {@link route()} call
	 * will be the last router called, so add them in the order you want them
	 * to run.
	 *
	 * @return void
	 * @author Anthony Bush
	 **/
	public function addRouter(Eng_RouterInterface $router) {
		$this->routers[] = $router;
	}
	
	/**
	 * Processes the request data by instantiating the appropriate controller and
	 * running the appropriate action.
	 *
	 * @return void
	 * @throws Eng_Exception
	 * @author Anthony Bush
	 **/
	public function processRequest(Eng_Request $request) {
		try
		{
			// Give routers a chance to (re)-route the request.
			foreach ($this->routers as $router) {
				if ($router->route($request)) {
					break;
				}
			}

			// If controller name or action name are not set, set them to default.
			$controllerName = $request->getControllerName();
			if (empty($controllerName)) {
				$controllerName = Eng_Config::getDefaultControllerName();
				$actionName     = Eng_Config::getDefaultControllerActionName();
				$actionParams = $request->getActionParams() + Eng_Config::getDefaultControllerActionParams();
				$request->setActionParams($actionParams);
			} else {
				$actionName = $request->getActionName();
				if (empty($actionName)) {
					$actionName   = Eng_Config::getDefaultActionName();
				}
			}

			$controller = Eng_Config::getController($controllerName);
			if (is_null($controller)) {
				throw new Eng_Exception('Unable to load controller "' . $controllerName . '"');
			}
			$controller->setControllerParams($request->getControllerParams());
			$controller->runAction($actionName, $request->getActionParams());
		}
		catch (Eng_Exception $e)
		{
			// Catch exceptions and append additional error info if the request object has anything to say.
			$moreInfo = $request->getAdditionalErrorInfo();
			if (!empty($moreInfo)) {
				throw new Eng_Exception($e->getMessage() . '. ' . $moreInfo);
			} else {
				throw $e;
			}
		}
	}
}