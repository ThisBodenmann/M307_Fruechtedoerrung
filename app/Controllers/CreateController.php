<?php

class CreateController
{
	public function index()
	{
		require 'app/Views/create.view.php';
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			Tasks::create();
		}
	}
}

