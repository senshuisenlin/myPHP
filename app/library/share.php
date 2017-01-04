<?php 
//http://blog.csdn.net/u010852544/article/details/44037555
require_once '.'.DS.'common.php';

function  loadClass($className)
{
	$classPath =ROOTPATH.DS.'app'.DS.'controller'.DS.$className.'.php';
	$logicPath = ROOTPATH.DS.'app'.DS.'logic'.DS.$className.'.php';
	$modelPath = ROOTPATH.DS.'app'.DS.'models'.DS.$className.'.php';
	$templatePath =ROOTPATH.DS.'app'.DS.'templates'.DS.$className.'.php';
	
	$fileNameArr = [$classPath,$logicPath,$modelPath,$templatePath];
	foreach ($fileNameArr as $fileName)
	{
		if (is_file($fileName))
		{
			require_once $fileName;
		}
		else
		{
			echo 'Class file : '.$fileName.' not found!';
			break;
		}
	}
}

spl_autoload_register('loadClass');

function main()
{
	$controller = isset($_GET['c'])?$_GET['c']:'Index';
	$action =isset($_GET['m'])?$_GET['m']:'Index';
	$ctrlName = $controller;
	$controller .= 'Controller';
	
	$dispatch = new $controller($ctrlName,$action);
	if (method_exists($controller, $action))
	{
		call_user_func([$dispatch,$action]); //调用class中的action方法
	}
	else
	{
		echo 'The method : '.$action.' not found!';
	}
}

call_user_func('main');
?>