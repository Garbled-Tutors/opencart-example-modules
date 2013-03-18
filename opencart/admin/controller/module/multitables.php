<?php
class ControllerModuleMultitables extends Controller {
	private $error = array();

	protected function get_bread_crumbs($human_name, $machine_name, $token)
	{
		$breadcrumbs = array();
		$breadcrumbs[] = array(	'text' => 'Home', 			'href' => $this->url->link('common/home', 'token=' . $token, 'SSL'), 							'separator' => false	);
		$breadcrumbs[] = array(	'text' => 'Modules', 		'href' => $this->url->link('extension/module', 'token=' . $token, 'SSL'),					'separator' => ' :: '	);
		$breadcrumbs[] = array(	'text' => $human_name,	'href' => $this->url->link('module/' . $machine_name, 'token=' . $token, 'SSL'),	'separator' => ' :: '	);
		return $breadcrumbs;
	}

	public function install()
	{
		$this->load->model('module/multitables');
		$this->model_module_multitables->createTables();
	}

	public function uninstall()
	{
		$this->load->model('module/multitables');
		$this->model_module_multitables->clearTables();
	}

	public function index()
	{
		$this->document->setTitle('Multitables');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs'] = $this->get_bread_crumbs('Multitables', 'multitables', $this->session->data['token']);
		$this->data['action'] = $this->url->link('module/multitables', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		$this->load->model('module/multitables');
		if (isset($this->request->post['multitables_module'])) {
			$this->data['modules'] = $this->request->post['multitables_module'];
			if ($this->data['modules']['action'] == 'add')
			{
				$this->model_module_multitables->addMultitable($this->data['modules']['Name'],$this->data['modules']['Email']);
			}
			elseif ($this->data['modules']['action'] == 'delete')
			{
				$this->model_module_multitables->removeMultitable($this->data['modules']['var']);
			}
			elseif ($this->data['modules']['action'] == 'update')
			{
				$this->model_module_multitables->updateMultitable($this->data['modules']['Name'],$this->data['modules']['Email'],$this->data['modules']['var']);
			}
		}
		$this->data['multitables'] = $this->model_module_multitables->getMultitables();

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/multitables.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
}
?>
