<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Player;

class FetchPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:players {url=https://fantasy.premierleague.com/api/bootstrap-static/}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data provider';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');

        $string = file_get_contents($url);

        $checkIfJson = $this->isJson($string);

        /**
         * if data provider returns json
         */
        if ($checkIfJson) { //json

            $data = json_decode($string);

            $this->handlePlayers($data);

        } else { // xml

            $xml = simplexml_load_file($url);

            $json = json_encode($xml);

            $data = json_decode($json, TRUE);
            
            $this->handlePlayers($data);

        }
    }

    private function handlePlayers($data)
    {
        //store minimum of 100 records
        if (count($data->elements) >= 100) {
            //loop through players and store in database
            collect($data->elements)->each(function($player) {
                $this->create($player);
            });
        }
    }

    /**
     * Store players in db
     */
    private function create($data)
    {
        $player = new Player;
        $player->first_name     = $data->first_name;
        $player->second_name    = $data->second_name;
        $player->form           = $data->form;
        $player->total_points   = $data->total_points;
        $player->influence      = $data->influence;
        $player->creativity     = $data->creativity;
        $player->threat         = $data->threat;
        $player->ict_index      = $data->ict_index;
        $player->now_cost       = $data->now_cost;
        $player->points_per_game = $data->points_per_game;
        $player->status         = $data->status;
        $player->team           = $data->team;
        $player->team_code      = $data->team_code;
        $player->save();
    }

    /**
     * Check if string is json
     */
    private function isJson($string)
    {
        $decoded = json_decode($string);

        if ( !is_object($decoded) && !is_array($decoded) ) {
            return false;
        }
        
        return (json_last_error() == JSON_ERROR_NONE);
    }
    
}
