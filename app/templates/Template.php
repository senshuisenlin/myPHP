<?php 
class Template
{
	protected  $var = [];
	protected $ctrl;
	protected $action;
	
	public function __construct($ctrl,$action)
	{
		$this->ctrl = $ctrl;
		$this->action = $action;
	}
	
	public function setVars($name,$value)
	{
		if (is_array($name))
		{
			$this->var = array_merge($this->var,$name);
		}
		else
		{
			$this->var[$name] = value;
		}
	}

	//?
	public function render()
	{
		extract($this->var);
		$classPathTemp = ROOTPATH.DS.'app'.DS.'templates'.DS.$this->ctrl.DS.$this->action.'.php';
		
		if (file_exists($classPathTemp))
		{
			require_once $classPathTemp;
		}
		else 
		{
			echo 'The Class path temp : '.$classPathTemp. ' not found!';
		}
	}
	
}

?>