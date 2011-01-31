<?php

/**
 * UniqueValidator3: Modificacion del PropelUniqueValidator
 *
 * @package    Roraima
 * @subpackage validators
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class UniqueValidator3 extends sfValidator
{
  public function execute(&$value, &$error)
  {
    $className  = ucfirst(strtolower($this->getParameter('class'))).'Peer';    
    $columnName = call_user_func(array($className, 'translateFieldName'), $this->getParameter('column'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    $columnName2 = call_user_func(array($className, 'translateFieldName'), $this->getParameter('column2'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    $columnName3 = call_user_func(array($className, 'translateFieldName'), $this->getParameter('column3'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
	$get2=$this->getParameterHolder()->get('value2');
    $value2 = $this->getContext()->getRequest()->getParameter($get2);
	$get3=$this->getParameterHolder()->get('value3');
    $value3 = $this->getContext()->getRequest()->getParameter($get3);
    
    $c = new Criteria();
    $c->add($columnName, $value);
    $c->add($columnName2, $value2);
    $c->add($columnName3, $value3);
    $object = call_user_func(array($className, 'doSelectOne'),$c);
   
	if($object) 
	{
	  $tableMap = call_user_func(array($className, 'getTableMap'));
      foreach ($tableMap->getColumns() as $column)
      {
        if (!$column->isPrimaryKey())
        {
          continue;
        }

        $method = 'get'.$column->getPhpName();
        $primaryKey = call_user_func(array($className, 'translateFieldName'), $column->getPhpName(), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_FIELDNAME);
        if ($object->$method() != $this->getContext()->getRequest()->getParameter($primaryKey))
        {
          $error = $this->getParameter('unique_error');

          return false;
        }
      }
	}
	 
    /*if (count($object)>0)
    {    
  	   $error = $this->getParameter('unique_error');
    }else{
  	   return true;
    }*/

    return true;
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

    // check parameters
    if (!$this->getParameter('class'))
    {
      throw new sfValidatorException('The "class" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('column'))
    {
      throw new sfValidatorException('The "column" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('column2'))
    {
      throw new sfValidatorException('The "column" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('column3'))
    {
      throw new sfValidatorException('The "column" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }
    
    return true;
  }
}
