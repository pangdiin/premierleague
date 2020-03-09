<?php

namespace App\Repositories;

use App\Player;

class PlayerRepository implements PlayerRepositoryInterface
{
	public function all()
	{
		$players = Player::get()
				->map(function($query) {
					return [
						'id' 		=> $query->id,
						'full_name' => $query->first_name . ' ' . $query->second_name,
					];
				});

		return $players;
	}

	public function create(array $data)
	{
		$player = Player::create([
            'first_name'    => $data['first_name'],
            'second_name'   => $data['second_name'],
            'form'          => $data['form'],
            'total_points'  => $data['total_points'],
            'influence'     => $data['influence'],
            'creativity'    => $data['creativity'],
            'threat'        => $data['threat'],
            'ict_index'     => $data['ict_index'],
            'now_cost'      => $data['now_cost'],
            'points_per_game' => $data['points_per_game'],
            'status'        => $data['status'],
            'team'          => $data['team'],
            'team_code'     => $data['team_code'],
        ]);

		return $player;
	}

	public function findById($id)
	{
		$player = Player::where('id', $id)->first();

		if ($player) {
			return $player;
		}

		return ['error' => "Player does not exist."];
	}

}