<?php

namespace GlobalSportsMedia\Api;

use GlobalSportsMedia\Client;

/**
 * Abstract class for Api classes
 * @author Kevin Saliou <kevin at saliou dot name>
 */
abstract class AbstractApi
{
    /**
     * The client
     *
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $section;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Constructs the full url request and forwards it to the Client
     * @param  string $path
     * @param  array $defaults
     * @param  array $params
     * @return \SimpleXmlElement
     */
    protected function get($path, array $defaults = null, array $params = null)
    {
        if(null === $defaults || null === $params) {
            return $this->client->get($path);
        }

        $params = array_filter(
            array_merge($defaults, $params),
            array($this, 'isNotNull')
        );

        return $this->client->get($path . '?' . http_build_query($params));
    }

    /**
     * Checks if the variable passed is not null
     *
     * @param mixed $var Variable to be checked
     *
     * @return bool
     */
    protected function isNotNull($var)
    {
        return !is_null($var);
    }

    /**
     * Retrieves all the elements of a given endpoint (even if the
     * total number of elements is greater than 100)
     *
     * @param  string $endpoint API end point
     * @param  array  $params   optional parameters to be passed to the api (offset, limit, ...)
     * @return array  elements found
     */
    protected function retrieveAll($endpoint, array $params = array())
    {
        if (empty($params)) {
            return $this->get($endpoint);
        }
        $defaults = array();
        $params = array_filter(
            array_merge($defaults, $params),
            array($this, 'isNotNull')
        );

        $ret = $this->get($endpoint . '?' . http_build_query($params));

        return $ret;
    }

    /**
     * Returns all areas, which can be 'world', continents and countries.
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_areas
     * @param  array $params array of optional params (area_id, lang)
     * @return \SimpleXMLElement
     */
    public function get_areas(array $params = array())
    {
        $defaults = array(
            'area_id' => null,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_areas', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_competitions
     * @param  array $params array of optional params (area_id, lang, authorized)
     * @return \SimpleXMLElement
     */
    public function get_competitions(array $params = array())
    {
        $defaults = array(
            'area_id' => null,
            'lang' => null,
            'authorized' => null, // yes|no
        );

        return $this->get('/'.$this->section.'/get_competitions', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_deleted
     * @param  array $params array of optional params (type, start_date)
     * @return \SimpleXMLElement
     */
    public function get_deleted(array $params = array())
    {
        $defaults = array(
            'type' => null, // event|match|group|round|season|competition|area|person|team
            'start_date' => null,
        );

        return $this->get('/'.$this->section.'/get_deleted', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_groups
     * @param  int $round_id
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_groups($round_id, array $params = array())
    {
        $defaults = array(
            'round_id' => $round_id,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_groups', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_head2head
     * @param  string $team_A_id
     * @param  string $team_B_id
     * @param  array $params array of optional params (competition_id, start_date, end_date, lang)
     * @return \SimpleXMLElement
     */
    public function get_head2head($team_A_id, $team_B_id, array $params = array())
    {
        $defaults = array(
            'team_A_id' => $team_A_id,
            'team_B_id' => $team_B_id,
            'competition_id' => null,
            'start_date' => null,
            'end_date' => null,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_head2head', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_matches
     * @param  int $id
     * @param  string $type (area|season|round|group|match|team|player)
     * @param  array $params array of optional params (detailed, start_date, end_date, lang, last_updated, limit, played)
     * @return \SimpleXMLElement
     */
    public function get_matches($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'detailed' => null, // yes|no
            'start_date' => null, // yyyy-mm-dd hh:mm:ss
            'end_date' => null, // yyyy-mm-dd hh:mm:ss
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
            'limit' => null,
            'played' => null,
        );

        return $this->get('/'.$this->section.'/get_matches', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_matches_live
     * @param  array $params array of optional params (now_playing, date, lang, detailed, id, type, minutes [soccer], statistics [basketball])
     * @return \SimpleXMLElement
     */
    public function get_matches_live(array $params = array())
    {
        $defaults = array(
            'now_playing' => null, // yes|no
            'date' => null, // yyyy-mm-dd
            'lang' => null,
            'detailed' => null, // yes|no
            'id' => null,
            'type' => null, // area|season
        );

        return $this->get('/'.$this->section.'/get_matches_live', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_referees
     * @param  string $type (season|round|match_id|referee)
     * @param  int $id
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_referees($type, $id, array $params = array())
    {
        $defaults = array(
            'type' => $type, // season|round|match_id|referee
            'id' => $id,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_referees', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_rounds
     * @param  int $season_id
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_rounds($season_id, $id, array $params = array())
    {
        $defaults = array(
            'season_id' => $season_id,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_rounds', $defaults, $params);
    }
}
