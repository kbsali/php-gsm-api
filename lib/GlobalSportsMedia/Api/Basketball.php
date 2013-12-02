<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/basketball
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Basketball extends AbstractApi
{
    protected $section = 'basketball';

    /**
     * @link http://client.globalsportsmedia.com/documentation/basketball/functions/get_injuries
     * @param  int               $id
     * @param  string            $type   (competition|player|match|team)
     * @param  array             $params array of optional params
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
     * @link http://client.globalsportsmedia.com/documentation/basketball/functions/get_rankings
     * @param  string            $type   (ap_top_25|usa_today_coach)
     * @param  array             $params array of optional params (year, date, lang)
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
}
