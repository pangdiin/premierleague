<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Player;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function a_players_can_be_browse()
    {
        $response = $this->get('/api/players');

        $response->assertStatus(200);
    }


    /**
     * @test
     */
    public function a_player_can_be_created()
    {
        $this->withoutExceptionHandling();

        $data = [
            'first_name'    => 'first_name',
            'second_name'   => 'second_name',
            'form'          => 3,
            'total_points'  => 3,
            'influence'     => 3,
            'creativity'    => 3,
            'threat'        => 3,
            'ict_index'     => 3,
            'now_cost'      => 3,
            'points_per_game' => 3,
            'status'        => 'D',
            'team'          => 1,
            'team_code'     => 1,
        ];

        $response = $this->post('/api/players', $data);

        $response->assertOk();

        $this->assertCount(1, Player::all());
    }

    /**
     * @test
     */

    public function a_user_can_get_a_single_player_details()
    {
        $player = factory('App\Player')->create();

        $response = $this->get('/api/players/' . $player->id);

        $response->assertSee($player->first_name);

        $response->assertSee($player->second_name);

        $response->assertStatus(200);
    }
}
