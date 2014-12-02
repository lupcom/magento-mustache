<?php
class Ampersand_Mustache_Block_Script extends Ampersand_Mustache_Block_Abstract
{

    /** @var array */
    protected $scriptTemplate = '<script type="text/template" id="%s">{{! //<![CDATA[ }}%s{{! //]]> }}</script>';
    protected $templateId = '';

    /**
     * @return string
     * @author Yousef Cisco <yc@amp.co>
     */
    public function renderView()
    {
        $html = parent::renderView();

        $html = sprintf($this->scriptTemplate, $this->getTemplateId(), $html);

        return $html;
    }

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

}