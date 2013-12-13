<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/golf
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Golf extends AbstractApi
{
    protected $section = 'golf';

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_holebyhole
     * @param  int               $id
     * @param  string            $type   (round)
     * @param  array             $params array of optional params (last_updated, lang)
     * @return \SimpleXMLElement
     */
    public function get_holebyhole($id, $type = 'round', array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_leaderboard
     * @param  int               $id
     * @param  string            $type   (season)
     * @param  array             $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_leaderboard($id, $type = 'season', array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_people
     * @param  int               $id
     * @param  string            $type   (people|round|season)
     * @param  array             $params array of optional params (lang, detailed)
     * @return \SimpleXMLElement
     */
    public function get_people($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
            'detailed' => null, // yes|no
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_rankings
     * @param  string            $type   (owgr|LPGA|PGA_money|EPGA_money|FedEx)
     * @param  array             $params array of optional params (date, lang)
     * @return \SimpleXMLElement
     */
    public function get_rankings($type, array $params = array())
    {
        $defaults = array(
            'type' => $type,
            'date' => null,
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_tours
     * @param  array             $params array of optional params (id, type, lang)
     * @return \SimpleXMLElement
     */
    public function get_tours(array $params = array())
    {
        $defaults = array(
            'id' => null,
            'type' => 'tour',
            'lang' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }
}
