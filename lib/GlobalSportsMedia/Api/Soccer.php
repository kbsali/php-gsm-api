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

        return $this->get('/'.$this->section.'/get_betting_statistics', $defaults, $params);
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

        return $this->get('/'.$this->section.'/get_career', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_hashtags
     * @param  int $id
     * @param  string $type (competition|team|people|match)
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_hashtags($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_hashtags', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_head_2_head_statistics
     * @param  int $team_1_id
     * @param  int $team_2_id
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_head_2_head_statistics($team_1_id, $team_2_id, array $params = array())
    {
        $defaults = array(
            'team_1_id' => $team_1_id,
            'team_2_id' => $team_2_id,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_head_2_head_statistics', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_injuries
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

        return $this->get('/'.$this->section.'/get_injuries', $defaults, $params);
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

        return $this->get('/'.$this->section.'/get_matches_live_updates', $defaults, $params);
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

        return $this->get('/'.$this->section.'/get_match_commentary', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_editorials
     * @param  int $id
     * @param  array $params array of optional params (text)
     * @return \SimpleXMLElement
     */
    public function get_match_editorials($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'text' => null, // preview|review|both
        );

        return $this->get('/'.$this->section.'/get_match_editorials', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/{$this->section}/functions/get_match_extra
     * @param  int $id
     * @param  array $params array of optional params (lang, last_updated)
     * @return \SimpleXMLElement
     */
    public function get_match_extra($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
        );

        return $this->get('/'.$this->section.'/get_match_extra', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_formations
     * @param  int $id
     * @param  array $params array of optional params (lang, last_updated)
     * @return \SimpleXMLElement
     */
    public function get_match_formations($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'lang' => null,
            'last_updated' => null, // yyyy-mm-dd hh:mm:ss
        );

        return $this->get('/'.$this->section.'/get_match_formations', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_statistics
     * @param  int $id
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_statistics($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
        );

        return $this->get('/'.$this->section.'/get_match_statistics', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_match_statistics_v2
     * @param  int $id
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_match_statistics_v2($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => 'match',
        );

        return $this->get('/'.$this->section.'/get_match_statistics_v2', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_players_abroad
     * @param  int $id
     * @param  string $type
     * @param  string $date YYYY-MM-DD
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_players_abroad($id, $type = 'area', $date, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'date' => $date,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_players_abroad', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_rankings
     * @param  string $type (fifa)
     * @param  array $params array of optional params (year, month, lang)
     * @return \SimpleXMLElement
     */
    public function get_rankings($type, array $params = array())
    {
        $defaults = array(
            'type' => $type,
            'year' => null,
            'month' => null,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_rankings', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_runningball_matches
     * @param  array $params array of optional params (type, lang)
     * @return \SimpleXMLElement
     */
    public function get_runningball_matches(array $params = array())
    {
        $defaults = array(
            'id' => null,
            'type' => null, // match
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_runningball_matches', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_squads_changes
     * @param  string $last_updated yyyy-mm-dd
     * @param  array $params array of optional params (lang)
     * @return \SimpleXMLElement
     */
    public function get_squads_changes($last_updated, array $params = array())
    {
        $defaults = array(
            'last_updated' => $last_updated,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_squads_changes', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_suspensions
     * @param  int $id
     * @param  array $params array of optional params (type, lang)
     * @return \SimpleXMLElement
     */
    public function get_suspensions($id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => null, // match|player|season
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_suspensions', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_suspensions_warning
     * @param  int $id
     * @param  string $type (match)
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_suspensions_warning($id, $type = 'match', array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_suspensions_warning', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_tables_cumulative
     * @param  int $id
     * @param  string $type (season)
     * @param  array $params array of optional params
     * @return \SimpleXMLElement
     */
    public function get_tables_cumulative($id, $type = 'season', array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'lang' => null,
        );

        return $this->get('/'.$this->section.'/get_tables_cumulative', $defaults, $params);
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

        return $this->get('/'.$this->section.'/get_tables_live', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_team_statistics
     * @param  int $team_id
     * @param  array $params array of optional params (form, season_id)
     * @return \SimpleXMLElement
     */
    public function get_team_statistics($team_id, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'form' => null,
            'season_id' => null, // total
        );

        return $this->get('/'.$this->section.'/get_team_statistics', $defaults, $params);
    }

    /**
     * @link http://client.globalsportsmedia.com/documentation/soccer/functions/get_transfers
     * @param  int $id
     * @param  string $type (area|competition|person|team)
     * @param  array $params array of optional params (start_date, end_date, updated_since, proceeded, lang, limit, offset)
     * @return \SimpleXMLElement
     */
    public function get_transfers($id, $type, array $params = array())
    {
        $defaults = array(
            'id' => $id,
            'type' => $type,
            'start_date' => null, // yyyy-mm-dd hh:mm:ss
            'end_date' => null, // yyyy-mm-dd hh:mm:ss
            'updated_since' => null, // yyyy-mm-dd hh:mm:ss
            'lang' => null,
            'limit' => null,
            'offset' => null,
        );

        return $this->get('/'.$this->section.'/get_transfers', $defaults, $params);
    }
}
