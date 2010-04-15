<?php
/**
 * AutosetSchemaFIlter: Clase para cambiar de forma dinámica el schema sobre 
 * el cual se esta trabajando actualmente.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
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
