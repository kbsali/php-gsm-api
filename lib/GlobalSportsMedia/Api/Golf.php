<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/golf
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Golf extends AbstractApi
{
    protected $section = 'golf';

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

    public function get_matches_live()
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

    public function get_tables()
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
     * @link http://client.globalsportsmedia.com/documentation/gold/functions/get_holebyhole
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_holebyhole(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/gold/functions/get_leaderboard
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_leaderboard(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/gold/functions/get_people
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_people(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/golf/functions/get_rankings
     * @param  string $type (owgr|LPGA|PGA_money|EPGA_money|FedEx)
     * @param  array $params array of optional params (year, date, lang)
     * @return \SimpleXMLElement
     */
    public function get_rankings($type, array $params = array())
    {
        $defaults = array(
            'type' => $type,
            'date' => null,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_rankings', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/gold/functions/get_tours
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tours(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
