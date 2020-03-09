<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Jobs\ProcessPlayers;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProcessPlayerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function get_from_data_provider()
    {
        $this->withoutExceptionHandling();

        Bus::fake();
        
        Bus::assertDispatched(ProcessPlayers::class);
    }
}