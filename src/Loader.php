<?php

namespace Terowoc\PHPConfigLoader;

class Loader {

	protected string $file;
	private $config;

	public function __construct($file) {
		$this->file = $file;
	}

	private function setConfig($config) {
		$this->config = $config;
	}

	public function getConfig() {
		return $this->config;
	}

	public function get($config_name) {
		$pathInfoExtension = pathinfo($this->file)['extension'];

		if ($pathInfoExtension == 'ini') {
			$conf = parse_ini_file($this->file)[$config_name];
			$this->setConfig($conf);
			return $conf;
		} elseif ($pathInfoExtension == 'json') {
			$conf = json_decode(file_get_contents($this->file), true)[$config_name];
			$this->setConfig($conf);
			return $conf;
		}
	}

	public function getFromArr($name) {
		return $this->getConfig()[$name];
	}
}