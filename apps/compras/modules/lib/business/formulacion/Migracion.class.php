<?php
/**
 * Migración: Clase estática para el manejo de la migración del presupuesto formulado 
 * al modulo de contabilidad presupuestaria
 *
 * @package    Roraima
 * @subpackage formulacion
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Migracion.class.php 32397 2009-09-01 19:18:37Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Migracion {

	public static function Generar($tabla='',$param='')
	{

		/*Dim AgrEliNue As String 'A.- Agrega Registro a los Ya Existente,
                        'E.- Elimina Todos Los Registro y los Agrega Nuevo
                        'T.- Elimina y  Agrega todos los Registro
		*/
		try{
			/////para probar eliminar y validar

				$agrelinue='T';

			//////

			$lonpro='';$fecini='';$feccul='';$fecultdat='';$lonacc='';$lonsubacc='';$lonuae='';
			self::BuscarDefiniciones($lonpro,$fecini,$feccul,$fecultdat,$lonacc,$lonsubacc,$lonuae);

			if (!empty($tabla) and ($tabla=='fordefpry'))
			{
				if ($agrelinue = "T"){

					//$c=new Criteria();
					//FordefpryPeer::doDelete($c);

					$sql="delete from fordefpry";
					Herramientas::insertarRegistros($sql);


		            $sql="insert into fordefpry (codpro,nompro,proacc,codsta,codsitpre,
		            conpoa,fecini,feccul,ubinac,codequ,codsubobj,codsubsubobj, objestnueeta,objestins,
		            objeesppro, indpro, enupro,indsitact,fecultdat,forind,fueind,indsitobj,
		            tieimp,respro,desmet,codunimedmet,cantmet,benpro,codejedes,codnucdes,codzoneco,
		            comindust,codsec,codsubsec,montotpry,codemp,nomemp,caremp,uniadsemp,
		            telemp, faxemp, emaemp, accotrins,obsaccotrins,conpryotr,obsconpryotr,conotrpry,
		            obsconotrpry,tipaccage,placontin,obsplacontin,nroempdir,nroempind,
		            desbrepry,poravafis,poravafin)
		            select substr(codpre,1,'".$lonpro."'),nompre,'P','','','',to_date('".$fecini."','dd/mm/yyyy'),
		            to_date('".$feccul."', 'dd/mm/yyyy'),'','',
		            '','','','','','','','',to_date('".$fecultdat."','dd/mm/yyyy'),
		            '','','','','','','',1,'','','','','','','',0,'','','','',
		            '','','','','','','','','','','','',0,0,'',0,0
		            from cpdeftit where length(rtrim(codpre)) = ".$lonpro;

		            Herramientas::insertarRegistros($sql);
		            return "Proyectos y Acciones Centralizadas Creadas";

				}else if ($agrelinue = "A"){

		            $sql="insert into fordefpry (codpro,nompro,proacc,codsta,codsitpre,
		            conpoa,fecini,feccul,ubinac,codequ,codsubobj,codsubsubobj, objestnueeta,objestins,
		            objeesppro, indpro, enupro,indsitact,fecultdat,forind,fueind,indsitobj,
		            tieimp,respro,desmet,codunimedmet,cantmet,benpro,codejedes,codnucdes,codzoneco,
		            comindust,codsec,codsubsec,montotpry,codemp,nomemp,caremp,uniadsemp,
		            telemp, faxemp, emaemp, accotrins,obsaccotrins,conpryotr,obsconpryotr,conotrpry,
		            obsconotrpry,tipaccage,placontin,obsplacontin,nroempdir,nroempind,
		            desbrepry,poravafis,poravafin)
		            select substr(codpre,1,'".$lonpro."'),nompre,'P','','','',to_date('".$fecini."','dd/mm/yyyy'),
		            to_date('".$feccul."', 'dd/mm/yyyy'),'','',
		            '','','','','','','','',to_date('".$fecultdat."','dd/mm/yyyy'),
		            '','','','','','','',1,'','','','','','','',0,'','','','',
		            '','','','','','','','','','','','',0,0,'',0,0
		            from cpdeftit where length(rtrim(codpre)) = ".$lonpro."
		            and  substr(codpre,1,'".$lonpro."') not in (select substr(codpro,1,'".$lonpro."') from fordefpry ) ";

					Herramientas::insertarRegistros($sql);
					return "Proyectos y Acciones Centralizadas Agregados";
				}
			}else if (!empty($tabla) and ($tabla=='fordefaccesp')){
				if ($agrelinue = "T"){

					// NO sirvio con el criteria
					//$c=new Criteria();
					//FordefaccespPeer::doDelete($c);

					$sql="delete from fordefaccesp";
					Herramientas::insertarRegistros($sql);

                    $sql = "select substr(codpre,1,'".$lonpro."') as proyecto from cpdeftit where length(rtrim(codpre)) = '".$lonpro."'";

					if (Herramientas::BuscarDatos($sql,&$reg))
					{
						for ($i=0;$i<count($reg);$i++)
						{
							$sq11="insert into fordefaccesp (codpro, codaccesp,desaccesp,nomabraccesp)
							      select '".$reg[$i]['proyecto']."', substr(codpre,1,'".$lonacc."'),nompre,''
							      from cpdeftit where length(rtrim(codpre)) = '".$lonacc."' and substr(codpre, 1, '".$lonpro."') = '".$reg[$i]['proyecto']."'";
							Herramientas::insertarRegistros($sq11);

						}
					}
					return "Acciones Especificas Creadas";
		   		    unset($reg);


				}else if ($agrelinue = "A")
				{

                    $sql = "select substr(codpre,1,'".$lonpro."') as proyecto from cpdeftit where length(rtrim(codpre)) = '".$lonpro."'";
					if (Herramienta::BuscarDatos($sql,&$reg))
					{
						for ($i=0;$i<count($reg);$i++)
						{
							$sq11="insert into fordefaccesp (codpro, codaccesp,desaccesp,nomabraccesp)
							      select '".$reg[$i]['proyecto']."', substr(codpre,1,'".$lonacc."'),nompre,''
							      from cpdeftit where length(rtrim(codpre)) = '".$lonacc."' and substr(codpre, 1, '".$lonpro."') = '".$reg[$i]['proyecto']."'
							      and  substr(codpre,1,'".$lonacc."') not in (select substr(codaccesp,1,'".$lonacc."') from fordefaccesp )";
							//echo $sq11."<br>";
							Herramientas::insertarRegistros($sql);

						}

					}
					return "Acciones Especificas Agregadas";

				}
			}else if (!empty($tabla) and ($tabla=='fordefcatpre')){

//					$c=new Criteria();
//					$reg= FordefcatprePeer::doDelete($c);

					$sql="delete from fordefcatpre";
					Herramientas::insertarRegistros($sql);

                	$sql="insert into fordefcatpre (codcat,nomcat,descat,objsec,codemp)
			        select substr(codpre,1,'".$lonuae."'),nompre,nompre,'',''
			        from cpdeftit where length(rtrim(codpre)) = '".$lonuae."'";

			        //exit($sql. "  fordefcatpre");
					Herramientas::insertarRegistros($sql);
			         return "Unidades Ejecutoras Creadas";


			}else if (!empty($tabla) and ($tabla=='fordefparegr')){


//					$c=new Criteria();
//					$reg= FordefparegrPeer::doDelete($c);

					$sql="delete from fordefparegr";
					Herramientas::insertarRegistros($sql);




	                $sql="insert into fordefparegr
         				  select  codpar,nompar,id from nppartidas";

			        //exit($sql. "  fordefcatpre");
				Herramientas::insertarRegistros($sql);

			         //exit('1');
					return "Partidas de Egresos Creadas";



			}else if (!empty($tabla) and ($tabla=='cpasiini')){


				     $c = new Criteria();
				     $per= CpdefnivPeer::doSelectOne($c);
				     if (!$per)
				     {
				     	return "No se ha definido la fecha del periodo en la tabla cpdefniv";
				     }else{
						$ano = substr($per->getFecper(),0,4);
				        $perini = "00";
				        //$ano = "2007";
				        $activo = "A";

				        $c = new Criteria();
					    $per= CpdefnivPeer::doSelectOne($c);
					    if ($per){
					      $EstadoEtapa=$per->getEtadef();
					  	}else{ $EstadoEtapa='A'; }


						if ($EstadoEtapa=='A')
						{
							return "Etapa de Definicion Cerrada, Para Crear Asignaciones Iniciales la Etapa de Definicion debe Estar Abierta...";
						}elseif ($EstadoEtapa=='C')
						{
							if ($param=='eliminar_crear')
							{
								$sql="delete from cpasiini";
								Herramientas::insertarRegistros($sql);


	                    		$sql="INSERT INTO CPASIINI (
	                                              SELECT a.CODPRE,a.NOMPRE,'".$perini."','".$ano."',
	                                              B.MONPRE,0,0,0,0,0,0,0,0,0,B.MONPRE,0,'".$activo."'
	                                               FROM CPDEFTIT A, FORDETPRYACCESPMET B
	                                               Where rtrim(a.CodPre) = rtrim(B.CodPre))";

								Herramientas::insertarRegistros($sql);

	                   			$sq="INSERT INTO CPASIINI (
	                                              SELECT a.CODPRE,a.NOMPRE, B.PERPRE,'".$ano."',
	                                              B.MONPER,0,0,0,0,0,0,0,0,0,B.MONPER,0,'".$activo."'
	                                               FROM CPDEFTIT A, FORDISMONPREPRYACCMETUEA B
	                                               Where rtrim(a.CodPre) = rtrim(B.CodPre))";


								Herramientas::insertarRegistros($sql);

							}else if ($param=='modificar')
							{
	                           //Actualiza  a CPASIINI Tomando como Origen ForDetPryAccEspMet

								$c= new Criteria();
								$per=FordetpryaccespmetPeer::doselect($c);
								if ($per)
								{
									foreach ($per as $reg)
									{
	                                       $sql="update CpAsiIni Set MonAsi = '".$reg->getMonpre()."',  MonDis = '".$reg->getMonpre()."'  where
	                                       rtrim(CodPre) = '".$reg->getCodpre()."' And
	                                       PerPre = '".$perini."'";

									      //  exit($sql. "  while");
											Herramientas::insertarRegistros($sql);

									}

								}

								//Actualiza  a CPASIINI Tomando como Origen ForDisMonPrePryAccMetUEA
								$c=new Criteria();
								$c->addAscendingOrderByColumn(FordismonprepryaccmetueaPeer::CODPRE);
							    $c->addAscendingOrderByColumn(FordismonprepryaccmetueaPeer::PERPRE);
								$per=FordismonprepryaccmetueaPeer::doselect($c);

								if ($per)
								{
									foreach ($per as $reg)
									{
	                                       $sql="update CpAsiIni Set MonAsi = '".$reg->getMonper()."',  MonDis = '".$reg->getMonper()."'  where
	                                       rtrim(CodPre) = '".$reg->getCodpre()."' And
	                                       rtrim(perpre) = '".$reg->getPerpre()."'";
										   Herramientas::insertarRegistros($sql);

									}
								}


							}else if ($param=='crear')
							{
	                            $sql="INSERT INTO CPASIINI (
	                                          SELECT a.CODPRE,a.NOMPRE, '".$perini."','".$ano."',
	                                          B.MONPRE,0,0,0,0,0,0,0,0,0,B.MONPRE,0,'".$activo."'
	                                          FROM CPDEFTIT A, FORDETPRYACCESPMET B
	                                          Where RTrim(a.CodPre) = RTrim(B.CodPre))";

								Herramientas::insertarRegistros($sql);

	                            $sql="INSERT INTO CPASIINI (
	                                          SELECT a.CODPRE,a.NOMPRE, B.PERPRE,'".$ano."',
	                                          B.MONPER,0,0,0,0,0,0,0,0,0,B.MONPER,0,'".$activo."'
	                                          FROM CPDEFTIT A, FORDISMONPREPRYACCMETUEA B
	                                          Where RTrim(a.CodPre) = RTrim(B.CodPre))";
	  							Herramientas::insertarRegistros($sql);

							}
						}
						return "Partidas de Egresos Creadas";
				     }
			}
		}catch (Exception $Ex){
				exit($Ex);
				return 0;
		}

	}

    public static function BuscarDefiniciones(&$lonpro='', &$fecini='', &$feccul='', &$fecultdat='', &$lonacc='', &$lonsubacc='', &$lonuae='')
    {
	    $ano = date('Y');
	    $anoant = $ano - 1;
	    $fecini = "01/01/".$ano;
	    $feccul = "31/12/".$ano;
	    $fecultdat = "31/12/".$anoant;

		$c=new Criteria();
		$reg= FordefegrgenPeer::doSelectOne($c);

		if ($reg)  //Si tiene Datos
		{
	        $lonpro = $reg->getLonproacc();
	        $lonacc = $reg->getLonaccesp();
	        $lonsubacc = $reg->getLonsubaccesp();
	        $lonuae = $reg->getLonuae();

		}else{
	        $lonpro = 0;
	        $lonacc = 0;
	        $lonsubacc = 0;
	        $lonuae = 0;

		}
    }

}
?>