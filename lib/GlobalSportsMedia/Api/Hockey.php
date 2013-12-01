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
     * @return \SimpleXMLElement
     */
    public function get_injuries($id, $type)
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get('/'.$this->section.'/get_injuries', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/hockey/functions/get_match_extra
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_extra(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
