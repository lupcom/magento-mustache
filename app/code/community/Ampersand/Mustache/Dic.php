<?php
class Ampersand_Mustache_Dic extends \Pimple
{
    /**
     * @return void
     * @author Yousef Cisco <yc@amp.co>
     */
    public function __construct($params = array())
    {
        parent::__construct($params);

        $this['mustache_engine'] = function($c) {
            return new Mustache_Engine();
        };
    }

    /**
     * @return Mustache_Engine
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getMustacheEngine()
    {
        return $this['mustache_engine'];
    }
}