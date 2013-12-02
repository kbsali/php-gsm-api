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

    public function get_referees()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_squads()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_teams()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_trophies()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_venues()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_player_statistics()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_doubles
     * @param  int $id
     * @param  string $type (double)
     * @param  array $params array of optional params (lang, detailed)
     * @return \SimpleXMLElement
     */
    public function get_doubles($id, $type, array $params = array())
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
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_players
     * @param  int $id
     * @param  string $type (area|national_team|double|player)
     * @param  array $params array of optional params (gender, lang, detailed)
     * @return \SimpleXMLElement
     */
    public function get_players($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'gender' => null, // male|female
            'lang' => null,
            'detailed' => null, // yes|no
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_rankings
     * @param  int $tour_id
     * @param  string $type (single|double|mixed)
     * @param  array $params array of optional params (year, weeknumber, lang, doubles_team)
     * @return \SimpleXMLElement
     */
    public function get_rankings($tour_id, $type, array $params = array())
    {
        $defaults = array(
            'tour_id' => $tour_id,
            'type' => $type,
            'year' => null,
            'weeknumber' => null,
            'lang' => null,
            'doubles_team' => null,
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_season_competitor
     * @param  int $season_id
     * @param  array $params array of optional params (lang, detailed)
     * @return \SimpleXMLElement
     */
    public function get_season_competitor($season_id, array $params = array())
    {
        $defaults = array(
            'season_id' => $season_id,
            'lang' => null,
            'detailed' => null, // yes|no
        );

        return $this->get(__METHOD__, $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/tennis/functions/get_tours
     * @param  array $params array of optional params (id, type, lang)
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
