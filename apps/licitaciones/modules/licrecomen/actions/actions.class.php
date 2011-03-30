<?php

/**
 * licrecomen actions.
 *
 * @package    siga
 * @subpackage licrecomen
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licrecomenActions extends autolicrecomenActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LirecomendetPeer::NUMRECOFE,$this->lirecomen->getNumrecofe());
      $reg = LirecomendetPeer::doSelect($c);
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licrecomen/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->lirecomen->setGrid($this->obj);

   }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $bieser = '';
           $compra = '';
           $modcon = '';
           $desclacomp = '';
           $numplie = '';
           $c = new Criteria();
           $c->add(LiplieespPeer::NUMEXP,  $codigo);
           $c->addJoin(LiplieespPeer::NUMCOMINT,LicomintPeer::NUMCOMINT);
           $per = LicomintPeer::doSelectOne($c);
           if($per)
           {
               $compra = $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
               $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
               $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
               $bieser= $per->getTipcon()=='B' ? 'BIENES' : ($per->getTipcon()=='S' ? 'SERVICIO' : '');
               $numplie = H::GetX('Numexp','Liplieesp','Numplie',$codigo);
           }
           $this->lirecomen = $this->getLirecomenOrCreate();
           $this->updateLirecomenFromRequest();
           $sql="select b.codpro, c.nompro, c.rifpro, d.desemp as destipemp,
                    FormatoNum(sum(e.punemp)) as punleg,
                    FormatoNum(sum(f.punemp)) as puntec,
                    FormatoNum(sum(g.punemp)) as punfin,
                    FormatoNum(sum(h.punemp)) as punfia,
                    FormatoNum(b.porvan) as punvan,
                    FormatoNum(sum(i.punemp)) as puntipemp,
                    FormatoNum(0) as punmin,
                    FormatoNum(sum(e.punemp+f.punemp+g.punemp+h.punemp+i.punemp)+b.porvan) as puntot,
                    max(a.id) as id
                    from lianaofe a, liregofe b, caprovee c, litipemp d,
                    lianaofeleg e, lianaofetec f, lianaofefin g, lianaofefin h, lianaofetipemp i
                    where
                    a.numexp='$codigo' and
                    a.numofe=b.numofe and
                    b.codpro=c.codpro and
                    b.codtipemp=d.codemp and
                    e.numanaofe=a.numanaofe and
                    f.numanaofe=a.numanaofe and
                    g.numanaofe=a.numanaofe and
                    h.numanaofe=a.numanaofe and
                    i.numanaofe=a.numanaofe
                    group by
                    b.codpro, c.nompro, c.rifpro, d.desemp,b.porvan
                    order by puntot desc";
           H::BuscarDatos($sql, $reg);
           $this->configGrid($reg);
           $js='';
           $output = '[["lirecomen_tipcom","'.$compra.'",""],["lirecomen_destiplic","'.$modcon.'",""],["lirecomen_tipcon","'.$bieser.'",""],
                       ["lirecomen_desclacomp","'.$desclacomp.'",""],["lirecomen_numplie","'.$numplie.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
            $nomemp = '';
            $nomcar = '';
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["lirecomen_nomempadm","'.$nomemp.'",""],["lirecomen_nomcaradm","'.$nomcar.'",""],["lirecomen_coduniadm","'.$coduniadm.'",""],["lirecomen_desuniadm","'.$desuniadm.'",""]]';
        break;
      case '3':
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["lirecomen_coduniadm","'.$coduniadm.'",""],["lirecomen_desuniadm","'.$desuniadm.'",""],["","",""]]';
        break;
      case '4':
            $nomemp = '';
            $nomcar = '';
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["lirecomen_nomempeje","'.$nomemp.'",""],["lirecomen_nomcareje","'.$nomcar.'",""],["lirecomen_coduniste","'.$coduniste.'",""],["lirecomen_desuniste","'.$desuniste.'",""]]';
        break;
      case '5':
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["lirecomen_coduniste","'.$coduniste.'",""],["lirecomen_desuniste","'.$desuniste.'",""],["","",""]]';
        break;
      case '6':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["lirecomen_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumrecofe()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getRecome(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numrecofe','Lirecomen','Numrecofe',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumrecofe($numero);
        $sql="update lidefemp set recome='".($per->getRecome()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    Licitacion::SalvarGridRecomen($clasemodelo,$grid);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Licitacion::EliminarGridRecomen($clase);
    return parent::deleting($clasemodelo);
  }


}