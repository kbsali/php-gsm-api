<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/tennis
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Tennis extends AbstractApi
{
    protected $section = 'tennis';

    public function get_competitions()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_groups()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_head2head()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_doubles
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_doubles(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_matches
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_matches(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_matches_live
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_matches_live(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_players
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_players(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_rankings
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rankings(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_rounds
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rounds(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_seasons
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_seasons(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_season_competitor
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_season_competitor(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_tables
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tables(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_tours
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tours(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
