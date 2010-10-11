<?php

/**
 * presnomcalintprelot actions.
 *
 * @package    siga
 * @subpackage presnomcalintprelot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class presnomcalintprelotActions extends autopresnomcalintprelotActions
{

  public function executeList()
  {
      return $this->forward('presnomcalintprelot','edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
    $this->capitalizacion = Constantes :: Capitalizacion();
    $this->params=array('capitalizacion' => $this->capitalizacion);
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // AquÃ­ va el cÃ³digo para traernos los registros que contendrÃ¡ el grid
      $reg = array();
      // AquÃ­ va el cÃ³digo para generar arreglo de configuraciÃ³n del grid

    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuraciÃ³n del grid de un archivo yml
    // y se le pasa el parÃ¡metro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuraciÃ³n del grid de un .yml, sedebe hacer a pie.
    
    // Se genera el arreglo de opciones necesario para generar el grid

     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/presnomcalintprelot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->nppresoc->setObj($this->obj);
    


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la peticiÃ³n ajax desde el cliente los datos que necesitemos
    // para generar el cÃ³digo de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.
    $sw=true;
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $now = strtotime(date("Y-m-d H:i:s"));
        $sw=false;
        $dato  = H::GetX('Codtipcon','Nptipcon','Destipcon',$codigo);
        $this->nppresoc = $this->getNppresocOrCreate();
        $this->codtipcon=$codigo;
        $sal= $this->getRequestParameter('salario');
        $salario = H::iif($sal=='true','P','U');
        if($this->getRequestParameter('anno')=='true')
          $anno='365';
        else
          $anno='360';
        $capita = $this->getRequestParameter('capita');
        $feccor = $this->getRequestParameter('feccor');
        $reg=array();

        $c = new Criteria();
        $c->add(NppresocPeer::CODEMP,"codemp in (select codemp from npasiempcont where status='A' and codtipcon='$codigo')",Criteria::CUSTOM);
        $d =  NppresocPeer::doDelete($c);

        $c = new Criteria();
        $c->add(NpimppresocPeer::CODEMP,"codemp in (select codemp from npasiempcont where status='A' and codtipcon='$codigo')",Criteria::CUSTOM);
        $d =  NpimppresocPeer::doDelete($c);
        
        $c = new Criteria();
        $c->add(NpasiempcontPeer::CODTIPCON,$codigo);
        $c->add(NpasiempcontPeer::STATUS,'A');
        $per = NpasiempcontPeer::doSelect($c);
        $i=0;
        $this->cal=0;
        $this->nocal=0;
        $reg=array();
        foreach($per as $r)
        {
            $c = new Criteria();
            $c->add(NppresocPeer::CODEMP,$r->getCodemp());
            $c->add(NppresocPeer::FECCOR,$feccor);
            $c->add(NppresocPeer::FECCAL,$feccor);
            $c->add(NppresocPeer::CODCON,$codigo);
            $c->add(NppresocPeer::MONPRE,1);
            $c->add(NppresocPeer::STAPRE,'C');
            $c->add(NppresocPeer::REGPRE,'N');
            NppresocPeer::doInsert($c);

            try {
                $sql ="insert into npimppresoc
                        (codemp,feccor,fecini,fecfin,salemp,salempdia,aliuti,alibono,aliadi,saltot,diaart108,capemp,antacum,valart108,tasint,diadif,intdev,intacum,adeant,adepre,regpre)
                 select codemp,to_date('$feccor','dd/mm/yyyy'),fecini,fecfin,round(monto,2),round(mondia,2),round(aliuti,2),round(alivac,2),round(aliadi,2),round(mondia+aliuti+alivac+aliadi,2),dias,round(capital,2),round(capitalact,2),round(monpres,2),round(tasa,2),mondiapro,round(monint,2),round(intacu,2),round(monant,2),round(monadeint,2),'N'
                 from calculopres('".$r->getCodemp()."','$feccor','$capita','$salario');";
                H::BuscarDatos($sql, $rs1);

                $sql="select * from npimppresoc where codemp='".$r->getCodemp()."' order by fecini desc,id desc limit 1";
                if(H::BuscarDatos($sql, $rs2))
                {
                    $sql ="update nppresoc set monpre='".$rs2[0]['antacum']."',antacu='".$rs2[0]['antacum']."',intacu='".$rs2[0]['intacum']."',adepre='".$rs2[0]['adeant']."',adeint='".$rs2[0]['adepre']."'
                            where codemp='".$r->getCodemp()."'";
                    H::BuscarDatos($sql, $rs3);                                        
                    $c = new Criteria();
                    $c->add(NphojintPeer::CODEMP,$r->getCodemp());
                    $per2 = NphojintPeer::doSelect($c);
                    if($per2){
                        $per2[0]->setMonpre(H::FormatoMonto($rs2[0]['antacum']));
                        $per2[0]->setRescal('Prestaciones Calculadas Exitosamente');
                    }
                    $reg = array_merge($reg,$per2);
                }
                $this->cal++;
            }catch (Exception $e){
                $c = new Criteria();
                $c->add(NppresocPeer::CODEMP,$r->getCodemp());
                $d =  NppresocPeer::doDelete($c);
                $c = new Criteria();
                $c->add(NphojintPeer::CODEMP,$r->getCodemp());
                $per2 = NphojintPeer::doSelect($c);
                if($per2){
                    $per2[0]->setMonpre(H::FormatoMonto(0));
                    $per2[0]->setRescal('Error en Calculo de Prestaciones');
                }
                $reg = array_merge($reg,$per2);
                $this->nocal++;
            }            
            $i++;
        }        
        $this->configGrid($reg);
        $now2 = strtotime(date("Y-m-d H:i:s"));
        $now3 = $now2-$now;
        $output = '[["nppresoc_destipcon","'.$dato.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucciÃ³n
    if($sw==true)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serÃ¡n usados en las funciones de validaciÃ³n.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los mÃ©todos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al cÃ³digo que retorna
      // Todas las funciones de validaciÃ³n y procesos del negocio
      // deben retornar cÃ³digos >= -1. Estos cÃ³digo serÃ¡m buscados en
      // el archivo errors.yml en la funciÃ³n handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $this->capitalizacion = Constantes :: Capitalizacion();
    $this->params=array('capitalizacion' => $this->capitalizacion);

  }

  public function saving($clasemodelo)
  {
    return $this->forward('presnomcalintprelot','edit');
  }

  public function deleting($clasemodelo)
  {
    return $this->forward('presnomcalintprelot','edit');
  }


}
