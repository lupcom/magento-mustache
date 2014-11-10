<?php
class Ampersand_Mustache_Block_Template extends Mage_Core_Block_Template
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

        if (!is_array($dataOrKey)) {
            $data = array($dataOrKey => $value);
        } else {
            $data = $dataOrKey;
        }

        // Handle Varien Objects as we're likely to use them
        if ($data instanceof Varien_Object) {
            $data = $data->getData();
        }

        // Clear old data if the same block is being used to render multiple children
        if ($clear) {
            $this->templateData = $data;
        } else {
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