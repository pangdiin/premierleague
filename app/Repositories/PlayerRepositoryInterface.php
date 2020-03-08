<?php

namespace App\Repositories;

interface PlayerRepositoryInterface
{
	public function all();

	public function findById($id);
}