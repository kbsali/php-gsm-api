<?php

namespace GlobalSportsMedia\Api;

/**
 * Soccer details
 *
 * @link   http://client.globalsportsmedia.com/documentation/soccer
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Soccer extends AbstractApi
{
    /**
     * Returns all areas, which can be 'world', continents and countries.
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_areas
     * @param  array $params array of GET params
     * @return array
     */
    public function get_areas(array $params = array())
    {
        $defaults = array(
            'area_id' => null,
            'lang' => null,
        );
        $params = array_filter(
            array_merge($defaults, $params),
            array($this, 'isNotNull')
        );

        return $this->get('/soccer/get_areas?' . http_build_query($params));
    }
}
