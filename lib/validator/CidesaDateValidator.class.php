<?php
/**
 * CidesaDateValidator: Compara una fecha dada contra dos valores maximos y minimos
 * extraidos de dos campos dados, de una tabla data
 *
 * @package    Roraima
 * @subpackage validators
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CidesaDateValidator extends sfValidator
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
  	$culture = $this->getContext()->getUser()->getCulture();  	
  	
  	  	
  	$className  = ucfirst(strtolower($this->getParameter('class'))).'Peer';  	
    $columnNamemin = ucfirst(strtolower($this->getParameter('columnmin')));    
    $columnNamemax = ucfirst(strtolower($this->getParameter('columnmax')));    

    
    $c = new Criteria();
    $object = call_user_func(array($className, 'doSelectOne'), $c);
    
     // Validate the given date
    $value1 = $this->getValidDate($value, $culture); 
    if (!$value1)
    {
      $error = $this->getParameterHolder()->get('date_error');

      return false;
    }
  
     if ($object) 
     {
     	$method = 'get'.$columnNamemin;
	    $col1 = $object->$method();	 
	    $min= date("d/m/Y",strtotime($col1));  
	   	if ($min)
    		{
    		$minTime = $this->getValidDate($min,$culture);    		
      		if ($value1 < $minTime)
      		{
      			$error = $this->getParameterHolder()->get('min_error');

        		return false;
      	    }
    	   }
    }
    if ($object) 
    {
    	$method = 'get'.$columnNamemax;
	    $col2 = $object->$method();
	    $max= date("d/m/Y",strtotime($col2));		 
    	if ($max)
    	{    		
      	$maxTime = $this->getValidDate($max,$culture);      	
      	if ($value1 > $maxTime)
      	{
      		$error = $this->getParameterHolder()->get('max_error');

        	return false;
      	}
    	}
    }

     // Is there a compare to do?
    $compareDateParam = $this->getParameter('compare');
    $compareDate = $this->getContext()->getRequest()->getParameter($compareDateParam);

    // If the compare date is given
    if ($compareDate)
    {
      $operator = trim($this->getParameter('operator', '=='), '\'" ');
      $value2 = $this->getValidDate($compareDate, $culture);

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
 protected function getValidDate($value, $culture)
  {
    $result = sfI18N::getDateForCulture($value, $culture);      
    list($d, $m, $y) = $result;    

    // Make sure the date is a valid gregorian calendar date also
    if ($result === null || !checkdate($m, $d, $y))
    {
      return null;
    }

    return strtotime("$y-$m-$d 00:00");
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
    $this->setParameter('unique_error', 'Uniqueness error');
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
