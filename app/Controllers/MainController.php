<?php

class MainController
{
	public function index()
	{
		$tasks = Tasks::getAll();
		require 'app/Views/main.view.php';
	}

}

