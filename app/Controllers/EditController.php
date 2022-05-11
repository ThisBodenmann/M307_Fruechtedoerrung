<?php

class EditController
{
	public function index()
	{
		require 'app/Views/edit.view.php';
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			Tasks::update();
		}
	}

	public function delete()
	{
		require 'app/Views/main.view.php';
		if($_SERVER['REQUEST_METHOD'] === 'GET') {
			Tasks::delete();
		}
	}
}

