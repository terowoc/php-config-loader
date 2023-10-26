<?php

namespace Terowoc\PHPConfigLoader;

interface LoaderInterface
{
    public function get(string $key, $default = null): mixed;
}
