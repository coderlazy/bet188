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
        //while (true) {
            $this->saveData();
          //  sleep(300);
        //}
		dd("ok");
        return view('homepage.home', compact('team1', 'team2', 'odd_1x2', 'cuoc_chap'));
    }
    public function generateMatch(){
        
    }
    public function saveData() {
        $k = json_decode(crawlData());
//        $all_match = $k->mod->d[0]->c;
        dd(json_decode(file_get_contents('https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=1647389&culture=vi-VN&cb=1473441849039')));
        dd($k->mod);
//        foreach ($all_match as $match) {
//            $match_id = $this->createMatch($match->e[0]);
//            $this->setDataHandicap($match_id, $match->e[0]->o->ah);
//        }
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
