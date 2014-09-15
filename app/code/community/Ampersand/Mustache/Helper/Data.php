<?php
class Ampersand_Mustache_Helper_Data extends Mage_Core_Helper_Abstract
{

    protected $dic;

    /**
     * @return Mustache_Engine
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getEngine()
    {
        return $this->getDic()->getMustacheEngine();
    }

    /**
     * @return Ampersand_Mustache_Dic
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getDic() {
        if ($this->dic === null) {
            $this->dic = new Ampersand_Mustache_Dic();
        }

        return $this->dic;
    }
}