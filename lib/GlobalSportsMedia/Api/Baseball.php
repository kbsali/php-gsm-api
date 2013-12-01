<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/baseball
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Baseball extends AbstractApi
{
    protected $section = 'baseball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/baseball/functions/get_injuries
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
     * @link http://client.globalsportsmedia.com/documentation/baseball/functions/get_weather
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_weather(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
