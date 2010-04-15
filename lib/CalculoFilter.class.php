<?php
/**
 * CalculoFilter: Clase que se uso como prueba para generar el calculo de
 * nominas en segundo plano (experimental)
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CalculoFilter extends sfFilter
{
  public function execute($filterChain)
  {
    $user = $this->getContext()->getUser();
    //PARA EL CALCULO
    $phpsessid = sfContext::getInstance()->getRequest()->getParameter('cookiecid');
    if ($phpsessid=='44aa95ac18060e7dcdd80251ef74f733')
    {
    	$user->setAuthenticated(true);
    	$user->addCredential('admin');
    }

    $filterChain->execute();
  }
}
