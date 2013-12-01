<?php

namespace GlobalSportsMedia\Api;

/**
 * @link   http://client.globalsportsmedia.com/documentation/soccer
 * @author Kevin Saliou <kevin at saliou dot name>
 */
class Soccer extends AbstractApi
{
    protected $section = 'soccer';

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_betting_statistics
     * @param  int $id
     * @param  string $type (competition|season|team)
     * @param  string $market (result|double_chance|correct_score|margin|result|half_time_full_time)
     * @param  array  $params array of option params (lang, last_n_seasons, last_n_matches)
     * @return \SimpleXMLElement
     */
    public function get_betting_statistics($id, $type, $market, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'market' => $market,
            'lang' => null,
            'last_n_seasons' => null,
            'last_n_matches' => null,
        );

        return $this->get('/soccer/get_betting_statistics', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_career
     * @param  int $id
     * @param  string $type (player|team)
     * @param  array $params array of optional params (detailed, lang, active, range)
     * @return \SimpleXMLElement
     */
    public function get_career($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'detailed' => null, // yes|no
            'lang' => null,
            'active' => null, // yes|no
            'range' => null, // league|cups|national|all
        );

        return $this->get('/soccer/get_career', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_hashtags
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_hashtags(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_head_2_head_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_head_2_head_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_injuries
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_injuries(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_matches_live_updates
     * @param  array $params array of optional params (last_updated)
     * @return \SimpleXMLElement
     */
    public function get_matches_live_updates(array $params = array())
    {
        $defaults = array(
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
        );

        return $this->get('/soccer/get_matches_live_updates', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_commentary
     * @param  int $id
     * @param  array $params array of optional params (lang, source)
     * @return \SimpleXMLElement
     */
    public function get_match_commentary($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'lang' => null,
            'source' => null, // manual|auto|both|favor_ltc
            // 'team_id' => null,
        );

        return $this->get('/soccer/get_match_commentary', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_editorials
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_editorials(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_extra
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_extra(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_formations
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_formations(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_statistics_v2
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_statistics_v2(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_players_abroad
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_players_abroad(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_player_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_player_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_rankings
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rankings(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_rounds
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_rounds(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_runningball_matches
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_runningball_matches(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_seasons
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_seasons(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_squads
     * @param  int $id
     * @param  string $type (area|season|round|group|team)
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_squads($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'active' => null, // yes|no
            'contracts' => null,
            'detailed' => null, // yes|no
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
            'statistics' => null, // yes|no
        );

        return $this->get('/soccer/get_squads', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_squads_changes
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_squads_changes(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_suspensions
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_suspensions(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_suspensions_warning
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_suspensions_warning(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_tables
     * @param  int $id
     * @param  string $type (season|round)
     * @param  array $params array of optional params (tabletype, lang)
     * @return \SimpleXMLElement
     */
    public function get_tables($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
            'tabletype' => null, // total|home|away|form-total|form-home|form-away|overunder
        );

        return $this->get('/soccer/get_tables', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_tables_cumulative
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tables_cumulative(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_tables_live
     * @param  int $id
     * @param  string $type (season|round)
     * @param  array $params array of optional params (tabletype, lang)
     * @return \SimpleXMLElement
     */
    public function get_tables_live($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
            'tabletype' => null, // total
        );

        return $this->get('/soccer/get_tables_live', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_teams
     * @param  int $id
     * @param  string $type (area|season|round|group|team)
     * @param  array $params array of optional params (detailed, lang)
     * @return \SimpleXMLElement
     */
    public function get_teams($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'detailed' => null, // yes|no
            'lang' => null,
        );

        return $this->get('/soccer/get_teams', $defaults, $params);
    }
    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_team_statistics
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_team_statistics(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_transfers
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_transfers(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_trophies
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_trophies(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }

    /**
     * Returns all areas, which can be 'world', continents and countries.
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_venues
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_venues(array $params = array())
    {
        throw new \Exception('Not implemented yet');
    }
}
