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
}

