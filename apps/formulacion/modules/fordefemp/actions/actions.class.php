<?php

/**
 * fordefemp actions.
 *
 * @package    siga
 * @subpackage fordefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefempActions extends autofordefempActions
{
  public function executeIndex()
  {
	$id=Herramientas::getX('CODEMP','Empresa','Id','001');	  
	 	
	if ($id!='<!Registro no Encontrado o Vacio!>')
    {
    return $this->redirect('fordefemp/edit?id='.$id);
    }
    else { return $this->redirect('fordefemp/edit');}
	  	
  }
  
   public function executeEdit()
  {
    $this->empresa = $this->getEmpresaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateEmpresaFromRequest();

      $this->saveEmpresa($this->empresa);
      
       $this->empresa->setId(Herramientas::getX_vacio('codemp','empresa','id',$this->empresa->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefemp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefemp/list');
      }
      else
      {
        return $this->redirect('fordefemp/edit?id='.$this->empresa->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateEmpresaFromRequest()
  {
    $empresa = $this->getRequestParameter('empresa');

    $this->empresa->setCodemp('001');

    if (isset($empresa['nomemp']))
    {
      $this->empresa->setNomemp($empresa['nomemp']);
    }
    if (isset($empresa['diremp']))
    {
      $this->empresa->setDiremp($empresa['diremp']);
    }
    if (isset($empresa['ciuemp']))
    {
      $this->empresa->setCiuemp($empresa['ciuemp']);
    }
    if (isset($empresa['tlfemp']))
    {
      $this->empresa->setTlfemp($empresa['tlfemp']);
    }
    if (isset($empresa['urlemp']))
    {
      $this->empresa->setUrlemp($empresa['urlemp']);
    }
    if (isset($empresa['faxemp']))
    {
      $this->empresa->setFaxemp($empresa['faxemp']);
    }
    if (isset($empresa['codpos']))
    {
      $this->empresa->setCodpos($empresa['codpos']);
    }
    if (isset($empresa['cleedo']))
    {
      $this->empresa->setCleedo($empresa['cleedo']);
    }
    if (isset($empresa['dirpre']))
    {
      $this->empresa->setDirpre($empresa['dirpre']);
    }
  }
	
}
