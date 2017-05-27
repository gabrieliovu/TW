<?php namespace App;
// uitasem sa declaram namespace-ul

// fisieru asta va avea namespace App
// si tragi clasele / metodele cu App\
// ex: App\BaseController;

class BaseController {
	public $layout = [
		'use' => false,
		'template' => null,
		'params' => []
	];
	public function __construct() {
		//
	}
	public function respond($responseOrTemplate, $useTemplateOrTemplateParams = true, $responseCode = 200) {
		header('Content-Type: text/html; charset=utf-8');
		http_response_code($responseCode);
		if (!$useTemplateOrTemplateParams) {
			echo $responseOrTemplate;
		} else {
			if (!file_exists($responseOrTemplate)) {
				http_response_code(500);
				echo 'Error: view file "' . $responseOrTemplate . '" not found.';
				exit;
			}
			$template = file_get_contents($responseOrTemplate);
			if (is_array($useTemplateOrTemplateParams)) {
				foreach ($useTemplateOrTemplateParams as $name => $value) {
					$template = str_replace('{{' . $name . '}}', $value, $template);
				}
			}
			if (!$this->layout['use']) {
				// directly display the view if there's no layout in use
				echo $template;
			} else {
				// replace @content in layout and display the layout
				if (!file_exists($this->layout['template'])) {
					echo 'Error: layout file "' . $this->layout['template'] . '" not found.';
					exit;
				}
				$layout = file_get_contents($this->layout['template']);
				foreach ($this->layout['params'] as $name => $value) {
					$layout = str_replace('{{' . $name . '}}', $value, $layout);
				}
				$layout = str_replace('@content', $template, $layout);
				echo $layout;
			}
		}
	}

	public function respondJson($response, $responseCode = 200) {
		http_response_code($responseCode);
		header("Content-Type: application/json;charset=utf-8");
		echo json_encode($response);
	}

	public function setLayout($template, $params = []) {
		// reinit layout params
		$this->layout['params'] = [];
		// use layout / true or false
		if ($template === false) {
			$this->layout['use'] = false;
		} else {
			$this->layout['use'] = true;
			$this->layout['template'] = $template;
			// if using layout, set its param values (ex.: {{title}} in layout.html)
			foreach ($params as $name => $value) {
				$this->layout['params'][$name] = $value;
			}
		}
	}
}