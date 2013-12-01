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
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_injuries(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_player_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_player_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
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
