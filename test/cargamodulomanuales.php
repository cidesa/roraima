<?php

	$b->get('/'.$modulo.'/index')->
	isStatusCode()->
	isRequestParameter('module', $modulo)->
	isRequestParameter('action', 'index');
	$b->get('/'.$modulo.'/index');
	if (!$b->Redirect())
	{
		$b->check('/'.$modulo.'/index','Creado con PHP + Symfony + Postgres.');
		$b->uncheck('/'.$modulo.'/index','Notice');
	}