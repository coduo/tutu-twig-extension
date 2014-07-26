<?php

namespace Coduo\TuTu\Extension\Twig\Extension;

class Json extends \Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'tutu.twig.json.extension';
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            'json_decode' => new \Twig_Filter_Method($this, 'jsonDecode'),
        ];
    }

    /**
     * @param string $json
     * @param bool $asArray
     * @param int $depth
     * @return array|object
     */
    public function jsonDecode($json, $asArray = true, $depth = 512)
    {
        return json_decode($json, $asArray, $depth);
    }
}
