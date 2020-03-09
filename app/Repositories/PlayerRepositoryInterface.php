<?php

namespace App\Repositories;

interface PlayerRepositoryInterface
{
	public function all();

	public function create(array $data);

	public function findById($id);
}