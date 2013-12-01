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
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_weather
     * @param  int $id
     * @param  string $type (match)
     * @return \SimpleXMLElement
     */
    public function get_weather($id, $type)
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get('/'.$this->section.'/get_weather', $defaults, $params);
    }
}
