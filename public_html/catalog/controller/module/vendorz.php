<?php  
class ControllerModuleVendorz extends Controller { 
	protected function index() {
		$this->language->load('module/vendorz');
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_mymod'] 		= $this->language->get('text_mymod');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/vendorz.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/vendorz.tpl';
		} else {
			$this->template = 'default/template/module/vendorz.tpl';
		}
		
		$this->render();
	}
}
?>
