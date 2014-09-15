<?php
class Ampersand_Mustache_Block_Template extends Mage_Core_Block_Template
{
    /**
     * @return string
     * @author Yousef Cisco <yc@amp.co>
     */
    public function renderView()
    {
        $html = parent::renderView();

        $engine = $this->helper('ampersand_mustache')->getEngine();

        $html = $engine->render($html, $this->getStringData());

        return $html;
    }

    public function getStringData()
    {
        $stringData = array();
        foreach ($this->getData() as $key => $value) {
            if (is_string($value)) {
                $stringData[$key] = $value;
            }
        }

        return $stringData;
    }
}