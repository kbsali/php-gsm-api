<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/rugby
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Rugby extends AbstractApi
{
    protected $section = 'rugby';

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_player_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_player_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_seasons
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_seasons(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_squads
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_squads(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_tables
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tables(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_teams
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_teams(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_trophies
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_trophies(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/rugby/functions/get_venues
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_venues(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
