<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/cricket
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Cricket extends AbstractApi
{
    protected $section = 'cricket';

    /**
     * @link http://client.globalsportsmedia.com/documentation/cricket/functions/get_player_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_player_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/cricket/functions/get_venues
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_venues(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
