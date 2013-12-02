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
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_injuries($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_rankings
     * @param  string $type (ap_top_25|bcs|usa_today_coach)
     * @param  array $params array of optional params (year, date, lang)
     * @return \SimpleXMLElement
     */
    public function get_rankings($type, array $params = array())
    {
        $defaults = array(
            'type' => $type,
            'year' => null,
            'date' => null,
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/american_football/functions/get_weather
     * @param  int $id
     * @param  string $type (match)
     * @param  array $params array of optional params (year, date, lang)
     * @return \SimpleXMLElement
     */
    public function get_weather($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }
}
