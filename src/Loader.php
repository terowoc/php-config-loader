<?php

namespace Terowoc\PHPConfigLoader;

class Loader implements LoaderInterface
{
    public function get(string $key, $default = null): mixed
    {
        [$file, $key] = explode('.', $key);
        $configPath = dirname(__DIR__) . "/config/{$file}.php";

        if (!file_exists($configPath)) {
            return $default;
        }

        $config = require_once $configPath;
        return $config[$key] ?? $default;
    }
}
