<?php

/**
 * DateMenorEjercicio: valida que la fecha dada sea menor a la fecha de 
 * fin de período contable
 *
 * @package    Roraima
 * @subpackage validators
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class DateMenorEjercicio extends sfValidator
{
  public function execute(&$value, &$error)
  {
	$dateFormat = new sfDateFormat('es_VE');
  	$fec = $dateFormat->format($value, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(ContabaPeer::CODEMP,'001');
    $c->add(ContabaPeer::FECINI,$fec,Criteria::LESS_EQUAL);
    $c->add(ContabaPeer::FECCIE,$fec,Criteria::GREATER_EQUAL);
    $object = ContabaPeer::doSelectOne($c);

    if (!$object)
    {
  	   $error = $this->getParameter('unique_error');
    }else{
  	   return true;
    }

    return false;
  }

  /**
   * Initialize this validator.
   *
   * @param sfContext The current application context.
   * @param array   An associative array of initialization parameters.
   *
   * @return bool true, if initialization completes successfully, otherwise false.
   */
  public function initialize($context, $parameters = null)
  {
    // initialize parent
    parent::initialize($context);

    // set defaults
    $this->setParameter('unique_error', 'Uniqueness error');

    $this->getParameterHolder()->add($parameters);

    return true;
  }
}
