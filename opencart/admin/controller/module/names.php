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

	public function index() {
		$this->document->setTitle('Names');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs'] = $this->get_bread_crumbs('Names', 'name', $this->session->data['token']);

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/name.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/name')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
