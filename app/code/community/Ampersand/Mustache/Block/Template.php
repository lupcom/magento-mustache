<?php
class Ampersand_Mustache_Block_Template extends Ampersand_Mustache_Block_Abstract
{

    /** @var array */
    protected $templateData = array();

    /**
     * @return string
     * @author Yousef Cisco <yc@amp.co>
     */
    public function renderView()
    {
        $html = parent::renderView();

        $engine = $this->helper('ampersand_mustache')->getEngine();

        $html = $engine->render($html, $this->getTemplateData());

        return $html;
    }

    /**
     * @return Ampersand_Mustache_Block_Template
     * @author Yousef Cisco <yc@amp.co>
     */
    public function setTemplateData($dataOrKey, $value = null, $clear = false)
    {

        if (is_string($dataOrKey) && !is_null($value)) {
            $data = array($dataOrKey => $value);
        } else {
            $data = $dataOrKey;
        }

        // Handle Varien Objects as we're likely to use them
        if ($data instanceof Varien_Object) {
            $data = $data->getData();
        }

        if ($clear) {
            // Clear old data if the same block is being used to render the same template multiple times
            $this->templateData = $data;
        } else {
            // Allow setting more data in a separate call
            $this->templateData = array_merge($this->templateData, $data);
        }

        return $this;
    }

    /**
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getTemplateData()
    {
        return $this->templateData;
    }

}
