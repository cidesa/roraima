<?php

class CidesaValidaDate extends sfValidator
{

  /**
   * Execute this validator.
   *
   * @param mixed A file or parameter value/array.
   * @param error An error message reference.
   *
   * @return bool true, if this validator executes successfully, otherwise
   *              false.
   */
  public function execute (&$value, &$error)
  {

    if (!$this->chkDate($value)){
      $error = $this->getParameter('invalid_date');

      return false;
    }else
    {
    // get date and operator parameter for comparison
    $check_date_param = $this->getParameter('check_date');
    $check_date = $this->getContext()->getRequest()->getParameter($check_date_param);
    $operator = $check_param = $this->getParameter('operator');

    // strip quotes
    $operator = trim($operator, "'");

    $value      = strtotime($value . ' 00:00');
    $check_date = strtotime($check_date . ' 00:00');

    $eval_code  = 'if(' . $value . $operator . $check_date . '){';
    $eval_code .= ' return true; } else {';
    $eval_code .= ' return false;}';

    if ($check_date_param !== null && !eval($eval_code)){


      $error = $this->getParameter('mismatched_date');
      return false;
    }

    return true;
   }
  }



  private function chkDate($strdate){

   if((strlen($strdate)<10)OR(strlen($strdate)>10)){

      return false;

   } else {

      //The entered value is checked for proper Date format
      if((substr_count($strdate,"/"))<>2){

        return false;

      } else {
        $pos=strpos($strdate,"/");
        $date=substr($strdate,0,($pos));
        $result=ereg("^[0-9]+$",$date,$trashed);

        if(!($result)){

          return false;

        } else {

          if(($date<=0)OR($date>31)){

              return false;
         }

        }

        $month=substr($strdate,($pos+1),($pos));

        if(($month<=0)OR($month>12)){

          return false;

        } else {

          $result=ereg("^[0-9]+$",$month,$trashed);

          if(!($result)){

            return false;

          }

        }

        $year=substr($strdate,($pos+4),strlen($strdate));
        $result=ereg("^[0-9]+$",$year,$trashed);

        if(!($result)){

          return false;

        } else {

          if(($year<1900)OR($year>2200)){

            return false;
          }
        }
      }
    }

    return true;

  }


  public function initialize ($context, $parameters = null)
  {
    // initialize parent
    parent::initialize($context);

    // set defaults
    $this->getParameterHolder()->set('invalid_date', 'Invalid date');

    $this->getParameterHolder()->add($parameters);

    return true;
  }


}
?>