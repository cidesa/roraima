<?php

/**
 * tesdeftipmov actions.
 *
 * @package    siga
 * @subpackage tesdeftipmov
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftipmovActions extends autotesdeftipmovActions
{
  protected function updateTstipmovFromRequest()
  {
    $tstipmov = $this->getRequestParameter('tstipmov');

    if (isset($tstipmov['codtip']))
    {
      $this->tstipmov->setCodtip($tstipmov['codtip']);
    }
    if (isset($tstipmov['destip']))
    {
      $this->tstipmov->setDestip($tstipmov['destip']);
    }
    //if (isset($tstipmov['debcre']))
    //{
      $this->tstipmov->setDebcre($this->getRequestParameter('radio1'));
    //}
  }
}
