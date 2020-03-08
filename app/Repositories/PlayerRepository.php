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

	public function findById($id)
	{
		$player = Player::where('id', $id)->first();

		if ($player) {
			return $player;
		}

		return ['error' => "Player does not exist."];
	}

}