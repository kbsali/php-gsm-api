<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/hockey
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Hockey extends AbstractApi
{
    protected $section = 'hockey';

    /**
     * @link http://client.globalsportsmedia.com/documentation/hockey/functions/get_injuries
     * @param  int $id
     * @param  string $type (competition|player|match|team)
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_injuries($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get('/'.$this->section.'/get_injuries', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_match_extra
     * @param  int $id
     * @param  array $params array of optional params (lang, last_updated)
     * @return \SimpleXMLElement
     */
    public function get_match_extra($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
        );

        return $this->get('/'.$this->section.'/get_match_extra', $defaults, $params);
    }
}
