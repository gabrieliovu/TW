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
    // $this->respond('views/contact.html', ['name' => 'Iulia']);
	public function respond($responseOrTemplate, $useTemplateOrTemplateParams = true, $responseCode = 200) {
		header('Content-Type: text/html; charset=utf-8');
		http_response_code($responseCode);
        $viewClosure = function ($params, $template) { // ca sa nu mai aiba acces la variab parintelui
            eval('?>' . $template . '<?php');
        };
		if (!$useTemplateOrTemplateParams) {
			echo $responseOrTemplate;
		} else {
			if (!file_exists($responseOrTemplate)) {
				http_response_code(500);
				echo 'Error: view file "' . $responseOrTemplate . '" not found.';
				exit;
			}
			$template = file_get_contents($responseOrTemplate); // path0
			if (!$this->layout['use']) {
				// directly display the view if there's no layout in use
                eval('?>' . $viewClosure($useTemplateOrTemplateParams, $template) . '<?php');
			} else {
				// replace @content in layout and display the layout
				if (!file_exists($this->layout['template'])) {
					echo 'Error: layout file "' . $this->layout['template'] . '" not found.';
					exit;
				}
				$layout = file_get_contents($this->layout['template']);

				$layout = str_replace('@content', $template, $layout);
                eval('?>' . $viewClosure($useTemplateOrTemplateParams, $layout) . '<?php');
			}
		}
	}

	public function respondJson($response, $responseCode = 200) {
		http_response_code($responseCode);
		header("Content-Type: application/json+rss+xml;charset=ISO-8859-1");
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