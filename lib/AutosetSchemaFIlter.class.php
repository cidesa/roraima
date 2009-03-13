<?php

class AutosetSchemaFIlter extends sfFilter
{
  public function execute($filterChain)
  {
    $user = $this->getContext()->getUser();

    $esquema = $user->getAttribute('schema');
    //$esquema = $user->getParameter('schema');
    //print $esquema.'dddd';
    if (isset($esquema))
    {
      $db = sfContext::getInstance()->getDatabaseManager()->getDatabase('propel');
      $db->setConnectionParameter('schema',$esquema);
    }

    $this->getContext()->getUser()->setCulture('es_VE');

    // Para hacer pruebas
    if(SF_ENVIRONMENT=='test'){
      $user->setAuthenticated(true);
      $user->addCredential('admin');
    }

    $filterChain->execute();
  }
}
