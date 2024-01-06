<?php

namespace cse;

class TemplateFactory
{
    public static function createSmarty()
    {
        $engine = new \Smarty();
        $engine->setTemplateDir($_ENV['TPL_PATH']);
        $engine->setCompileDir($_ENV['TPL_COMPILE_PATH']);
        $engine->setConfigDir($_ENV['SMARTY_CONFIG_PATH']);
        $engine->setCacheDir($_ENV['SMARTY_CACHE_PATH']);
        return $engine;
    }
}