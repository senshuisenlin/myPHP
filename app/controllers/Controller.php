<?php 
class Controller 
{
	protected $ctrl;
	protected $action;
	protected $template;
	
	public function __construct($ctrl,$action)
	{
		$this->ctrl = $ctrl;
		$this->action = $action;
		$this->template = new Template($ctrl, $action);
	}
	
	public function setVars($name,$value ='')
	{
		$this->template->setVars($name,$value);
	}
	
	//?
	public function __desturct()
	{
		$this->template->render();
	}
	
}


?>