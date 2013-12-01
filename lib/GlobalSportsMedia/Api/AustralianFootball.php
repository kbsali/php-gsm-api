<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/australian_football
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class AustralianFootball extends AbstractApi
{
    protected $section = 'australianfootball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/australian_football/functions/get_venues
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_venues(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
