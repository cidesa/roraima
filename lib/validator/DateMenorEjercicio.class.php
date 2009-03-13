<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfPropelUniqueValidator validates that the uniqueness of a column.
 * This validator only works for single column primary key.
 *
 * <b>Required parameters:</b>
 *
 * # <b>class</b>        - [none]               - Propel class name.
 * # <b>column</b>       - [none]               - Propel column name.
 *
 * <b>Optional parameters:</b>
 *
 * # <b>unique_error</b> - [Uniqueness error]   - An error message to use when
 *                                                the value for this column already
 *                                                exists in the database.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Fédéric Coelho <frederic.coelho@symfony-project.com>
 * @author     Miki <mjmiras@gmail.com>
 * @version    SVN: $Id: sfPropelUniqueValidator.class.php 2995 2006-12-09 18:01:32Z fabien $
 * @version    SVN: $Id: sfPropelUniqueValidator.class.php 2007-06-06 11:03:32Z Jesus$*
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
