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
//        $this->saveData();
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
        $class = ['up', 'down'];
        foreach ($match as $key => $data) {
            $html_odd_match .= view('homepage.item_match', compact('class_html', 'data'))->render();
        }
        return $html_odd_match;
    }

    public function saveData() {
        $k = json_decode(crawlData());
        $all_match = $k->mod->d[0]->c;
		dd($k->mod);
        foreach ($all_match as $match) {
			
            $match_id = $this->createMatch($match->e[0]);
			
            if (isset($match->e[0]->o->ah)) {
                $this->setDataHandicap($match_id, $match->e[0]->o->ah);
            }
        }
    }

    public function getAllMatchInPlay() {
        $all_match = \App\Match::join('ou', 'ou.match_id', '=', 'match.id')
                ->orderBy('ou.id', 'desc')
                ->distinct()
                ->get(['ou.id', 'match.match_id_api', 'ou.home_handicap', 'ou.home_ratio', 'ou.away_handicap', 'ou.away_ratio']);
        return json_encode($all_match);
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
        foreach ($data as $key => $value) {
            if ($key % 2 != 0) {
                switch ($i) {
                    case 0:
                        $ou = new \App\OU();
                        $ou->match_id = $match_id;
                        $ou->home_handicap = $value;
                        $i += 1;
                        break;
                    case 1:
                        $ou->away_handicap = $value;
                        $i += 1;
                        break;
                    case 2:
                        $ou->home_ratio = $value;
                        $i += 1;
                        break;
                    case 3:
                        $ou->away_ratio = $value;
                        $old_ou = \App\OU::where('match_id', $match_id)
                                ->where('group', $group)
                                ->first();
                        if ($old_ou) {
                            $old_ou->home_handicap = $ou->home_handicap;
                            $old_ou->away_handicap = $ou->away_handicap;
                            $old_ou->home_ratio = $ou->home_ratio;
                            $old_ou->away_ratio = $ou->away_ratio;
                            $old_ou->save();
                        } else {
                            $ou->group = $group;
                            $ou->save();
                        }
                        $group += 1;
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
