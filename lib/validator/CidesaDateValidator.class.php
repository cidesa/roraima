<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2004-2006 Sean Kerr.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfDateValidator verifies a parameter is of a date format.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Arthur Koziel <arthur@arthurkoziel.de>
 * @author     Nick Lane <nick.lane@internode.on.net>
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Sean Kerr <skerr@mojavi.org>
 * @version    SVN: $Id: sfDateValidator.class.php 3233 2007-01-11 21:01:08Z fabien $
 */
class sfDateValidator extends sfValidator
{
  /**
   * Execute this validator.
   *
   * @param mixed A file or parameter value/array
   * @param error An error message reference
   *
   * @return bool true, if this validator executes successfully, otherwise false
   */
  public function execute(&$value, &$error)
  {
    $className  = $this->getParameter('class').'Peer';
    $columnNamemin = call_user_func(array($className, 'translateFieldName'), $this->getParameter('columnmin'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    $columnNamemax = call_user_func(array($className, 'translateFieldName'), $this->getParameter('columnmax'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);

    $c = new Criteria();    
    $object = call_user_func(array($className, 'doSelectOne'), $c);
     
    // Validate the given date
    $value1 = $this->getValidDate($value);
    if (!$value1)
    {
      $error = $this->getParameterHolder()->get('date_error');

      return false;
    }
     if ($object) 
     {
     		$method = 'get'.$columnNamemin.'()';
    		// Is a min date specified?
    		$min = $object->$method();
    		if ($min)
    		{
      		$minTime = $this->getValidDate($min);
      		if ($value1 < $minTime)
      		{
        		$error = $this->getParameterHolder()->get('min_error');

        		return false;
      	}
    	}
    }
    if ($object) 
    {
	    // Is a max date specified?
	   $method = 'get'.$columnNamemax.'()';
    	$max = $object->$method();
    	if ($max)
    	{
      	$maxTime = $this->getValidDate($max);
      	if ($value1 > $maxTime)
      	{
        	$error = $this->getParameterHolder()->get('max_error');

        	return false;
      	}
    	}
    }

    // Is there a compare to do?
    $compareDate = $this->getParameterHolder()->get('compare');
    if ($compareDate)
    {
      // Is the value in compare a date?
      $timevalue = $this->getValidDate($compareDate);
      if ($timevalue)
      {
        $value2 = $timevalue;
      }
      else
      {
        // Assume that it is another form field
        $compareValue = $this->getContext()->getRequest()->getParameter($compareDate);
        $value2 = $this->getValidDate($compareValue);
        if (!$value2)
        {
          $error = $this->getParameterHolder()->get('compare_error');

          return false;
        }
      }

      $operator = $this->getParameterHolder()->get('operator');

      // If the check date is valid, compare it. Otherwise ignore the comparison
      if ($value2)
      {
        $valid = false;
        switch ($operator)
        {
          case '>':
            $valid = $value1 >  $value2;
            break;
          case '>=':
            $valid = $value1 >= $value2;
            break;
          case '==':
            $valid = $value1 == $value2;
            break;          
          case '<=':
            $valid = $value1 <= $value2;
            break;
          case '<':
            $valid = $value1 <  $value2;
            break;
          case '!=':
            $valid = $value1 != $value2;
            break;
        }

        if (!$valid)
        {
          $error = $this->getParameter('compare_error');

          return false;
        }
      }
    }

    return true;
  }

  /**
   * Converts the given date into a Unix timestamp.
   * 
   * Returns null if the date is invalid
   * 
   * @param $value    Date to convert
   * @param $culture  Language culture to use
   */
  protected function getValidDate($value)
  {
    $result = strtotime($value);

    if ($result == -1 || $result === null)
    {
      return null;
    }

    return $result;
  }

  /**
   * Initializes the validator.
   *
   * @param sfContext The current application context
   * @param array   An associative array of initialization parameters
   *
   * @return bool true, if initialization completes successfully, otherwise false
   */
  public function initialize($context, $parameters = null)
  {
    // Initialize parent
    parent::initialize($context, $parameters);

    // Set defaults
    $this->getParameterHolder()->set('date_error', 'Invalid date');
    $this->getParameterHolder()->set('compare_error', 'Compare failed');
    $this->getParameterHolder()->set('columnmin', null);
    $this->getParameterHolder()->set('min_error', 'The specified date is too far in the past');
    $this->getParameterHolder()->set('columnmax', null);
    $this->getParameterHolder()->set('max_error', 'The specified date is too far in the future.');
    $this->getParameterHolder()->set('operator', '==');

    $this->getParameterHolder()->add($parameters);
    
    if (!$this->getParameter('class'))
    {
      throw new sfValidatorException('The "class" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('columnmin'))
    {
      throw new sfValidatorException('The "columnmin" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }
    
    if (!$this->getParameter('columnmax'))
    {
      throw new sfValidatorException('The "columnmax" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    // check user-specified parameters
    $operator = $this->getParameterHolder()->get('operator');

    // array of allowed operators
    $allowed_operators = array('>', '>=', '!=', '==', '<=', '<');

    if (!in_array($operator, $allowed_operators))
    {
      // unknown operator
      throw new sfValidatorException(sprintf('Invalid date comparison operator "%s"', $operator));
    }    

    return true;
  }
}
