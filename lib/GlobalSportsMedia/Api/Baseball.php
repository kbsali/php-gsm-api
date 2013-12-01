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
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_injuries(array $params = array())
    {
        throw new \Exception('Not implemented yet');
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
