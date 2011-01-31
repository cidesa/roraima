<?php
/**
 * cidesaTestBrowser: Clase para generar pruebas unitarias de los formularios
 * todos los formularios
 *
 * @package    Roraima
 * @subpackage cidesa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
require_once('lime/lime.php');

class cidesaTestBrowser extends sfTestBrowser
{

  /**
   * Tests if the current request has been redirected.
   *
   * @param boolean Flag for redirection mode
   *
   * @return sfTestBrowser The current sfTestBrowser instance
   */
  public function Redirect($boolean = true)
  {
    $isredirect = false;
    if ($location = $this->getContext()->getResponse()->getHttpHeader('location'))
    {
      $isredirect = true;
    }else{
      $isredirect = false;
    }

    return $isredirect;
  }


  /**
   * Checks that the current response contains a given text.
   *
   * @param string Uniform resource identifier
   * @param string Text in the response
   *
   * @return sfTestBrowser The current sfTestBrowser instance
   */
  public function uncheck($uri, $text = null)
  {
    $this->get($uri)->isStatusCode();

    if ($text !== null)
    {
      $this->notresponseContains($text);
    }

    return $this;
  }

  public function notresponseContains($text)
  {
    $this->test->unlike($this->getResponse()->getContent(), '/'.preg_quote($text, '/').'/', sprintf('response not contains "%s"', substr($text, 0, 40)));

    return $this;
  }

}

