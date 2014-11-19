<?php
class Ampersand_Mustache_Block_Script extends Mage_Core_Block_Template
{

    /** @var array */
    protected $scriptTemplate = '<script type="text/template" id="%s">%s</script>';
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