<?php

namespace Coduo\TuTu\Extension;

use Coduo\TuTu\Extension;
use Coduo\TuTu\Extension\Twig\Extension\Json;
use Coduo\TuTu\ServiceContainer;

class Twig implements Extension
{
    /**
     * @var null
     */
    private $locale;

    /**
     * @param string|null $locale
     */
    public function __construct($locale = null)
    {
        $this->locale = $locale;
    }

    /**
     * @param ServiceContainer $container
     */
    public function load(ServiceContainer $container)
    {
        $jsonExtension = new Json($this->locale);
        $container->getService('twig')->addExtension($jsonExtension);
    }
}
