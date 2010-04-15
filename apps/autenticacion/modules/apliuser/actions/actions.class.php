<?php

/**
 * apliuser actions.
 *
 * @package    Roraima
 * @subpackage apliuser
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class apliuserActions extends autoapliuserActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/apli_user/filters');

    // pager
    $this->pager = new sfPropelPager('Usuarios', 10);
    $c = new Criteria();
    $c->add(ApliUserPeer::CODEMP,$this->getUser()->getAttribute('empresa'));
    $c->addJoin(ApliUserPeer::LOGUSE,UsuariosPeer::LOGUSE);
    $c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->apli_user = $this->getApliUserOrCreate();
    $this->modulos = $this->CargarModulos();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateApliUserFromRequest();

      $this->saveApliUser($this->apli_user);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('apliuser/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('apliuser/list');
      }
      else
      {
        return $this->redirect('apliuser/edit?id='.$this->apli_user->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveApliUser($apli_user)
  {
    $codempresa = $this->getUser()->getAttribute('empresa');
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    Autenticacion::salvarApliuser($apli_user,$grid,$codempresa);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateApliUserFromRequest()
  {
    $apli_user = $this->getRequestParameter('apli_user');
    $this->modulos = $this->CargarModulos();

    if (isset($apli_user['cedemp']))
    {
      $this->apli_user->setCedemp($apli_user['cedemp']);
    }
    if (isset($apli_user['nomuse']))
    {
      $this->apli_user->setNomuse($apli_user['nomuse']);
    }
    if (isset($apli_user['diremp']))
    {
      $this->apli_user->setDiremp($apli_user['diremp']);
    }
    if (isset($apli_user['telemp']))
    {
      $this->apli_user->setTelemp($apli_user['telemp']);
    }
    if (isset($apli_user['loguse']))
    {
      $this->apli_user->setLoguse($apli_user['loguse']);
    }
    if (isset($apli_user['pasuse']))
    {
      $this->apli_user->setPasuse($apli_user['pasuse']);
    }
    if (isset($apli_user['codapl']))
    {
      $this->apli_user->setCodapl($apli_user['codapl']);
    }
    if (isset($apli_user['codemp']))
    {
      $this->apli_user->setCodemp($apli_user['codemp']);
    }
    if (isset($apli_user['nomopc']))
    {
      $this->apli_user->setNomopc($apli_user['nomopc']);
    }
    if (isset($apli_user['priuse']))
    {
      $this->apli_user->setPriuse($apli_user['priuse']);
    }
     if (isset($apli_user['administrador']))
    {
      $this->apli_user->setAdministrador($apli_user['administrador']);
    }
  }

  protected function getApliUserOrCreate($id = 'id', $login='login')
  {
    if (!$this->getRequestParameter($login))
    {
      $apli_user = new ApliUser();
      $this->configGrid($this->getRequestParameter('apli_user[loguse]'),$this->getRequestParameter('apli_user[codapl]'));

    }
    else
    {
      $c = new Criteria();
      $c->add(ApliUserPeer::LOGUSE,$this->getRequestParameter($login));
      $apli_user = ApliUserPeer::doSelectOne($c);
      $apli_user->setCodapl($apli_user->getNomyml().'_'.$apli_user->getCodapl());
      $this->configGrid($apli_user->getLoguse(),$apli_user->getCodapl());
      $this->forward404Unless($apli_user);

    }

    return $apli_user;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');

    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->configGrid($this->getRequestParameter('login'),$this->getRequestParameter('modulo'));
    }
    else  if ($this->getRequestParameter('ajax')=='2')
      {
       $dato=$this->getRequestParameter('codigo');

       $c = new Criteria();
       $c->add(UsuariosPeer::CEDEMP,"rtrim(".UsuariosPeer::CEDEMP.")='".$dato."'", CRITERIA::CUSTOM);
       $usu = UsuariosPeer::doSelectOne($c);
       if($usu){
       	$alert = "";
         $output = '[["apli_user_cedemp","'.$usu->getCedemp().'",""],["'.$cajtexmos.'","'.$usu->getNomuse().'",""],["'.$this->getRequestParameter('direc').'","'.$usu->getDiremp().'",""],["'.$this->getRequestParameter('telef').'","'.$usu->getTelemp().'",""],["'.$this->getRequestParameter('login').'","'.$usu->getLoguse().'",""],["'.$this->getRequestParameter('pass').'","'.$usu->getPasuse().'",""],["javascript","'.$alert.'",""]]';

       }else{
         $alert = "alert('Usuario no Existe')";
         $output = '[["apli_user_cedemp","",""],["'.$cajtexmos.'","",""],["'.$this->getRequestParameter('direc').'","",""],["'.$this->getRequestParameter('telef').'","",""],["'.$this->getRequestParameter('login').'","",""],["'.$this->getRequestParameter('pass').'","",""],["javascript","'.$alert.'",""]]';

       }
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
      }
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('CEDEMP','Usuarios','Cedemp',$this->getRequestParameter('apli_user[cedemp]'));
  }
  }

  public function CargarModulos()
  {
    $c = new Criteria();
    $lista_mod = AplicacionPeer::doSelect($c);

    $modulos = array();

    foreach($lista_mod as $obj_mod)
    {
      $modulos += array($obj_mod->getNomyml().'_'.$obj_mod->getCodapl() => $obj_mod->getNomapl());
    }
    return $modulos;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($loguse='', $codapl='')
  {

    if($codapl!=''){
      $apl = explode('_',$codapl);
      $yml = $apl[0];
      $cod = $apl[1];
    }else{
      $yml = '';
      $cod = '';
    }

    $dir=CIDESA_CONFIG.'/menus/'.strtolower($yml);
    cidesaTools::exitsfile($dir) ? $dir=$dir : $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($yml);
    $modulos = sfYaml::load($dir);

    if(is_array($modulos)){
      if($yml){
        $n = explode('.',$yml);
        $modulos = $modulos[$n[0]]['menu'];
      }
    }
    $c = new Criteria();
    $c->add(ApliUserPeer::CODAPL,$cod);
    $c->add(ApliUserPeer::LOGUSE,$loguse);
    $c->add(ApliUserPeer::CODEMP,$this->getUser()->getAttribute('empresa', ''));
    $apliusers = ApliUserPeer::doSelect($c);

    if(is_array($modulos)){
      $modulos = H::array_lineal($modulos);
    }

    $per = array();

    foreach($modulos as $k => $v)
    {
      $priuse = '';
      $id = '';
      foreach($apliusers as $obj){
        if($obj->getNomopc() == strtolower($k)) {
           $priuse = $obj->getPriuse();
           $id = $obj->getId();
        }
      }
      $per[] = array('desopc' => $v,'nomopc' => strtolower($k), 'priuse' => $priuse, 'id' => $id);
    }
    $this->totfil=count($per);


    $opciones = new OpcionesGrid();
    $opciones->setTabla('ApliUser');
    $opciones->setAnchoGrid(1500);
    $opciones->setTitulo('');
    $opciones->setFilas(0);
    $opciones->setEliminar(false);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Formulario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('desopc');
    $col1->setHTML('type="text" size="80" readonly="true"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomopc');
    $col2->setHTML('type="text" size="35"');
    $col2->setOculta(true);

    $col3 = new Columna('Acceso');
    $col3->setTipo(Columna::COMBO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('priuse');
    $col3->setCombo(Constantes::Permisologias());
    $col3->setHTML(' ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);
  }

}
