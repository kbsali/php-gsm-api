<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/american_football
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class AmericanFootball extends AbstractApi
{
    protected $section = 'americanfootball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_injuries
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
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_rankings
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rankings(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_weather
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_weather(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
