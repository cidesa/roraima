<?php
class cidesaWebResponse extends sfWebResponse
{
/**
   * Sets a HTTP header.
   *
   * @param string HTTP header name
   * @param string Value
   * @param boolean Replace for the value
   *
   */
  public function setHttpHeader($name, $value, $replace = true)
  {
    $name = $this->normalizeHeaderName($name);
    $value = str_replace("Á","&Aacute;",$value);
    $value = str_replace("á","&aacute;",$value);
    $value = str_replace("É","&Eacute;",$value);
    $value = str_replace("é","&eacute;",$value);
    $value = str_replace("Í","&Iacute;",$value);
    $value = str_replace("í","&iacute;",$value);
    $value = str_replace("Ó","&Oacute;",$value);
    $value = str_replace("ó","&oacute;",$value);
    $value = str_replace("Ú","&Uacute;",$value);
    $value = str_replace("ú","&uacute;",$value);
    $value = str_replace("ñ","&ntilde;",$value);
    $value = str_replace("Ñ","&Ntilde;",$value);

    if ('Content-Type' == $name)
    {
      if ($replace || !$this->getHttpHeader('Content-Type', null))
      {
        $this->setContentType($value);
      }

      return;
    }

    if (!$replace)
    {
      $current = $this->getParameter($name, '', 'symfony/response/http/headers');
      $value = ($current ? $current.', ' : '').$value;
    }

    $this->setParameter($name, $value, 'symfony/response/http/headers');

  }

}
?>
