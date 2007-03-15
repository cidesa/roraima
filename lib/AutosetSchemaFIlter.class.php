<?php

class AutosetSchemaFIlter extends sfFilter
{
  public function execute($filterChain) 
  {
  	$user = $this->getContext()->getUser();
  	$esquema = $user->getParameter('schema');
  	if (isset($esquema))
  	{
		$db = sfContext::getInstance()->getDatabaseManager()->getDatabase('propel');
		$db->setConnectionParameter('schema',$esquema);
  	}

	$filterChain->execute();
  }
}
