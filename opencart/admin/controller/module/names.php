<?php
class ControllerModuleNames extends Controller {
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
		$this->load->model('module/names');
		$this->model_module_names->createTables();
	}

	public function uninstall()
	{
		$this->load->model('module/names');
		$this->model_module_names->clearTables();
	}

	public function index()
	{
		$this->document->setTitle('Names');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs'] = $this->get_bread_crumbs('Names', 'names', $this->session->data['token']);
		$this->data['action'] = $this->url->link('module/names', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		if (isset($this->request->post['names_module'])) {
			$this->data['modules'] = $this->request->post['names_module'];
			$this->load->model('module/names');
			$this->model_module_names->addName($this->data['modules']['Name'],$this->data['modules']['Email']);
		} elseif ($this->config->get('names_module')) { 
			$this->data['modules'] = $this->config->get('names_module');
		}

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/names.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
}
?>
