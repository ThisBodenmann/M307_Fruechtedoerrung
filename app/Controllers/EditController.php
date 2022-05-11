<?php

class EditController
{
	public function index()
	{
		Tasks::onLoad();
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

