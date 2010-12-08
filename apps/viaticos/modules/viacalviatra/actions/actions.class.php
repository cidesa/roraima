<?php

/**
 * viacalviatra actions.
 *
 * @package    siga
 * @subpackage viacalviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viacalviatraActions extends autoviacalviatraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

     #$c = new Criteria();
     #$c->add(ViadetcalviatraPeer::NUMCAL,$this->viacalviatra->getNumcal());
     #$reg = ViadetcalviatraPeer::doSelect($c);
     $per=array();
     if($this->tipvia=='NACIONAL' || substr($this->viacalviatra->getNumcal(),0,2)=='VN')
     {
        if(count($reg)>0 && $this->viacalviatra->getId()=='')
         {
            $sql="select '1' as ord,codrub,desrub,tipdia,'' as tipo,'' as codtiptra from viadefrub where tiprub<>'2' and tipo='C'
                union all
                select '2' as ord,(select codrub from viadefrub where tiprub='2' limit 1),destiptra,'3' as tipdia,tipo,codtiptra from viadeftiptra
                union all
                select '3' as ord,codrub,desrub,tipdia,'','' from viadefrub where tipo='F'
                ";
                 if(H::BuscarDatos($sql, $per))
                 {
                    $i=0;
                    foreach($per  as $r)
                    {
                        $per[$i]['codrub']=$r['codrub'];
                        $per[$i]['desrub']=$r['desrub'];
                        if($r['tipdia']=='1')
                            $per[$i]['numdia']=$this->numdia;
                        elseif($r['tipdia']=='2')
                            $per[$i]['numdia']=$this->numdia-1;
                        else
                        {
                            if($r['tipo']=='I')
                                $per[$i]['numdia']=$this->numdia;
                            elseif($r['tipo']=='A')
                                $per[$i]['numdia']=2;
                            else
                                $per[$i]['numdia']=2;
                        }
                        $per[$i]['numdia']=($per[$i]['numdia']);

                        if($r['ord']=='2')
                        {
                            $sqlord="select * from viadeftiptra where codtiptra in (select codtiptra from viadeffortra a where codtiptra='".$r['codtiptra']."' and codfortra=(select codfortra from viasolviatra where numsol='$this->numsol'))";
                            if(H::BuscarDatos($sqlord, $rs))
                              $this->nivtra=$r['codtiptra'];
                            else
                              $this->nivtra='';
                        }

                        $monto=0;
                        $sqlcal="select monto from viacalrub where codrub='".$r['codrub']."' and codnivtra='$this->nivtra'";
                        if(H::BuscarDatos($sqlcal, $rs))
                            $monto=$rs[0]['monto'];

                        $per[$i]['mondia']=H::FormatoMonto($monto);
                        $per[$i]['montot']=H::FormatoMonto(H::FormatoNum($per[$i]['numdia'])*$monto);
                        $per[$i]['tipo']=$r['codtiptra'];
                        if($r['ord']=='3' )
                            $per[$i]['calculo']='F';
                        else
                            $per[$i]['calculo']='C';
                        if(H::FormatoNum($per[$i]['montot'])>0)
                            $per[$i]['check']=1;
                        else
                            $per[$i]['check']=0 ;
                        $per[$i]['id']=9;
                        $i++;
                    }
                 }
            }elseif($this->viacalviatra->getId()!='')
            {
                $sql="select '1' as check, a.codrub,case when trim(a.tipo)='' then b.desrub else (select destiptra from viadeftiptra where codtiptra=a.tipo limit 1) end as desrub, numdia, mondia, montot, a.tipo, b.tipo as calculo
                        from viadetcalviatra a, viadefrub b
                        where a.codrub=b.codrub and numcal='".$this->viacalviatra->getNumcal()."'
                        union all
                        select * from (
                        select null as check, a.codrub, a.desrub, 0,0,0,'',tipo
                        from viadefrub a
                        where a.codrub not in (select codrub from viadetcalviatra where numcal='".$this->viacalviatra->getNumcal()."') and tiprub<>'2'
                        union all
                        select null as check, (select codrub from viadefrub where tiprub='2' limit 1), a.destiptra, 0,0,0,a.codtiptra,'C'
                        from viadeftiptra a
                        where a.codtiptra not in (select tipo from viadetcalviatra where numcal='".$this->viacalviatra->getNumcal()."')
                        ) a
                        order by codrub";
                 if(H::BuscarDatos($sql, $per))
                 {
                    $i=0;
                    foreach($per as $r)
                    {
                        $per[$i]['check']=$r['check'];
                        $per[$i]['codrub']=$r['codrub'];
                        $per[$i]['desrub']=$r['desrub'];
                        $per[$i]['numdia']=($r['numdia']);
                        $per[$i]['mondia']=H::FormatoMonto($r['mondia']);
                        $per[$i]['montot']=H::FormatoMonto($r['montot']);
                        $per[$i]['tipo']=$r['tipo'];
                        $per[$i]['calculo']=$r['calculo'];
                        $per[$i]['id']=9;
                        if($r['montot']==0)
                        {
                            $sqltipdia="select tipdia from viadefrub where codrub='".$r['codrub']."'";
                            if(H::BuscarDatos($sqltipdia, $rs))
                            {
                                if($rs[0]['tipdia']=='1')
                                    $per[$i]['numdia']=$this->viacalviatra->getNumdia();
                                elseif($rs[0]['tipdia']=='2')
                                    $per[$i]['numdia']=$this->viacalviatra->getNumdia()-1;
                                else
                                {
                                    if($r['tipo']!='')
                                    {
                                        $sqltipo="select tipo from viadeftiptra where codtiptra='".$r['tipo']."'";
                                        if(H::BuscarDatos($sqltipo, $rs))
                                        {
                                            if($rs[0]['tipo']=='I')
                                                $per[$i]['numdia']=$this->viacalviatra->getNumdia();
                                            elseif($rs[0]['tipo']=='A')
                                                $per[$i]['numdia']=2;
                                            else
                                                $per[$i]['numdia']=0;

                                        }else
                                            $per[$i]['numdia']=0;
                                    }else
                                        $per[$i]['numdia']=0;
                                }
                                $per[$i]['numdia']=($per[$i]['numdia']);
                            }
                            if($r['tipo']!='')
                            {
                                $sqlord="select * from viadeftiptra where codtiptra in (select codtiptra from viadeffortra a where codtiptra='".$r['tipo']."' and codfortra=(select codfortra from viasolviatra where numsol='".$this->viacalviatra->getRefsol()."'))";
                                if(H::BuscarDatos($sqlord, $rs))
                                  $this->nivtra=$r['tipo'];
                                else
                                  $this->nivtra='';
                            }else
                            {
                                if($this->viacalviatra->getCodnivaco()>$this->viacalviatra->getCodniv())
                                  $this->nivtra = $this->viacalviatra->getCodnivaco();
                                else
                                  $this->nivtra= $this->viacalviatra->getCodniv();
                            }

                            $monto=0;
                            $sqlcal="select monto from viacalrub where codrub='".$r['codrub']."' and codnivtra='$this->nivtra'";
                            if(H::BuscarDatos($sqlcal, $rs))
                                $monto=$rs[0]['monto'];

                            $per[$i]['mondia']=H::FormatoMonto($monto);
                            $per[$i]['montot']=H::FormatoMonto(H::FormatoNum($per[$i]['numdia'])*$monto);

                        }
                        $i++;
                    }

                 }
            }
     }else
     {
         $valdol=0;
         $cambio=1;
         if(!$this->codpai)
         {
            $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$this->viacalviatra->getRefsol());
            $this->codpai = H::getX('Codciu','Viaciudad','Codpai',$codciu);
         }
         if($this->codpai)
         {
             $c = new Criteria();
             $c->add(ViapaisPeer::CODPAI,$this->codpai);
             $op = ViapaisPeer::doSelectOne($c);
             if($op)
             {
                 $valdol=$op->getMonto();
             }
             $c = new Criteria();
             $op = ViadefgenPeer::doSelectOne($c);
             if($op)
             {
                 $cambio=$op->getValdolar();
             }
         }
         if($this->numsol!='')
         {
            $sql="select '1' as ord,1 as check,'VI' as codrub, 'VIATICO DIARIO INTERNACIONAL' as desrub, (fechas-fecdes)+1 as numdia,c.monto*d.valdolar as mondia,
             'I1' as tipo,'C' as calculo
             from viasolviatra a, viaciudad b , viapais c, viadefgen d
             where
             numsol='".$this->numsol."' and
             a.codciu=b.codciu and
             b.codpai=c.codpai
             union all
                select '1' as ord,1 as check,'VI' as codrub, 'PRIMA ADICIONAL 100%' as desrub, (fechas-fecdes)+1 as numdia,c.monto*d.valdolar as mondia,
             'I2' as tipo,'C' as calculo
             from viasolviatra a, viaciudad b , viapais c, viadefgen d
             where
             numsol='".$this->numsol."' and
             a.codciu=b.codciu and
             b.codpai=c.codpai
             union all
                select '1' as ord,1 as check,'VI' as codrub, 'PRIMA SUPLEMENTARIA 30%' as desrub, (fechas-fecdes)+1 as numdia,((c.monto*d.valdolar)*0.3)*2 as mondia,
             'I3' as tipo,'C' as calculo
             from viasolviatra a, viaciudad b , viapais c, viadefgen d
             where
             numsol='".$this->numsol."' and
             a.codciu=b.codciu and
             b.codpai=c.codpai
             union all
             select '2' as ord,1 as check,(select codrub from viadefrub where tiprub='2' limit 1),destiptra,
             2,
             (select monto from viacalrub where codrub=(select codrub from viadefrub where tiprub='2' limit 1) and codnivtra=codtiptra),
             codtiptra,'C' from viadeftiptra where tipo='A'
             union all
             select '3' as ord,null as check,codrub,desrub,0,0,'',tipo from viadefrub where tipo='F'
            ";

             if(H::BuscarDatos($sql, $arrrs))
             {
                 $i=0;
                 foreach($arrrs as $rs)
                 {
                    $per[$i]['check']=$rs['check'];
                    $per[$i]['codrub']=$rs['codrub'];
                    $per[$i]['desrub']=$rs['desrub'];
                    $per[$i]['numdia']=($rs['numdia']);
                    $per[$i]['mondia']=H::FormatoMonto($rs['mondia']);
                    $per[$i]['montot']=H::FormatoMonto($rs['numdia']*$rs['mondia']);
                    $per[$i]['tipo']=$rs['tipo'];
                    $per[$i]['calculo']=$rs['calculo'];
                    $per[$i]['mondiadol']=H::FormatoMonto(($rs['mondia']/$cambio));
                    #$per[$i]['cambio']=H::FormatoMonto($cambio);
                    $per[$i]['montotdol']=H::FormatoMonto(($rs['mondia']/$cambio)*$rs['numdia']);
                    $per[$i]['id']=9;
                    $i++;
                 }
             }
         }else
         {
            $sql="select 1 as check,codrub,numdia,mondia, montot,tipo,
                  case when tipo='I1' then 'VIATICO DIARIO INTERNACIONAL'
                  when tipo='I2' then 'PRIMA ADICIONAL 100%'
                  when tipo='I3' then 'PRIMA SUPLEMENTARIA 30%'
                  else '' end as desrub,'C' as calculo
                  from viadetcalviatra where numcal='".$this->viacalviatra->getNumcal()."' and codrub='VI'
                  union all
                  select 1 as check,codrub,numdia,mondia, montot,tipo,(select destiptra from viadeftiptra where codtiptra=a.tipo limit 1) as desrub,'C' as calculo
                  from viadetcalviatra a where numcal='".$this->viacalviatra->getNumcal()."' and codrub<>'VI' and tipo<>''
                  union all
                  select 1 as check,codrub,numdia,mondia, montot,tipo,(select desrub from viadefrub where codrub=a.codrub limit 1) as desrub,'F' as calculo
                  from viadetcalviatra a where numcal='".$this->viacalviatra->getNumcal()."' and codrub<>'VI' and tipo=''
                  union all
                  select null as check,a.codrub,0,0,0,'',a.desrub, 'F'
                  from viadefrub a
                  where a.codrub not in (select codrub from viadetcalviatra where numcal='".$this->viacalviatra->getNumcal()."') and tiprub<>'2' and tipo='F'
                  ";

             if(H::BuscarDatos($sql, $arrrs))
             {
                 $i=0;
                 foreach($arrrs as $rs)
                 {
                    $per[$i]['check']=$rs['check'];
                    $per[$i]['codrub']=$rs['codrub'];
                    $per[$i]['desrub']=$rs['desrub'];
                    $per[$i]['numdia']=($rs['numdia']);
                    $per[$i]['mondia']=H::FormatoMonto($rs['mondia']);
                    $per[$i]['montot']=H::FormatoMonto($rs['montot']);
                    $per[$i]['tipo']=$rs['tipo'];
                    $per[$i]['calculo']=$rs['calculo'];
                    $per[$i]['mondiadol']=H::FormatoMonto(($rs['mondia']/$cambio));
                    #$per[$i]['cambio']=H::FormatoMonto($cambio);
                    $per[$i]['montotdol']=H::FormatoMonto(($rs['mondia']/$cambio)*$rs['numdia']);
                    $per[$i]['id']=9;
                    $i++;
                 }
             }
         }
     }

     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viacalviatra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     #$this->obj[1][1]->setHtml('size=40 maxlength=250 onBlur="if($(id).value!=\'\')cambiardescripcion(this.id)"');
     $this->obj[1][3]->setHtml('size=10 onBlur="calculamontofinal(this.id,3);" onkeyPress="return validaEntero(event)"');
     $this->obj[1][4]->setHtml('size=10 readonly=true onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id,4);"');
     $this->obj[1][0]->setHtml('size=5 onclick="Calculartotal();"');
     if($this->tipvia=='NACIONAL' || substr($this->viacalviatra->getNumcal(),0,2)=='VN')
     {
         $this->obj[1][8]->setOculta(true);
         $this->obj[1][9]->setOculta(true);
     }

     $this->obj = $this->obj[0]->getConfig($per);
     $this->viacalviatra->setGrid($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $js='';
    $nomcat='';
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.
    $head=true;
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $head=false;
        $tipvia='NACIONAL';
        $c = new Criteria();
        $c->add(ViasolviatraPeer::NUMSOL,$codigo);
        $c->add(ViasolviatraPeer::STATUS,'A');
        $per = ViasolviatraPeer::doSelectOne($c);
        if($per)
        {
            $c2 = new Criteria();
            $c2->add(ViacalviatraPeer::REFSOL,$codigo);
            $per2 = ViacalviatraPeer::doSelectOne($c2);
            if(!$per2)
            {
                $fecsol=date('d/m/Y',strtotime($per->getFecsol()));
                $tipvia=$per->getTipvia()=='N' ? 'NACIONAL' : 'INTERNACIONAL';
                $dessol=$per->getDessol();
                $cedemp = NphojintPeer::getCedemp($per->getCodemp());
                $nomemp = NphojintPeer::getNomemp($per->getCodemp());
                $c = new Criteria();
                $c->add(ViadefnivPeer::CODNIV,$per->getCodniv());
                $obj= ViadefnivPeer::doSelectOne($c);
                if($obj)
                    $desniv = $obj->getDesniv();
                $cedempaco = NphojintPeer::getCedemp($per->getCodempaco());
                $nomempaco = NphojintPeer::getNomemp($per->getCodempaco());
                $desnivaco = '';
                $c = new Criteria();
                $c->add(ViadefnivPeer::CODNIV,$per->getCodnivaco());
                $obj= ViadefnivPeer::doSelectOne($c);
                if($obj)
                    $desnivaco = $obj->getDesniv();
                $c = new Criteria();
                $c->add(ViadefprocedPeer::CODPROCED,$per->getCodproced());
                $obj= ViadefprocedPeer::doSelectOne($c);
                if($obj)
                    $desproced = $obj->getDesproced();
                $c = new Criteria();
                $c->add(ViadeffortraPeer::CODFORTRA,$per->getCodfortra());
                $obj= ViadeffortraPeer::doSelectOne($c);
                if($obj)
                    $desfortra = $obj->getDesfortra();
                $cedempaut = NphojintPeer::getCedemp($per->getCodempaut());
                $nomempaut = NphojintPeer::getNomemp($per->getCodempaut());
                $c = new Criteria();
                $c->add(NpcatprePeer::CODCAT,$per->getCodcat());
                $obj= NpcatprePeer::doSelectOne($c);
                if($obj)
                    $nomcat = $obj->getNomcat();
                $this->numdia=$per->getNumdia();
                $this->numsol=$codigo;
                if($per->getCodnivaco()>$per->getCodniv())
                  $this->nivtra = $per->getCodnivaco();
                else
                  $this->nivtra= $per->getCodniv();
                $sw=true;
                $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$codigo);
                $codest = H::getX('Codciu','Viaciudad','Codest',$codciu);
                $codpai = H::getX('Codciu','Viaciudad','Codpai',$codciu);
                $this->codpai=$codpai;
                $ciudad = $codciu.'  -  '.H::getX('Codciu','Viaciudad','Nomciu',$codciu);
                $estado = $codest.'  -  '.H::getX('Codest','Viaestado','Nomest',$codest);
                $pais= $codpai.'  -  '.H::getX('Codpai','Viapais','Nompai',$codpai);
            }else
            {
                $js.="$('viacalviatra_refsol').value='';
                  alert('Numero de Solicitud ya fue Calculada');";
                $sw=false;
                $pais='';
                $estado='';
                $ciudad='';
            }
        }else
        {
            $js.="$('viacalviatra_refsol').value='';
                  alert('Numero de Solicitud No esta Aprobado');";
            $sw=false;
            $pais='';
            $estado='';
            $ciudad='';
        }
        $this->viacalviatra = $this->getViacalviatraOrCreate();
        $this->updateViacalviatraFromRequest();
        $this->numsol=$codigo;
        $this->tipvia=$tipvia;
        if($tipvia=='NACIONAL')
        {
            $js.="$('divtotviadol').hide();";
        }else
        {
            $js.="$('divtotviadol').show();";
        }
        $this->configGrid(array('1'));
        if($sw)
            $output = '[["javascript","'.$js.'",""],["viacalviatra_fecsol","'.$fecsol.'",""],["viacalviatra_tipvia","'.$tipvia.'",""],["viacalviatra_dessol","'.$dessol.'",""],
                       ["viacalviatra_empleado","'.$cedemp.'  -  '.$nomemp.'",""],["viacalviatra_nivel","'.$per->getCodniv().'  -  '.$desniv.'",""],
                       ["viacalviatra_empleadoaco","'.$cedempaco.'  -  '.$nomempaco.'",""],["viacalviatra_nivelaco","'.$per->getCodnivaco().'  -  '.$desnivaco.'",""],
                       ["viacalviatra_proced","'.$per->getCodproced().'  -  '.$desproced.'",""],["viacalviatra_fortra","'.$per->getCodfortra().'  -  '.$desfortra.'",""],
                       ["viacalviatra_fecdes","'.date('d/m/Y',strtotime($per->getFecdes())).'",""],["viacalviatra_fechas","'.date('d/m/Y',strtotime($per->getFechas())).'",""],["viacalviatra_numdia","'.$per->getNumdia().'",""],
                       ["viacalviatra_empleadoaut","'.$cedempaut.'  -  '.$nomempaut.'",""],["viacalviatra_diaconper","'.($per->getNumdia()-1).'",""],["viacalviatra_diasinper","1",""],
                       ["viacalviatra_codcat","'.$per->getCodcat().'",""],["viacalviatra_nomcat","'.$nomcat.'",""],["viacalviatra_ciudad","'.$ciudad.'",""],["viacalviatra_estado","'.$estado.'",""],["viacalviatra_pais","'.$pais.'",""]]';
        else
            $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '2':
            $js='';
            $monto= $this->getRequestParameter('monto','');
            $codcat = $this->getRequestParameter('codcat','');
            $monto = H::obtenermontoescrito($monto);

            $output = '[["javascript","'.$js.'",""],["viacalviatra_totviaenletras","'.$monto.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($head)
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

       $this->viacalviatra = $this->getViacalviatraOrCreate();
       $this->updateViacalviatraFromRequest();
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
       $monto=0;
       foreach($grid[0] as $r)
       {
          if($r['check']==1)
          {
             if(strrpos(',',$r['montot']))
               $monto+=H::FormatoNum($r['montot']);
             else
               $monto+=$r['montot'];
          }
       }
       if($monto==0)
       {
           $this->coderr='V001';
           return false;
       }else
       {
           $sqlano="select to_char(fecini,'yyyy') as ano from contaba";
           H::BuscarDatos($sqlano, $rsa);
           $ano=$rsa[0]['ano'];
           $categoria=$this->viacalviatra->getCodcat();
           $mondis=0;
           $sql="select sum(monasi +
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$ano."','TRA'),0) +
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$ano."','ADI'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$ano."','TRN'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$ano."','DIS'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$ano."','PRC'),0)) as mondis
                from cpasiini where CodPre like '".$categoria."%' and anopre='".$ano."' and perpre='00'";

           if(H::BuscarDatos($sql, $rs))
             $mondis=$rs[0]['mondis'];

           if($monto>$mondis)
           {
               $this->coderr='V002';
               return false;
           }
       }




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
    if($clasemodelo->getNumcal()=='##########')
    {
        $c = new Criteria();
        $per = ViadefgenPeer::doSelectOne($c);
        if($clasemodelo->getTipviatic()=='N')
        {
            $numcal ='VN'.str_pad($per->getNumcalvianac(),8,'0',STR_PAD_LEFT);
            $clasemodelo->setNumcal($numcal);
            $sql="update viadefgen set numcalvianac='".($per->getNumcalvianac()+1)."'";
            H::insertarRegistros($sql);
        }else
        {
            $numcal ='VI'.str_pad($per->getNumcalviaint(),8,'0',STR_PAD_LEFT);
            $clasemodelo->setNumcal($numcal);
            $sql="update viadefgen set numcalviaint='".($per->getNumcalviaint()+1)."'";
            H::insertarRegistros($sql);
        }
    }

    $c = new Criteria();
    $c->add(ViadetcalviatraPeer::NUMCAL,$clasemodelo->getNumcal());
    $per= ViadetcalviatraPeer::doSelect($c);
    if($per)
        foreach($per as $r)
            $r->delete();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    foreach($grid[0] as $reg)
    {
        if($reg['check']=='1' && H::FormatoNum($reg['montot'])!=0)
        {
            $viadetcal = new Viadetcalviatra();
            $viadetcal->setNumcal($clasemodelo->getNumcal());
            $viadetcal->setFeccal($clasemodelo->getFeccal());
            $viadetcal->setCodrub($reg['codrub']);
            $viadetcal->setNumdia($reg['numdia']);
            $viadetcal->setMondia($reg['mondia']);
            $viadetcal->setMontot($reg['montot']);
            $viadetcal->setTipo($reg['tipo']);
            $viadetcal->save();
        }
    }
    $clasemodelo->setStatus('P');
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    if($clasemodelo->getStatus()=='P')
    {
        $c = new Criteria();
        $c->add(ViadetcalviatraPeer::NUMCAL,$clasemodelo->getNumcal());
        $per= ViadetcalviatraPeer::doSelect($c);
        if($per)
            foreach($per as $r)
                $r->delete();

        return parent::deleting($clasemodelo);
    }else
        return 'V004';

  }


}
