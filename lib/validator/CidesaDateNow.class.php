<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2004-2006 Sean Kerr.
 *
 * For the full copyright and license information, please  view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfDateValidator verifies a parameter is of a date  format.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Arthur Koziel <arthur@arthurkoziel.de>
 * @author     Nick Lane <nick.lane@internode.on.net>
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Sean Kerr <skerr@mojavi.org>
 * @version    SVN: $Id: sfDateValidator.class.php 3233  2007-01-11 21:01:08Z fabien $
 */
class CidesaDateNow extends sfValidator
{
  /**
   * Execute this validator.
   *
   * @param mixed A file or parameter value/array
   * @param error An error message reference
   *
   * @return bool true, if this validator executes successfully,  otherwise false
   */
  public function execute(&$value, &$error)
  {
  	$culture = $this->getContext()->getUser()->getCulture();

    // Validate the given date

    //$value1 = $value;
    $value1 = $this->getValidDate($value, $culture);
    if (!$value1)
    {
      $error = $this->getParameterHolder()->get('date_error');

      return false;
    }

    // Is there a compare to do?
    $compareDate = $this->getParameterHolder()->get('compare');

    // If the compare date is given
    if ($compareDate)
    {
      $compareValue = $this->getContext()->getRequest()->getParameter($compareDate);
      $operator = $this->getParameterHolder()->get('operator');

      //This is added
      if($compareDate == "now")
         $value2 = $this->getValidDate(date('d/m/Y'),$culture);
      else
      //Untill here
          $value2 = $this->getValidDate($compareValue,$culture);
      // If the check date is valid, compare it. Otherwise  ignore the comparison


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

//echo $value1."<br>";
//echo $value2."<br>";
            $valid = $value1 <= $value2;

            //exit();
            break;
          case '<':
            $valid = $value1 <  $value2;
            break;

          default:
            throw new sfValidatorException(sprintf('Invalid date comparison operator "%s"', $operator));
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
   * @param array   An associative array of initialization  parameters
   *
   * @return bool true, if initialization completes successfully,  otherwise false
   */
  public function initialize($context, $parameters = null)
  {
    // Initialize parent
    parent::initialize($context, $parameters);

    // Set defaults
    $this->getParameterHolder()->set('date_error', 'Invalid date');
    $this->getParameterHolder()->set('compare_error', 'Compare failed');
    $this->getParameterHolder()->set('operator', '==');

    $this->getParameterHolder()->add($parameters);

    return true;
  }
}

?>