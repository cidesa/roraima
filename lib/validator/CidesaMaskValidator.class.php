<?php

/**
 * sfPropelUniqueValidator validates that the uniqueness of a column.
 * This validator only works for single column primary key.
 *
 *
 * @package    symfony
 * @subpackage validator
 * @author     Luis Hernández <luelher@gmail.com>
 * @version    SVN: $Id: CidesaMaskValidator.class.php 2995 2006-12-09 18:01:32Z Desarrollo $
 */
class CidesaMaskValidator extends sfValidator
{
  public function execute(&$value, &$error)
  {
    $className  = ucfirst(strtolower($this->getParameter('class'))).'Peer';
    $columnMask = ucfirst(strtolower($this->getParameter('columnmask')));
    $columnDiv = ucfirst(strtolower($this->getParameter('columndiv')));
    $valDiv = ucfirst(strtolower($this->getParameter('div','null')));

    $c = new Criteria();
    $object = call_user_func(array($className, 'doSelectOne'), $c);

    if ($object)
    {
	$method = 'get'.$columnMask;
	$mask = $object->$method();
	$method = 'get'.$columnDiv;
	
	if ($valDiv=='null'){
	    $div = $object->$method();
	}else{
    	$div = $valDiv;
	}
	if($mask)
	{
	  
		$tags = explode('-',trim($mask));
		// $regexp = '/^(XXX)*(XXXXX)*$/';

		/*
		([0-9][0-9](-))
		([0-9][0-9](-))
		([0-9][0-9](-)*)

		([0-9][0-9][0-9](-))
		([0-9][0-9](-))
		([0-9][0-9](-))
		([0-9][0-9](-))
		([0-9][0-9])
		*/

		$regexp = '/^';

		foreach ($tags as $index => $t)
		{
			//print $regexp."<br>"; 
			$regexp .= '(';

			$regexp .= str_replace('#','[0-9]',$t);
			$regexp = str_replace('A','[A-Z]',$regexp);

			if((($index+1)==$div && (($index+1)==count($tags))) || (($index+1)<count($tags)) && (($index+1)==$div)) $regexp .= '(-)*)*';
			elseif (($index+1)==count($tags)) $regexp .= ')*';
			else $regexp .= '(-))*';

		}
		
		$regexp .= '$/';

		$error = 'El formato introducido no es válido ('.$mask.')';
		
		return (preg_match ($regexp,trim($value)) == 1);

	}
	
	

    }

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

    if (!$this->getParameter('columnmask'))
    {
      throw new sfValidatorException('The "columnmask" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('columndiv'))
    {
      throw new sfValidatorException('The "columndiv" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    return true;
  }
}
