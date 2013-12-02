<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/motorsports
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Motorsports extends AbstractApi
{
    protected $section = 'motorsports';

    /**
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_circuits
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_circuits(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    public function get_groups()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_head2head()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_matches()
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

    public function get_rounds()
    {
        throw new \Exception(__METHOD__.' - this method does not exist');
    }

    public function get_squads()
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
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_sessions
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_sessions(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_tables
     * @param  int $id
     * @param  string $type (championship)
     * @param  int $year
     * @param  array $params array of optional params (tabletype, lang)
     * @return \SimpleXMLElement
     */
    public function get_tables($id, $type, $year, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'year' => $year,
            'tabletype' => null, // driver|team|race
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_tables', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_teammembers
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_teammembers(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/motorsports/functions/get_teams
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_teams(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
