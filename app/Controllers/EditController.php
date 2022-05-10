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
}

