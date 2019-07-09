<?php
 
try {
	ob_start();
	
	require_once 'vendor/autoload.php';

	$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$url = str_replace(BASE_URL, '', $url);
	list($classe, $metodo) = array_values(array_filter(explode('/', $url)));

	$classe .= 'Controller';

	$objeto = new $classe();

	$reflectionMethod = new ReflectionMethod($classe, $metodo);
	$parametros = [];

	foreach ($reflectionMethod->getParameters() as $param) {
	    $parametros[] = $_REQUEST[$param->getName()];
	}

	$retorno = call_user_func_array([$objeto, $metodo], $parametros);
	$retorno['status'] = true;
} catch (FriendlyException $e) {
	$retorno['status'] = false;
	$retorno['message'] = $e->getMessage();
} catch (Exception $e) {
	$retorno['status'] = false;
	$retorno['message'] = "Ocorreu um erro inesperado, por favor tente novamente.";
} finally {
	$output = ob_get_clean();
	echo json_encode($retorno);
}