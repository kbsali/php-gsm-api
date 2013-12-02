<?php

require_once 'vendor/autoload.php';

$client = new GlobalSportsMedia\Client('http://webpull.globalsportsmedia.com', 'demo', 'demo');

try {
    $xml = $client->api('am_football')->get_groups(19);
    $xml = $client->api('am_football')->get_head2head(25, 26);

    $xml = $client->api('baseball')->get_rounds(79);
    $xml = $client->api('baseball')->get_trophies(5, 'competition');
    $xml = $client->api('baseball')->get_venues(1, 'area');
    $xml = $client->api('baseball')->get_weather(22688, 'match');

    $xml = $client->api('basketball')->get_injuries(191, 'team');
    $xml = $client->api('basketball')->get_player_statistics(408, 'season', array('team_id' => 178));
    $xml = $client->api('basketball')->get_rankings('ap_top_25');

    $xml = $client->api('cricket')->get_seasons(array('authorized' => 'yes', 'active' => 'yes'));
    $xml = $client->api('cricket')->get_squads(113, 'season', array('detailed' => 'yes'));

    $xml = $client->api('golf')->get_holebyhole(1294, 'round');
    $xml = $client->api('golf')->get_leaderboard(333, 'season');
    $xml = $client->api('golf')->get_people(138, 'person', array('detailed' => 'yes'));

    $xml = $client->api('handball')->get_tables(114, 'season', array('tabletype' => 'form-home'));

    $xml = $client->api('hockey')->get_match_extra(102880);

    $xml = $client->api('motorsports')->get_circuit(1, 'championship', array('detailed' => 'yes'));
    $xml = $client->api('motorsports')->get_sessions(3013, 'session', array('detailed' => 'yes'));
    $xml = $client->api('motorsports')->get_teammembers(3007, 'session', array('detailed' => 'yes'));

    $xml = $client->api('tennis')->get_doubles(31, 'double', array('detailed' => 'yes'));
    $xml = $client->api('tennis')->get_players(31, 'double', array('gender' => 'male'));
    $xml = $client->api('tennis')->get_season_competitor(1741);
    $xml = $client->api('tennis')->get_tours(array('type' => 'tour'));

    $xml = $client->api('soccer')->get_betting_statistics(8055, 'season', 'result');
    $xml = $client->api('soccer')->get_career(961, 'team');
    $xml = $client->api('soccer')->get_competitions();
    $xml = $client->api('soccer')->get_deleted(array('type' => 'person'));
    $xml = $client->api('soccer')->get_hashtags(964, 'team');
    $xml = $client->api('soccer')->get_match_commentary(1286864, array('source' => 'auto'));
    $xml = $client->api('soccer')->get_match_editorials(1286861, array('text' => 'both'));
    $xml = $client->api('soccer')->get_match_formations(1286869);
    $xml = $client->api('soccer')->get_matches(8318, 'season');
    $xml = $client->api('soccer')->get_matches_live(array('now_playing' => 'no', 'minutes' => 'yes', 'type' => 'match', 'id' => 1445860, 'date' => '2013-06-11'));
    $xml = $client->api('soccer')->get_matches_live_updates(array('last_updated' => '2012-03-23 13:25:00'));
    $xml = $client->api('soccer')->get_players_abroad(80, 'area', '2012-11-15');
    $xml = $client->api('soccer')->get_referees('round', 13557);
    $xml = $client->api('soccer')->get_runningball_matches();
    $xml = $client->api('soccer')->get_squads(663, 'team');
    $xml = $client->api('soccer')->get_squads_changes('2013-09-10');
    $xml = $client->api('soccer')->get_statistics(1286862);
    $xml = $client->api('soccer')->get_statistics_v2(1468351 );
    $xml = $client->api('soccer')->get_suspensions(1483412);
    $xml = $client->api('soccer')->get_suspensions_warning(1063217, 'match');
    $xml = $client->api('soccer')->get_tables(8055, 'season');
    $xml = $client->api('soccer')->get_tables_cumulative(7299, 'season', array('lang' => 'en'));
    $xml = $client->api('soccer')->get_tables_live(4943, 'season');
    $xml = $client->api('soccer')->get_team_statistics(6951, array('season_id' => 8055, 'form' => 'no'));
    $xml = $client->api('soccer')->get_teams(661, 'team', array('detailed' => 'yes'));
    $xml = $client->api('soccer')->get_transfers(8, 'competition', array('proceeded' => 'yes'));

    print_r($xml);die;



    $xml = $client->api('soccer')->get_competitions();
    $ret = array();
    foreach ($xml->competition as $competition) {
        $ret[(int) $competition['competition_id']] = array(
            'competition_id' => (int) $competition['competition_id'],
            'name' => (string) $competition['name'],
            'soccertype' => (string) $competition['soccertype'],
            'teamtype' => (string) $competition['teamtype'],
            'display_order' => (int) $competition['display_order'],
            'format' => (string) $competition['format'],
            'area_id' => (int) $competition['area_id'],
            'area_name' => (string) $competition['area_name'],
            'last_updated' => (string) $competition['last_updated'],
            'countrycode' => (string) $competition['countrycode'],
        );
    }
    print_r($ret);die;



    $xml = $client->api('soccer')->get_areas(array('area_id' => 7));
    $ret = array();
    foreach ($xml->area->area as $area) {
        $ret[(int) $area['area_id']] = array(
            'area_id' => (int) $area['area_id'],
            'countrycode' => (string) $area['countrycode'],
            'name' => (string) $area['name'],
        );
    }
    print_r($ret);die;



    $xml = $client->api('am_football')->get_areas(array('area_id' => 7));
    $ret = array();
    foreach ($xml->area->area as $area) {
        $ret[(int) $area['area_id']] = array(
            'area_id' => (int) $area['area_id'],
            'countrycode' => (string) $area['countrycode'],
            'name' => (string) $area['name'],
        );
    }
    print_r($ret);die;

} catch(\Exception $e) {
    die('ERROR : '.$e->getMessage());
}