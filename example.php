<?php

require_once 'vendor/autoload.php';

$client = new GlobalSportsMedia\Client('http://webpull.globalsportsmedia.com', 'demo', 'demo');

try {
    $xml = $client->api('soccer')->get_betting_statistics(8055, 'season', 'result');
    $xml = $client->api('soccer')->get_deleted(array('type' => 'person'));
    $xml = $client->api('soccer')->get_career(961, 'team');
    $xml = $client->api('soccer')->get_matches(8318, 'season');
    $xml = $client->api('soccer')->get_matches_live(array(
        'now_playing' => 'no',
        'minutes' => 'yes',
        'type' => 'match',
        'id' => 1445860,
        'date' => '2013-06-11',
    ));
    $xml = $client->api('soccer')->get_matches_live_updates(array(
        'last_updated' => '2012-03-23 13:25:00 ',
    ));
    $xml = $client->api('soccer')->get_match_commentary(1286864, array(
        'source' => 'auto'
    ));
    $xml = $client->api('soccer')->get_squads(663, 'team');
    $xml = $client->api('soccer')->get_tables(8055, 'season');
    $xml = $client->api('soccer')->get_tables_live(4943, 'season');
    $xml = $client->api('soccer')->get_teams(661, 'team', array('detailed' => 'yes'));
    $xml = $client->api('soccer')->get_referees('round', 13557);

    $xml = $client->api('baseball')->get_rounds(79);
    $xml = $client->api('baseball')->get_trophies(5, 'competition');
    $xml = $client->api('baseball')->get_venues(1, 'area');

    $xml = $client->api('basketball')->get_player_statistics(408, 'season', array('team_id' => 178));

    $xml = $client->api('cricket')->get_seasons(array('authorized' => 'yes', 'active' => 'yes'));
    $xml = $client->api('cricket')->get_squads(113, 'season', array('detailed' => 'yes'));

    $xml = $client->api('handball')->get_tables(114, 'season', array('tabletype' => 'form-home'));

    $xml = $client->api('am_football')->get_groups(19);
    $xml = $client->api('am_football')->get_head2head(25, 26);

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