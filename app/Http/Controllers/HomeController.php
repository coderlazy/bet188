<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->saveData();
        $all_match = \App\Match::orderBy('created_at', 'asc')->get();
        $html_odd_all_match = '';
        foreach ($all_match as $key => $m) {
            $match = $this->getMatchInfo($m->id);
            if ($key % 2 == 0) {
                $html_odd_all_match .= $this->generateMatch($match, 'up');
            } else {
                $html_odd_all_match .= $this->generateMatch($match, 'down');
            }
        }

        return view('homepage.match', compact('html_odd_all_match'));
    }

    public function generateMatch($match, $class_html) {
        $html_odd_match = '';
        $i = 0;
        $home = ['handicap' => '', 'ratio' => ''];
        $away = ['handicap' => '', 'ratio' => ''];
        $class = ['up', 'down'];
        foreach ($match as $key => $data) {
            if ($i == 0) {
                $home['handicap'] = $data->handicap;
                $home['ratio'] = $data->ratio;
                $i = 1;
            } else {
                $away['handicap'] = $data->handicap;
                $away['ratio'] = $data->ratio;
                $html_odd_match .= view('homepage.item_match', compact('class_html', 'data', 'home', 'away'))->render();
                $i = 0;
            }
        }
        return $html_odd_match;
    }

    public function saveData() {
        $k = json_decode(crawlData());
        $all_match = $k->mod->d[0]->c;
        dd($all_match);
//        dd(json_decode(file_get_contents('https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=1668957&culture=vi-VN&cb=1473575819426')));
        foreach ($all_match as $match) {
            $match_id = $this->createMatch($match->e[0]);
            if (isset($match->e[0]->o->ah)) {
                $this->setDataHandicap($match_id, $match->e[0]->o->ah);
            }
        }
    }

    public function getMatchInfo($id) {
        $match_infos = \App\Match::where('match.id', $id)
                ->join('ou', 'match.id', '=', 'ou.match_id')
                ->get();
        return $match_infos;
    }

    public function createMatch($match_info) {
        $match = \App\Match::where('match_id_api', '=', $match_info->k)->first();
        if (!$match) {
            $match = new \App\Match();
            $match->match_id_api = $match_info->k;
            $match->home = $match_info->i[0];
            $match->away = $match_info->i[1];
            $match->save();
        }
        return $match->id;
    }

    public function setDataHandicap($match_id, $data) {
        $i = 0;
        $group = 0;
        $home = '';
        $away = '';
        foreach ($data as $key => $value) {
            if ($key % 2 != 0) {
                switch ($i) {
                    case 0:
                        $home = new \App\OU();
                        $home->team = 'home';
                        $home->match_id = $match_id;
                        $home->handicap = $value;
                        $i += 1;
                        break;
                    case 1:
                        $away = new \App\OU();
                        $away->match_id = $match_id;
                        $away->team = 'away';
                        $away->handicap = $value;
                        $i += 1;
                        break;
                    case 2:
                        $home_ou = \App\OU::where('match_id', $match_id)
                                ->where('group', $group)
                                ->first();
                        if ($home_ou) {
                            $home_ou->handicap = $home->handicap;
                            $home_ou->ratio = $value;
                            $home_ou->save();
                        } else {
                            $home->group = $group;
                            $home->ratio = $value;
                            $home->save();
                            $group += 1;
                        }
                        $i += 1;
                        break;
                    case 3:
                        $away_ou = \App\OU::where('match_id', $match_id)
                                ->where('group', $group)
                                ->first();
                        if ($away_ou) {
                            $away_ou->handicap = $away->handicap;
                            $away_ou->ratio = $value;
                            $away_ou->save();
                        } else {
                            $away->ratio = $value;
                            $away->group = $group;
                            $away->save();
                            $group += 1;
                        }
                        $i = 0;
                        break;
                }
            }
        }
    }

    public function createRole() {
        $owner = new \App\Role();
        $owner->name = 'owner';
        $owner->display_name = 'Owner'; // optional
        $owner->description = 'User is the owner of a given project'; // optional
        $owner->save();
        $admin = new \App\Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
        $user = \App\User::where('id', '=', '1')->first();

        $user->attachRole($admin); // parameter can be an Role object, array, or id
        dd("done");
    }

}
