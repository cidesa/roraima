<?php

require_once('lime/lime.php');

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfTestBrowser simulates a fake browser which can test a symfony application.
 *
 * @package    symfony
 * @subpackage test
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfTestBrowser.class.php 5153 2007-09-16 15:47:55Z fabien $
 */
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

