<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/handball
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Handball extends AbstractApi
{
    protected $section = 'handball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/handball/functions/get_player_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_player_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/handball/functions/get_trophies
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_trophies(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/handball/functions/get_venues
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_venues(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
