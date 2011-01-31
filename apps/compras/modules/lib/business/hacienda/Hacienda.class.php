<?php

/**
 * Hacienda: Clase estática para el manejo la hacienda municipal
 *
 * @package    Roraima
 * @subpackage hacienda
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Hacienda {
	/* Funcion general del negocio
	 * 1 izquierda
	 * 2 intermedio
	 * 3 derecha
	 * aqui se hacen todos los procesos
	 */
	public static function Obtener_mes($ano, & $valor_mes)
	/*Funcion utilizada para traer valor del mes por año*/ {

		$result = array ();
		$valor_mes = array ();
		$sql = "Select tasano,tasmes,taspor From Fctasban Where tasano='" . $ano . "' order by tasmes";
		if (Herramientas :: BuscarDatos($sql, & $result)) {
			$i = 0;
			$msg = '';
			$cancotpril = count($result);
			while ($i < count($result)) {
				$valor_mes[$i] = $result[$i]['taspor'];
				$i++;
			}
			return true;
		} else {
			return false;
		}
	}

	public static function salvar_grid_DefDesc($fcdefdesc, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			if ($x[$j]->getDiashasta() != "") {
				$x[$j]->setCoddes($fcdefdesc->getCoddes());
				$x[$j]->save();
			}
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcdefrecdes($fcdefdesc, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setCoddes($fcdefdesc->getCoddes());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcdefsol($fctipsol, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setCodsol($fctipsol->getCodtip());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcdefrecint($fcdefrecint, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			if ($x[$j]->getDiashasta() != "") {
				$x[$j]->setCodrec($fcdefrecint->getCodrec());
				$x[$j]->save();
			}
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_gridb_Fcdefrecint($fcdefrecint, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setCodrec($fcdefrecint->getCodrec());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcmultas($fcmultas, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			if ($x[$j]->getDiashasta() != "") {
				$x[$j]->setCodmul($fcmultas->getCodmul());
				$x[$j]->save();
			}
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_gridb_Fcmultas($fcmultas, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setCodmul($fcmultas->getCodmul());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcdefpgi($fcdefpgi, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcaputip($fctipapu, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setTipapu($fctipapu->getTipapu());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcprotip($fctippro, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setTippro($fctippro->getTippro());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcesptip($fctipesp, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setTipesp($fctipesp->getTipesp());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Fcranpaginm($fcvalinm, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setCodzon($fcvalinm->getCodzon());
			$x[$j]->setDeszon($fcvalinm->getDeszon());
			$x[$j]->setAnovig($fcvalinm->getAnovig());
			$x[$j]->setValmtr($fcvalinm->getValmtr());
			$x[$j]->setPorvalfis($fcvalinm->getPorvalfis());
			$x[$j]->setValfis($fcvalinm->getValfis());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function salvar_grid_Facdefdprinm($fcdprinm, $grid) {
		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setAnovig($fcdprinm->getAnovig());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}
	}

	public static function Cargar_mascara() {
		$result = array ();
		$sql = "Select " .
		"codpar,codmun,codedo,codpai,numniv,nomext1,nomabr1,tamano1,nomext2," .
		"nomabr2,tamano2,nomext3,nomabr3,tamano3,nomext4,nomabr4," .
		"tamano4,nomext5,nomabr5,tamano5,nomext6,nomabr6,tamano6,nomext7," .
		"nomabr7,tamano7,nomext8,nomabr8,tamano8,nomext9,nomabr9,tamano9," .
		"nomext10,nomabr10,tamano10,nivinm,numper,denumper" .
		" from FCDefNca";
		$campos = array (
			0 => "codpar",
			1 => "codmun",
			2 => "codedo",
			3 => "codpai",
			4 => "numniv",
			5 => "nomext1",
			6 => "nomabr1",
			7 => "tamano1",
			8 => "nomext2",
			9 => "nomabr2",
			10 => "tamano2",
			11 => "nomext3",
			12 => "nomabr3",
			13 => "tamano3",
			14 => "nomext4",
			15 => "nomabr4",
			16 => "tamano4",
			17 => "nomext5",
			18 => "nomabr5",
			19 => "tamano5",
			20 => "nomext6",
			21 => "nomabr6",
			22 => "tamano6",
			23 => "nomext7",
			24 => "nomabr7",
			25 => "tamano7",
			26 => "nomext8",
			27 => "nomabr8",
			28 => "tamano8",
			29 => "nomext9",
			30 => "nomabr9",
			31 => "tamano9",
			32 => "nomext10",
			33 => "nomabr10",
			34 => "tamano10",
			35 => "nivinm",
			36 => "numper",
			37 => "denumper"
		);
		if (Herramientas :: BuscarDatos($sql, & $result)) {
			$formatostring = $result[0]['nomabr1'];
			$formatopre = str_pad("", $result[0]['tamano1'], '#', STR_PAD_LEFT);
			$valor = $result[0]['numniv'];
			for ($i = 1; $i <= ((($valor +1) * 3) - 6); $i++) {
				$formatostring = $formatostring . "-" . $result[0][$campos[$i +8]];
				$formatopre = $formatopre . "-" . str_pad("", $result[0][$campos[$i +9]], "#", STR_PAD_LEFT);
				$i = $i +2;
			}

			return $formatopre;
		} else
			return "El Formato de los catastros no existe";
	}

	public static function salvar_grid_Facdatcon($fcconrep, $grid) {
	try{

		$x = $grid[0];
		$j = 0;
		while ($j < count($x)) {
			$x[$j]->setRifcon($fcconrep->getRifcon());
			$x[$j]->save();
			$j++;
		}
		$z = $grid[1];
		$j = 0;
		while ($j < count($z)) {
			$z[$j]->delete();
			$j++;
		}

		return -1;

	} catch (Exception $ex) {
		return 0;
	}

	}

	public static function Combo_parroquia_Facdatcon($fcconrep) {
		$result = array ();
		$arreglo = array ();
		$sql = "Select d.CodPar as CodParroquia, a.CodMun as CodMunicipio,a.CodEdo as CodEstado,a.CodPai as CodPais, d.NomPar as NombreParroquia, a.NomMun as NombreMunicipio,b.NomEdo  as NombreEstado, c.NomPai as NombrePais From FCParroq d,FCMunici a, FCEstado b, FCPais c where d.CodMun=a.CodMun and d.CodEdo=b.CodEdo and a.CodEdo=b.CodEdo and a.CodPai=b.CodPai  and b.CodPai=c.CodPai and c.CodPai=d.CodPai ORDER BY d.CodPai,d.CodEdo,d.CodMun,d.CodPar";
		if (Herramientas :: BuscarDatos($sql, & $result)) {
			$i = 0;
			while ($i < count($result)) {
				$cadena_valor = $result[$i]['codparroquia'] . '-' . $result[$i]['codmunicipio'] . '-' . $result[$i]['codestado'] . '-' . $result[$i]['codpais'];
				$cadena_texto = $result[$i]['nombreparroquia'] . '-' . $result[$i]['nombremunicipio'] . '-' . $result[$i]['nombreestado'] . '-' . $result[$i]['nombrepais'];
				$arreglo += array (
					$cadena_valor => $cadena_texto
				);
				$i++;
			}
		}
		return $arreglo;
	}

	public static function Grabar_Anteriores($fcsollic) {
		$fcmodlic_new = new Fcmodlic();
		$fcmodlic_new->setRefmod($fcsollic->getIdlic());
		$fcmodlic_new->setFecmod($fcsollic->getFechlic());
		$fcmodlic_new->setMotmod($fcsollic->getComnlic());
		$fcmodlic_new->setNumsol($fcsollic->getNumsol());
		$fcmodlic_new->setNumlic($fcsollic->getNumsol());
		$fcmodlic_new->setFecsol($fcsollic->getFecsol());
		$fcmodlic_new->setFeclic($fcsollic->getFecsol());
		$fcmodlic_new->setRifcon($fcsollic->getRifcon());
		$fcmodlic_new->setNomcon($fcsollic->getNomcon());
		$fcmodlic_new->setDircon($fcsollic->getDircon());
		$fcmodlic_new->setRifrep($fcsollic->getRifrep());
		$fcmodlic_new->setNomneg($fcsollic->getNomneg());
		$fcmodlic_new->setTipinm($fcsollic->getTipinm());
		$fcmodlic_new->setTipest($fcsollic->getTipest());
		$fcmodlic_new->setCatcon($fcsollic->getCatcon());
		$fcmodlic_new->setDirpri($fcsollic->getDirpri());
		$fcmodlic_new->setCodrut($fcsollic->getCodrut());
		$fcmodlic_new->setCapsoc($fcsollic->getCapsoc());
		if ($fcsollic->getHorini() != '')
			$fcmodlic_new->setHorini($fcsollic->getHorini());
		else
			$fcmodlic_new->setHorini("08:00:00 AM");
		if ($fcsollic->getHorcie() != '')
			$fcmodlic_new->setHorcie($fcsollic->getHorcie());
		else
			$fcmodlic_new->setHorcie("06:00:00 PM");
		$fcmodlic_new->setFecini($fcsollic->getFecini());
		$fcmodlic_new->setFecfin($fcsollic->getFecfin());
		$fcmodlic_new->setDiscli($fcsollic->getDiscli());
		$fcmodlic_new->setDisbar($fcsollic->getDisbar());
		$fcmodlic_new->setDisdis($fcsollic->getDisdis());
		$fcmodlic_new->setDisins($fcsollic->getDisins());
		$fcmodlic_new->setDisfun($fcsollic->getDisfun());
		$fcmodlic_new->setDisest($fcsollic->getDisest());
		$fcmodlic_new->setFunres($fcsollic->getFunres());
		$fcmodlic_new->setFecres($fcsollic->getFecres());
		$fcmodlic_new->setTaslic(0);
		$fcmodlic_new->setDeuacl(0);
		$fcmodlic_new->setImplic(0);
		$fcmodlic_new->setDeuacp(0);
		if ($fcsollic->getId() == '') {
			$fcmodlic_new->setStasol("P");
			$fcmodlic_new->setStalic("V");
			$fcmodlic_new->setStadec("N");
			$fcmodlic_new->setStaliq("N");
		}
		$fcmodlic_new->save();
		return true;
	}

	public static function Salvarneg($fcsollic) {
		$correlativo = "";
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMSOL, $fcsollic->getNumsol());
		$fcsollic_up = FcsollicPeer :: doSelectOne($c);
		if (count($fcsollic_up) > 0) {
			$fcsollic_up->setStasol("N");
			$fcsollic_up->save();
		}
		$c = new Criteria();
		$c->addDescendingOrderByColumn(FcsolnegPeer :: NUMNEG);
		$reg = FcsolnegPeer :: doSelectOne($c);
		if (count($reg) > 0)
			$correlativo = str_pad(trim($reg->getNumneg() + 1), 10, '0', STR_PAD_LEFT);
		else
			$correlativo = str_pad(1, 10, '0', STR_PAD_LEFT);
		$fcsolneg_new = new Fcsolneg();
		$fcsolneg_new->setNumsol($fcsollic->getNumsol());
		$fcsolneg_new->setNumneg($correlativo);
		$fcsolneg_new->setResolu($fcsollic->getResolu());
		$fcsolneg_new->setFunneg($fcsollic->getFunneg());
		$fcsolneg_new->setTomon($fcsollic->getTomon());
		$fcsolneg_new->setNumeron($fcsollic->getNumeron());
		$fcsolneg_new->setFolion($fcsollic->getFolion());
		$fcsolneg_new->setMotneg($fcsollic->getMotneg());
		$fcsolneg_new->setFecneg($fcsollic->getFecneg());
		$fcsolneg_new->save();
		return true;
	}

	public static function salvar_grid_Fcsollic($fcsollic, $grid) {
		try {

			$x = $grid[0];
			$j = 0;
			while ($j < count($x)) {
				$x[$j]->setNumdoc($fcsollic->getNumsol());
				$x[$j]->save();
				$j++;
			}
			$z = $grid[1];
			$j = 0;
			while ($j < count($z)) {
				$z[$j]->delete();
				$j++;
			}

			return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}

	public static function Listlic() {
		$c = new Criteria();
		$lista = FctiplicPeer :: doSelect($c);
		$modulos = array ();
		foreach ($lista as $arr) {
			$modulos += array (
			$arr->getCodtiplic() => $arr->getDestiplic());
		}
		return $modulos;
	}

	public static function Grabar_Facpiclic($fcsollic) {
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMSOL, $fcsollic->getNumsol());
		$fcsollic_up = FcsollicPeer :: doSelectOne($c);
		if (count($fcsollic_up) > 0) {
			$fcsollic_up->setImplic($fcsollic->getImplic());
			$fcsollic_up->setTomo($fcsollic->getTomo());
			$fcsollic_up->setFolio($fcsollic->getFolio());
			$fcsollic_up->setNumero($fcsollic->getNumero());
			$fcsollic_up->setFecapr($fcsollic->getFecapr());
			$fcsollic_up->setFecven($fcsollic->getFecven());
			$fcsollic_up->setFecinilic($fcsollic->getFecinilic());
			$fcsollic_up->setStasol("A");
			$fcsollic_up->setNumlic($fcsollic->getNumlic());
			$fcsollic_up->setFunrel($fcsollic->getFunrel());
			$fcsollic_up->setCodtiplic($fcsollic->getCodtiplic());
			$fcsollic_up->save();
		}
		return -1;
	}

	public static function Grabar_Facpiclic_Suspencion_Cancelacion($fcsollic) {
		try {
			$correlativo = "";
			$c = new Criteria();
			$c->add(FcsollicPeer :: NUMSOL, $fcsollic->getNumsol());
			$fcsollic_up = FcsollicPeer :: doSelectOne($c);
			if (count($fcsollic_up) > 0) {
				/*ACTUALIZAMOS FCSOLLIC*/
				$fcsollic_up->setStalic($fcsollic->getOperacion());
				$fcsollic_up->save();
				/*FIN ACTUALIZAR */
				$c = new Criteria();
				$c->addDescendingOrderByColumn(FcsuscanPeer :: NUMSUS);
				$reg = FcsuscanPeer :: doSelectOne($c);
				if (count($reg) > 0)
					$correlativo = str_pad(trim($reg->getNumsus() + 1), 10, '0', STR_PAD_LEFT);
				else
					$correlativo = str_pad(1, 10, '0', STR_PAD_LEFT);
				$fcsuscan_new = new Fcsuscan();
				$fcsuscan_new->setNumsus($correlativo);
				$fcsuscan_new->setNumsol($fcsollic->getNumsol());
				$fcsuscan_new->setNumlic($fcsollic->getNumlic());
				$fcsuscan_new->setFunsus($fcsollic->getFunsus());
				$fcsuscan_new->setTomo($fcsollic->getSolsus());
				$fcsuscan_new->setNumero($fcsollic->getActsus());
				$fcsuscan_new->setFolio($fcsollic->getFolsus());
				$fcsuscan_new->setResolu($fcsollic->getResolsus());
				$fcsuscan_new->setMotsus($fcsollic->getMotsus());
				$fcsuscan_new->setFecsus($fcsollic->getFecsus());
				$fcsuscan_new->setEstlic($fcsollic->getOperacion());

				$fcsuscan_new->save();
			}

			return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}

	public static function Grabar_Reactivar($fcsollic) {
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMLIC, $fcsollic->getNumlic());
		$fcsollic_up = FcsollicPeer :: doSelectOne($c);
		if (count($fcsollic_up) > 0) {
			$fcsollic_up->setStalic("V");
			$fcsollic_up->save();
		}
		return -1;
	}

	public static function Grabar_Renovar($fcsollic) {
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMLIC, $fcsollic->getNumlic());
		$fcsollic_up = FcsollicPeer :: doSelectOne($c);
		if (count($fcsollic_up) > 0) {
			$fcsollic_up->setStalic("V");
			$fcsollic_up->setFecini("01/01/" . date("Y"));
			$fcsollic_up->setFecfin("31/12/" . date("Y"));
			$fcsollic_up->setFecapr($fcsollic_up->getFecapr());
			$fcsollic_up->setFecven($fcsollic_up->getFecven());
			$fcsollic_up->save();
			$fcrenlic_new = new Fcrenlic();
			$fcrenlic_new->setNumlic($fcsollic->getNumlic());
			$fcrenlic_new->setFecven($fcsollic->getFecven());
			$fcrenlic_new->setFecren(date("d/m/Y"));
			$fcrenlic_new->save();
		}
		return -1;
	}

	public static function SalvarFacpicsollic($fcsollic, $grid) {
		try {
			$correlativo = '';
			if ($fcsollic->getId() == '') {
				$fcsollic->setNumsol(str_replace('#', '0', $fcsollic->getNumsol()));
				$fcsollic->setNumsol(str_pad(trim($fcsollic->getNumsol() + 1), 12, '0', STR_PAD_LEFT));

				$c = new Criteria();
				$c->add(FcsollicPeer :: NUMSOL, $fcsollic->getNumsol());
				$countreg = FcsollicPeer :: doSelectOne($c);

				if (count($countreg) <= 0)
					$correlativo = $fcsollic->getNumsol();
				else {
					$c = new Criteria();
					$c->addDescendingOrderByColumn(FcsollicPeer :: NUMSOL);
					$reg = FcsollicPeer :: doSelectOne($c);
					if (count($reg) > 0) {
						$correlativo = str_pad(trim($reg->getNumsol() + 1), 12, '0', STR_PAD_LEFT);
					}
				}
				$fcsollic->setNumsol($correlativo);
				$fcsollic->setStasol('P');
				$fcsollic->setStalic('V');
				$fcsollic->setStadec('N');
				$fcsollic->setStaliq('N');
			} else {
				if ($fcsollic->getLicmodificada() == 'I')
					Hacienda :: Grabar_Anteriores($fcsollic);
				if ($fcsollic->getLicnegada() == 'I')
					Hacienda :: Salvarneg($fcsollic);
			}
			$fcsollic->setFeclic($fcsollic->getFecsol());
			$fcsollic->setTaslic(0);
			$fcsollic->setDeuacl(0);
			$fcsollic->setImplic(0);
			$fcsollic->setDeuacp(0);
			$fcsollic->save();

			return Hacienda :: salvar_grid_Fcsollic($fcsollic, $grid);

		} catch (Exception $ex) {
			return 0;
		}

	}

	public static function SalvarFacinmreg($clasemodelo, $gridAvaluo, $gridComplemento) {
	try{
	          	if ($clasemodelo->getNroinm() == '###############') {

			       if (Herramientas::getVerCorrelativo('nroinm','fcreginm',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 15, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcreginmPeer::NROINM,$numero);
			          $resul= FcreginmPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }
			         $clasemodelo->setNroinm($numero);
			      }
			     H::getSalvarCorrelativo('numpag','fcpagos','numpag',$r,&$msg);
			    }
			    else
			    {
			       $clasemodelo->setNroinm(str_replace('#','0',$clasemodelo->getNroinm()));
			    }


		$clasemodelo->setDircon(H :: getX('rifcon', 'Fcconrep', 'dircon', $clasemodelo->getRifcon()));
		$clasemodelo->setFecrec(date('Y-m-d'));
		$clasemodelo->setEstinm('A');
		$clasemodelo->setEstdec('N');
		$clasemodelo->setCoduso($clasemodelo->getCodusoinm());
		//H::printR($clasemodelo);
		//exit();
		$clasemodelo->save();

		$error = self::SalvarInmuebleDetalles($clasemodelo,$gridComplemento);  //SalvarInmuebleDetalles
		if ($clasemodelo->getTraspaso()=='S')	self::RegistrarCambios($clasemodelo);


		return $error;

		} catch (Exception $ex) {
			return 0;
		}
	}

	public static function RegistrarCambios($clasemodelo) {

		$c = new Fctrainm();
		$c->setNumtra($clasemodelo->getNumtra());
		$c->setNroinm($clasemodelo->getNroinm());
		$c->setFectra($clasemodelo->getFectra());
		$c->setRifcon($clasemodelo->getRifcon());
		$c->setRifrep($clasemodelo->getRifrep());
		$c->setRifconant($clasemodelo->getRifconant());
		$c->setRifrepant($clasemodelo->getRifrepant());
		$c->setFunrec($clasemodelo->getFunrec());
		$c->save();
	}

	public static function SalvarInmuebleDetalles($clasemodelo, $grid) {
		try{
			$x = $grid[0];
			$j = 0;
			while ($j < count($x)) {
				$x[$j]->setNroinm($clasemodelo->getNroinm());
				$x[$j]->setCodest($clasemodelo->getCodestinm());
				$x[$j]->setAnoava($clasemodelo->getAnoava());
				$x[$j]->setCodzon($clasemodelo->getCodzon());
				$x[$j]->save();
			H::printR($x[$j]);
			//exit();

				$j++;
			}
			$z = $grid[1];
			$j = 0;
			while ($j < count($z)) {
				$z[$j]->delete();
				$j++;
			}

			return -1;

		} catch (Exception $ex) {
			echo $ex;
			exit();
			return 0;
		}
	}

	public static function validarFacpicliq($clasemodelo, $gridacteco) {
		$x = $gridacteco[0];
		$j = 0;
		while ($j < count($x)) {
			$c = new Criteria();
			$c->add(FcactcomPeer :: CODACT, $x[$j]->getCodact());
			$c->add(FcactcomPeer :: ANOACT, $x[$j]->getAnodec());
			$fcactcom = FcactcomPeer :: doselectone($c);

			if ($fcactcom) {
				return $error = 707;
			}
			$j++;
		}

		return -1;
	}

	public static function validarFacpicliq2($clasemodelo) {
		$c = new Criteria();
		$c->add(FcdeclarPeer :: NUMREF, $clasemodelo->getNumref());
		$c->add(FcdeclarPeer :: MODO, $clasemodelo->getNumref());
		$c->add(FcdeclarPeer :: ANODEC, $clasemodelo->getNumref());
		$fcactcom = FcactcomPeer :: doselectone($c);

		if ($fcactcom) {
			return $error = 707;
		}

	}

	public static function salvarFacpicliq($clasemodelo, $gridActCom, $gridDisDeu) {
		self :: ActualizacionSolicitud($clasemodelo, $gridActCom, $gridDisDeu);
		self :: Declaracion($clasemodelo, $gridActCom, $gridDisDeu); //GENERAMOS EL NUMERO DE DECLARACION
	}

	public static function Declaracion($clasemodelo, $gridActCom, $gridDisDeu) {
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMREF, $clasemodelo->getNumref());
		$fcactcom = FcsollicPeer :: doselectone($c);

		if ($fcactcom) {
			$fcactcom->setStadec('D');
			$fcactcom->save();
		}

		return -1;

	}

	public static function ActualizacionSolicitud($clasemodelo, $gridActCom, $gridDisDeu) {
		$c = new Criteria();
		$c->add(FcsollicPeer :: NUMREF, $clasemodelo->getNumref());
		$fcactcom = FcsollicPeer :: doselectone($c);

		if ($fcactcom) {
			$fcactcom->setStadec('D');
			$fcactcom->save();
		}
		return -1;
	}

	public static function CalcularMora($modeloclase='') {
		try{
		/*
		 * 		$c = new Criteria();
		$c->add(FcdeclarPeer :: RIFCON, 'J%', Criteria :: LIKE);
		$c->add(FcdeclarPeer :: CONPAG, 'S', Criteria :: NOT_EQUAL);

		$opc1 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'P', Criteria :: NOT_EQUAL);
		$opc2 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'X', Criteria :: NOT_EQUAL);
		$opc1->addAnd($opc2);
		$c->add($opc1);

		$sql = "FUEING IN (SELECT CODFUEGEN FROM FCFUENTESREC)";
		$c->add(FcvalinmPeer :: CODTIP, $sql, Criteria :: CUSTOM);

		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMREF);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: TIPO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMERO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMDEC);

		 *
		 * SELECT fcdeclar.NUMDEC, fcdeclar.FECVEN, fcdeclar.FUEING, fcdeclar.FECDEC,
fcdeclar.RIFCON, fcdeclar.TIPO, fcdeclar.NUMREF, fcdeclar.NOMBRE, fcdeclar.MONDEC,
fcdeclar.EDODEC, fcdeclar.MORA, fcdeclar.PRONTOPG, fcdeclar.AUTLIQ,
fcdeclar.FUNDEC, fcdeclar.CODREC, fcdeclar.MODO, fcdeclar.NUMERO,
fcdeclar.CONPAG, fcdeclar.MONABO, fcdeclar.NUMABO, fcdeclar.NOMCON,
 fcdeclar.OTRO, fcdeclar.MIGINC, fcdeclar.ANODEC, fcdeclar.FECULTPAG,
fcdeclar.FECINI, fcdeclar.FECCIE, fcdeclar.ID, UPPER(fcdeclar.NUMREF),
 UPPER(fcdeclar.TIPO), UPPER(fcdeclar.NUMERO), UPPER(fcdeclar.NUMDEC) FROM
 fcdeclar, fcvalinm WHERE
fcdeclar.RIFCON like 'J31%' AND
fcdeclar.CONPAG<>'S'
AND (fcdeclar.EDODEC<>'P' AND fcdeclar.EDODEC<>'X')
AND FUEING IN (SELECT CODFUEGEN FROM FCFUENTESREC)
ORDER BY UPPER(fcdeclar.NUMREF) ASC,fcdeclar.FECVEN ASC,UPPER(fcdeclar.TIPO) ASC,UPPER(fcdeclar.NUMERO) ASC,UPPER(fcdeclar.NUMDEC) ASC  limit 3

		*
		*/

		$sql = "delete from FCDECLAR where RifCon='".$modeloclase->getRifcon()."' AND EDODEC<>'P' And EdoDec<>'X' and ConPag<>'S' and FUEING IN (SELECT CODFUEGEN FROM FCFUENTESREC)";
        Herramientas::insertarRegistros($sql);

///NO SIRVIO EL DISTINCT A FUEING POR ESO HICE EL SQL
/*
		$c = new Criteria();
		$c->add(FcdeclarPeer :: RIFCON, $modeloclase->getRifcon());
		$opc1 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'P', Criteria :: NOT_EQUAL);
		$opc2 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'X', Criteria :: NOT_EQUAL);
		$opc1->addAnd($opc2);
		$c->add($opc1);
        //$c->setDistinct();
		$reg = FcdeclarPeer :: doSelect($c);
*/

		$dateFormat = new sfDateFormat('es_VE');
		$feccor = $dateFormat->format($modeloclase->getFeccor(), 'i', $dateFormat->getInputPattern('d'));
//0014455186

		$sql="select Distinct(FueIng) as fueing from FCDeclar where RifCon='".$modeloclase->getRifcon()."' AND EDODEC<>'P' And EdoDec<>'X'";

        if(H::BuscarDatos($sql,&$per)){

	    $ii=0;
        while ($ii<count($per))
        {
//		foreach ($reg as $per)
	//	{
		 	$c = new Criteria();
			$c->add(FcdeclarPeer :: RIFCON, $modeloclase->getRifcon());
			$c->add(FcdeclarPeer :: FUEING, $per[$ii]["fueing"]);
			$c->add(FcdeclarPeer :: CONPAG, 'S', Criteria :: NOT_EQUAL);
			$c->add(FcdeclarPeer :: FECVEN, $feccor, Criteria :: LESS_THAN);

			$opc1 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'P', Criteria :: NOT_EQUAL);
			$opc2 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'X', Criteria :: NOT_EQUAL);
			$opc1->addAnd($opc2);
			$c->add($opc1);

			$sql = "FUEING NOT IN (SELECT CODFUEGEN FROM FCFUENTESREC)";
			$c->add(FcdeclarPeer :: FUEING, $sql, Criteria :: CUSTOM);

			$c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
		    $datos = FcdeclarPeer :: doSelect($c);

         	$MoraAcum = 0;
         	$InteresAcum = 0;
         	$Declaraciones = 0;

			foreach ($datos as $per)
			{
				if ($per->getMondec() >= 0){
                  //VAMOS A BUSCAR LA ULTIMA FECHA DE PAGO DE LOS INTERESES,
                  //YA QUE SE ESTA PERMITIENDO PAGAR INTERESES SIN DEUDAS

				  $fecven = substr($per->getFecven(),8,2)."-".substr($per->getFecven(),5,2)."-".substr($per->getFecven(),0,4);
                  $fecven= H::dateAdd('d',1,$fecven,'+');
                  $sql = "SELECT COUNT(FECULTPAG) as CUANTOS,MAX(FECULTPAG) as FECULTPAG FROM FCDECLAR A,FCFUENTESREC B
                        WHERE A.RIFCON='".$per->getRifcon()."'
                        AND A.FECVEN=$fecven
                        AND A.FECDEC='".$per->getFecdec()."'
                        AND A.NUMREF='".$per->getNumref()."'
                        AND A.NUMERO='".$per->getNumero()."'
                        AND A.EDODEC='P'
                        AND A.FUEING=B.CODFUEGEN
                        AND B.CODFUE='".$per->getFueing()."'" ;

                        if(H::BuscarDatos($sql,&$regs)){
		                     if ($regs[0]['fecultpag'] != "" ){
		                        $UltimaFecha = $regs[0]['fecultpag'];
		                        $DeclarGen = $regs[0]['cuantos'] + substr($per->getNumdec(), strlen($regs[0]['cuantos']) + 1, 10 - strlen($regs[0]['cuantos']));
		                     }else{
		                        $UltimaFecha = $per->getFecven();
		                        $DeclarGen = $per->getNumdec();
		                     }

		                  }else{
		                        $UltimaFecha = $per->getFecven();
		                        $DeclarGen = $per->getNumdec();
                        }

                        //H::DateDiff("yyyy", $fecing, date("Y-m-d"));

                          $DiasMora = H::DateDiff("D", $UltimaFecha, $feccor);
		                  $ValordeDeuda = $per->getMondec() - $per->getAutliq();

		                  $sql = "Select A.*,B.*,C.*,D.Nomabr,(case when A.Modo='T' then -1 else coalesce(Valor,0) end) as Tasa From FCFuentesRec B, FcFuePre D, FCDefRecInt A LEFT OUTER JOIN FcRangosRec C ON (A.Codrec=C.CodRec)
                        		 Where A.CodRec = B.CodRec
                        		and B.CodFue='".$per->getFueing()."' and B.CodFueGen=D.CodFue
                        		And coalesce(C.DiasDesde,0)<=(case when A.Modo='T' then 0 else $DiasMora end)
                        		And coalesce(C.DiasHasta,0)>=(case when A.Modo='T' then 0 else $DiasMora end)" ;

	                        if(H::BuscarDatos($sql,&$regs)){

						       $i=0;
						       while ($i<count($regs))
						       {
			                        $ValordeMora = 0;
			                        $ValordeINT  = 0;
			                        $LaFuente    = $regs[$i]['codfuegen'];
			                        $ElTipo      = $regs[$i]['nomabr'];
			                        $PorcMora    = $regs[$i]['tasa'];

			                        if ($regs[$i]['tipo'] == "R"){
			                           if ($regs[$i]['modo'] == "M"){
			                              $ValordeMora = $regs[$i]['valor'];
			                           }else{
			                              $ValordeMora = self::MontodeMoraFijo($ValordeDeuda, $DiasMora, $UltimaFecha, $PorcMora, $regs[$i]['periodo'], $regs[$i]['promedio'], $feccor);
			                           }

			                        }else{

			                           if ($regs[$i]['modo'] == "M"){
			                              $ValordeINT = $regs[$i]['valor'];
			                           }else{
			                              $ValordeINT = self::MontodeInteresFijo($ValordeDeuda, $DiasMora, $UltimaFecha, $PorcMora, $regs[$i]['periodo'], $regs[$i]['promedio'], $feccor);
			                           }
			                        }

			                        $MoraAcum = $MoraAcum + $ValordeMora;
			                        $InteresAcum = $InteresAcum + $ValordeINT;
			                        if (round($ValordeMora, 2) <> 0 ){
			                           if (self::Generar_Mora($per, $ValordeMora, $ElTipo, $LaFuente, $DeclarGen)== 0 ) return 0;
						       		}
			                        if (Round($ValordeINT, 2) <> 0 ){
			                           if (self::Generar_Interes($per, $ValordeINT, $ElTipo, $LaFuente, $DeclarGen) == 0) return 0;
			                        }
						       		$i++;
						       }


	                        }
					}
				$per->getMora($MoraAcum + round($InteresAcum, 2  ));
				$per->save();
             }
		$ii++;
		}
        }
        return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}


	public static function Generar_Mora($Declaraciones, $Monto, $Tipo, $Fuente, $DeclarGen)
	{
		try{
		   $sql = "Select * From FcDeclar Where NumRef='".$Declaraciones->getNumRef()."' and NumDec='".$Declaraciones->getNumDec()."' and coalesce(Numero,' ')='".$Declaraciones->getNumero()."' and FueIng='".$Fuente."'";
          if(H::BuscarDatos($sql,&$regs)){
		      $fcdeclar = new Fcdeclar();
		      $fcdeclar->setNumDec($DeclarGen);
		      $fcdeclar->setNumero($Declaraciones->getNumero());
		      $fcdeclar->setFecVen(H::DateAdd("d", 1, $Declaraciones->getFecVen(),'+'));
		      $fcdeclar->setFueing($Fuente);
		      $fcdeclar->setFecDec($Declaraciones->getFecDec());
		      $fcdeclar->setRifCon($Declaraciones->getRifCon());
		      $fcdeclar->setTipo($Tipo);
		      $fcdeclar->setNumRef($Declaraciones->getNumRef());
		      $fcdeclar->setNombre("RECARGO POR MORA " .$Declaraciones->getNombre());
		      $fcdeclar->setMonDec($Monto);
		      $fcdeclar->setEdoDec("V");
		      $fcdeclar->setmora(0);
		      $fcdeclar->setProntoPg(0);
		      $fcdeclar->setAutLiq(0);
		      $fcdeclar->setFundec($Declaraciones->getFundec());
		      $fcdeclar->setNomCon($Declaraciones->getNomCon());
		      $fcdeclar->setAnoDec($Declaraciones->getAnoDec());
		      $fcdeclar->setOtro($Declaraciones->getOtro());
		      $fcdeclar->save();

          }else{
			      $fcdeclar = new Fcdeclar();
			      $fcdeclar->setNumDec($DeclarGen);
			      $fcdeclar->setNumero($Declaraciones->getNumero());
			      $fcdeclar->setFecVen(H::DateAdd("d", 1, $Declaraciones->getFecVen(),'+'));
			      $fcdeclar->setFueing($Fuente);
			      $fcdeclar->setFecDec($Declaraciones->getFecDec());
			      $fcdeclar->setRifCon($Declaraciones->getRifCon());
			      $fcdeclar->setTipo($Tipo);
			      $fcdeclar->setNumRef($Declaraciones->getNumRef());
			      $fcdeclar->setNombre("RECARGO POR MORA " . $Declaraciones->getNombre());
			      $fcdeclar->setMonDec($Monto);
			      $fcdeclar->setEdoDec("V");
			      $fcdeclar->setmora(0);
			      $fcdeclar->setProntoPg(0);
			      $fcdeclar->setAutLiq(0);
			      $fcdeclar->setFundec($Declaraciones->getFundec());
			      $fcdeclar->setNomCon($Declaraciones->getNomCon());
			      $fcdeclar->setAnoDec($Declaraciones->getAnoDec());
			      $fcdeclar->setOtro($Declaraciones->getOtro());
			      $fcdeclar->save();
		  }

		  return -1;

		} catch (Exception $ex) {
			return 0;
		}


	}



	public static function Generar_Interes($Declaraciones, $Monto, $Tipo, $Fuente, $DeclarGen)
	{
		try{
		   $sql = "Select * From FcDeclar Where NumRef='".$Declaraciones->getNumRef()."' and NumDec='".$Declaraciones->getNumDec()."' and coalesce(Numero,' ')='".$Declaraciones->getNumero()."' and FueIng='".$Fuente."'";
          if(H::BuscarDatos($sql,&$regs)){
		      $fcdeclar = new Fcdeclar();
		      $fcdeclar->setNumDec($DeclarGen);
		      $fcdeclar->setNumero($Declaraciones->getNumero());
		      $fcdeclar->setFecVen(H::DateAdd("d", 1, $Declaraciones->getFecVen(),'+'));
		      $fcdeclar->setFueing($Fuente);
		      $fcdeclar->setFecDec($Declaraciones->getFecDec());
		      $fcdeclar->setRifCon($Declaraciones->getRifCon());
		      $fcdeclar->setTipo($Tipo);
		      $fcdeclar->setNumRef($Declaraciones->getNumRef());
		      $fcdeclar->setNombre("INTERESES POR MORA " .$Declaraciones->getNombre());
		      $fcdeclar->setMonDec($Monto);
		      $fcdeclar->setEdoDec("V");
		      $fcdeclar->setmora(0);
		      $fcdeclar->setProntoPg(0);
		      $fcdeclar->setAutLiq(0);
		      $fcdeclar->setFundec($Declaraciones->getFundec());
		      $fcdeclar->setNomCon($Declaraciones->getNomCon());
		      $fcdeclar->setAnoDec($Declaraciones->getAnoDec());
		      $fcdeclar->setOtro($Declaraciones->getOtro());
		      $fcdeclar->save();

          }else{
			      $fcdeclar = new Fcdeclar();
			      $fcdeclar->setNumDec($DeclarGen);
			      $fcdeclar->setNumero($Declaraciones->getNumero());
			      $fcdeclar->setFecVen(H::DateAdd("d", 1, $Declaraciones->getFecVen(),'+'));
			      $fcdeclar->setFueing($Fuente);
			      $fcdeclar->setFecDec($Declaraciones->getFecDec());
			      $fcdeclar->setRifCon($Declaraciones->getRifCon());
			      $fcdeclar->setTipo($Tipo);
			      $fcdeclar->setNumRef($Declaraciones->getNumRef());
			      $fcdeclar->setNombre("INTERESES POR MORA " . $Declaraciones->getNombre());
			      $fcdeclar->setMonDec($Monto);
			      $fcdeclar->setEdoDec("V");
			      $fcdeclar->setmora(0);
			      $fcdeclar->setProntoPg(0);
			      $fcdeclar->setAutLiq(0);
			      $fcdeclar->setFundec($Declaraciones->getFundec());
			      $fcdeclar->setNomCon($Declaraciones->getNomCon());
			      $fcdeclar->setAnoDec($Declaraciones->getAnoDec());
			      $fcdeclar->setOtro($Declaraciones->getOtro());
			      $fcdeclar->save();
		  }

		  return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}


	public static function MontodeInteresFijo($MontoDeuda, $Dias, $FechaVen, $Tasa, $Tipo, $Prom, $feccor)
	{
		$MontodeInteresFijo = 0;
		$Meses = 1;
		if ($Tasa == -1) $Tasa = round(self::CalcularTasaPromedio($Tipo, $Prom, $FechaVen, $feccor),2);

		if ($Meses > 0)  $MontodeInteresFijo = ($MontoDeuda * $Tasa / 100);

		return $MontodeInteresFijo;
	}


	public static function MontodeMoraFijo($MontoDeuda,$Dias, $FechaVen, $Tasa, $Tipo, $Prom, $feccor)
	{
		$MontodeMoraFijo = 0;
		$Meses = 1;
		if ($Tasa == -1) $Tasa = round(self::CalcularTasaPromedio($Tipo, $Prom, $FechaVen, $feccor), 2);


		if ($Meses > 0) $MontodeMoraFijo = ($MontoDeuda * $Tasa / 100) * $Meses;

		return $MontodeMoraFijo;
	}

	public static function CalcularTasaPromedio($tipo, $Prom, $Fecha_Referencia, $feccor)
	{
		if ($Prom == "S")
		{
			$cuanto = 3;
			// dd/mm/yyyy
			$mes = substr($Fecha_Referencia,5,2);
//yyyy-mm-dd
			switch ($mes) {
				case '01':
				case '02':
				case '03':
			           $sql = "Select coalesce(Sum(TasPor),0) as suma from FCTasBan where TasAno='".substr($Fecha_Referencia,0,4)."'
			                   and TasMes>=case when ('".$tipo."'='A' then 1 else 10 end ) and TasMes<= case when ('".$tipo."'='A' then 3 else 12 end)";

	                        if(H::BuscarDatos($sql,&$regs)){
	                        	return $CalcularTasaPromedio = $regs[0]["suma"] / $cuanto;
	                        }else{
	                        	return 0;
	                        }
					break;

				case '04':
				case '05':
				case '06':
			           $sql = "Select coalesce(Sum(TasPor),0) as suma from FCTasBan where TasAno='".substr($Fecha_Referencia,0,4)."'
			                   and TasMes>=case when ('".$tipo."'='A' then 4 else 1 end ) and TasMes<= case when ('".$tipo."'='A' then 6 else 3 end)";

	                        if(H::BuscarDatos($sql,&$regs)){
	                        	return $CalcularTasaPromedio = $regs[0]["suma"] / $cuanto;
	                        }else{
	                        	return 0;
	                        }
					break;

				case '07':
				case '08':
				case '09':
			           $sql = "Select coalesce(Sum(TasPor),0) as suma from FCTasBan where TasAno='".substr($Fecha_Referencia,0,4)."'
			                   and TasMes>=case when ('".$tipo."'='A' then 7 else 4 end ) and TasMes<= case when ('".$tipo."'='A' then 9 else 6 end)";

	                        if(H::BuscarDatos($sql,&$regs)){
	                        	return $CalcularTasaPromedio = $regs[0]["suma"] / $cuanto;
	                        }else{
	                        	return 0;
	                        }
					break;


				case '10':
				case '11':
				case '12':
			           $sql = "Select coalesce(Sum(TasPor),0) as suma from FCTasBan where TasAno='".substr($Fecha_Referencia,0,4)."'
			                 and TasMes>=case when ('".$tipo."'='A' then 10 else 7 end ) and TasMes<= case when ('".$tipo."'='A' then 12 else 9 end)";

	                        if(H::BuscarDatos($sql,&$regs)){
	                        	return $CalcularTasaPromedio = $regs[0]["suma"] / $cuanto;
	                        }else{
	                        	return 0;
	                        }
					break;

			     default:
			           return 0;
				}

		}else{
			   if (substr($Fecha_Referencia,0,4) <= '2007 ' ){
			      $FechaDes = (substr($Fecha_Referencia,5,2)+1) ."/". substr($Fecha_Referencia,0,4);
			      $FechaHas = (substr($feccor,5,2) - 1) ."/". substr($feccor,0,4);
			   }else{

			      $FechaDes = substr($Fecha_Referencia,5,2) ."/". substr($Fecha_Referencia,0,4);
			      $FechaHas = (substr($feccor,5,2) - 1) ."/". substr($feccor,0,4);
			   }

			     	$sql = "Select coalesce(Sum(TasPor),0) as suma from FCTasBan where
			   		   to_date(lpad(rtrim(ltrim(to_char(tasmes,'99'))),2,'0')||'/'||tasano,'mm/yyyy')>=to_date('".$FechaDes."','mm/yyyy')  and
			   		   to_date(lpad(rtrim(ltrim(to_char(tasmes,'99'))),2,'0')||'/'||tasano,'mm/yyyy')<=to_date('".$FechaHas."','mm/yyyy')  ";

                if(H::BuscarDatos($sql,&$regs)){
                	return $CalcularTasaPromedio = $regs[0]["suma"];
                }else{
                	return 0;
                }
		}
	}


	public static function Grabar_Facpicsollic_Negacion($fcsollic) {
		try {
			$correlativo = "";
			$c = new Criteria();
			$c->add(FcsollicPeer :: NUMSOL, $fcsollic->getNumsol());
			$fcsollic_up = FcsollicPeer :: doSelectOne($c);
			if (count($fcsollic_up) > 0) {

				/*ACTUALIZAMOS FCSOLLIC*/
				$fcsollic_up->setStalic($fcsollic->getOperacion());
				$fcsollic_up->save();
				/*FIN ACTUALIZAR */

				$c = new Criteria();
				$c->addDescendingOrderByColumn(FcsolnegPeer :: NUMNEG);
				$reg = FcsolnegPeer :: doSelectOne($c);
				if (count($reg) > 0)
					$correlativo = str_pad(trim($reg->getNumneg() + 1), 10, '0', STR_PAD_LEFT);
				else
					$correlativo = str_pad(1, 10, '0', STR_PAD_LEFT);

				$Fcsolneg_new = new Fcsolneg();
				$Fcsolneg_new->setNumsol($fcsollic->getNumsol());
				$Fcsolneg_new->setNumneg($correlativo);
				$Fcsolneg_new->setFunneg($fcsollic->getFunneg());
				$Fcsolneg_new->setTomon($fcsollic->getTomon());
				$Fcsolneg_new->setNumeron($fcsollic->getNumeron());
				$Fcsolneg_new->setFolion($fcsollic->getFolion());
				$Fcsolneg_new->setResolu($fcsollic->getResolu());
				$Fcsolneg_new->setMotneg($fcsollic->getMotneg());
				$Fcsolneg_new->setFecneg($fcsollic->getFecneg());
				$Fcsolneg_new->save();
			}

			return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}


	public static function SalvarFacrecpag($clasemodelo, $grid, $gridfp, $gridscto)
	{
		try {
			self::SalvarFacrecpagMaestro($clasemodelo, $grid, $gridfp, $gridscto);
			self::SalvarFacrecpagDescto($clasemodelo, $grid, $gridfp, $gridscto);
			self::SalvarFacrecpagDetalles($clasemodelo, $grid, $gridfp, $gridscto);
			self::SalvarFacrecpagFormPago($clasemodelo, $grid, $gridfp, $gridscto);

			return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}

	public static function SalvarFacrecpagDetalles($clasemodelo, $grid, $gridfp, $gridscto)
	{
	    try{
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->setFueing($x[$j]->getFuefing());
	        $x[$j]->setEdodec('P');
			if ($x[$j]->getMontopagcon() < $x[$j]->getMondec())
			{
				$x[$j]->setNombre('Abono a '.$x[$j]->getNombre());
			}
			$x[$j]->setFecultpag($clasemodelo->getFecpag());

			self::AcumularPago($x[$j]->getFueing(),$x[$j]->getMontopagcon());

			if ($x[$j]->setMontopagcon() <> 0)
			{
				if ($x[$j]->setMontopagcon() <> $x[$j]->setMontopag())
				{
					self::CrearDeudaAjuste($clasemodelo, $x[$j], $gridfp, $gridscto);
				}
			}

	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;
		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}

	}

	public static function CrearDeudaAjuste($clasemodelo, $grid, $gridfp, $gridscto)
	{
		$valor1 = $grid->setMontopagcon();
		$valor2 = $grid->setMontopag();
		$fecven = $grid->setFecven();
		$MontoAjuste = $valor2 - $valor1;

		$reg = new Fcdeclar();
			if ($MontoAjuste >= 0)
			{
				$reg->setNumdec('SP'.$grid->getNumdec());
				$reg->setFecven($fecven);
			}else{
				$reg->setNumdec('CR'.$grid->getNumdec());
				$reg->setFecven($fecven);

			}

   			$reg->setFueing($grid->getFueing());
   			$reg->setFecdec($grid->getFecdec());
   			$reg->setRficon($grid->getRifcon());
   			$reg->setNumero($grid->getNumero());
   			$reg->setNombre($grid->getNombre());

		   if ($MontoAjuste > 0){
		      $reg->getTipo("SDP");
		   }else{
		   	$reg->getTipo("AJU");
		   }

		   $reg->setNumref($grid->getNumref());
		   $reg->setEdodec('V');
		   $reg->setMora(0);
		   $reg->setProntopg(0);
		   $reg->setFundec($grid->getFundec());
		   $reg->setNomcon($grid->getNomcon());
		   $reg->setAnodec($grid->getAnodec());
		   $reg->setMondec($MontoAjuste);
		   $reg->setOtro($grid->getOtro());

		   $reg->save();

	}



	public static function AcumularPago($fuente,$monto=0)
	{
		$c = new Criteria();
		$c->add(FcfueprePeer::CODFUE($fuente));
		$reg= FcfueprePeer::doSelect($c);

		if ($reg)
		{
			foreach ($reg as $datos)
			{
				$datos->setRecfec($datos->getRecfec()+$monto);
			}
		}
	}

	public static function SalvarFacrecpagFormPago($clasemodelo, $grid, $gridfp, $gridscto)
	{
	    try{
	      $x=$gridfp[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;
		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}

	}

	public static function FacrecpagDescto($clasemodelo, $grid, $gridfp, $gridscto)
	{
	    try{
	      $x=$gridscto[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;
		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}

	}


	public static function salvarFacvehreg($clasemodelo, $grid, $fundec)
	{
		try {
			if ($clasemodelo->getTraspaso()=='S')
			{
				//Faltan mas Campos
				$clasemodelo->setDueAnt($clasemodelo->getRifconant());
			}
			$clasemodelo->setEstveh('A');
			$clasemodelo->setEstdec('N');

			if ($clasemodelo->getTraspaso()=='S')	if (self::RegistrarTraspaso($clasemodelo) != -1 ) { return 0; }
			if ($clasemodelo->getDesincorporar()=='S')
			{
				$clasemodelo->setEstveh('D');
				if (self::RegistrarDesincorporar($clasemodelo)!= -1 ){ return 0; }
			}
			if ($clasemodelo->getId())  if (self::RegistrarCambiosFacvehreg($clasemodelo, $fundec)!= -1 ) { return 0; }

			$clasemodelo->save();

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}



	public static function RegistrarDesincorporar($clasemodelo) {
		try{
			$c = new Criteria();
			$c->add(FcdesvehPeer::PLAVEH, $clasemodelo->getPlaveh());
			$reg = FcdesvehPeer::doselectone($c);

			if ($reg)
			{
				$reg->setPlaveh($clasemodelo->getPlaveh());
				$reg->setNumdes($clasemodelo->getNumdes());
				$reg->setFunrec($clasemodelo->getFundes());
				$reg->setMotdes($clasemodelo->getMotdes());
				$reg->setFecdes($clasemodelo->getFecdes());
				$reg->save();

			}else{
				$c = new Fcdesveh();
				$c->setPlaveh($clasemodelo->getPlaveh());
				$c->setNumdes($clasemodelo->getNumdes());
				$c->setFunrec($clasemodelo->getFundes());
				$c->setMotdes($clasemodelo->getMotdes());
				$c->setFecdes($clasemodelo->getFecdes());
				$c->save();

			}

			return -1;
		} catch (Exception $ex) {
			echo $ex;
			exit();
			return 0;
		}

	}


	public static function RegistrarCambiosFacvehreg($clasemodelo, $fundec) {
		try{

			       if (Herramientas::getVerCorrelativo('refmod','Fcmodveh',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcmodvehPeer::REFMOD,$numero);
			          $resul= FcmodvehPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			      }


			$c = new Fcmodveh();
			$c->setPlaveh($clasemodelo->getPlaveh());
			$c->setFecmod(date('Y-m-d'));
			$c->setRefmod($numero);
			$c->setCoduso($clasemodelo->getCoduso());
			$c->setAnoveh($clasemodelo->getAnoveh());
			$c->setMarveh($clasemodelo->getMarveh());
			$c->setModveh($clasemodelo->getModveh());
			$c->setColveh($clasemodelo->getColveh());
			$c->setSermot($clasemodelo->getSermot());
			$c->setSercar($clasemodelo->getSercar());
			$c->setPlaant($clasemodelo->getPlaant());
			$c->setDueant($clasemodelo->getDueant());
			$c->setDirant($clasemodelo->getDirant());
			$c->setValori($clasemodelo->getValori());
			$c->setCodusoant($clasemodelo->getCodusoant());
			$c->setAnovehant($clasemodelo->getAnovehant());
			$c->setMarvehant($clasemodelo->getMarvehant());
			$c->setModvehant($clasemodelo->getModvehant());
			$c->setColvehant($clasemodelo->getColvehant());
			$c->setSermotant($clasemodelo->getSercarant());
			$c->setSercarant($clasemodelo->getSercarant());
			$c->setPlaantant($clasemodelo->getPlaantant());
			$c->setDueantant($clasemodelo->getDueantant());
			$c->setDirantant($clasemodelo->getDirantant());
			$c->setValoriant($clasemodelo->getValoriant());
			$c->setFunrec($fundec);
			$c->save();

			return -1;
		} catch (Exception $ex) {
			return 0;
		}

	}

	public static function RegistrarTraspaso($clasemodelo) {
		try{
			$c = new Fctraveh();
			$c->setNumtra($clasemodelo->getNumtra());
			$c->setPlaveh($clasemodelo->getPlaveh());
			$c->setFectra($clasemodelo->getFectra());
			$c->setRifcon($clasemodelo->getRifcon());
			$c->setRifrep($clasemodelo->getRifrep());
			$c->setRifconant($clasemodelo->getRifconant());
			$c->setRifrepant($clasemodelo->getRifrepant());
			$c->setFunrec($clasemodelo->getFunrec());
			$c->save();

		return -1;

		} catch (Exception $ex) {
			//echo $ex;
			//exit();
			return 0;
		}

	}

	public static function SalvarFacrecpagMaestro($clasemodelo, $grid, $gridfp, $gridscto) {
		try {
				$detalle  = $grid[0];
				$formpago = $gridfp[0];
				$recargo  = $gridscto[0];

	          	if ($clasemodelo->getNumpag() == '##########') {
			       if (Herramientas::getVerCorrelativo('numpag','fcpagos',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcpagosPeer::NUMPAG,$numero);
			          $resul= FcpagosPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			         echo $numero;
			         $clasemodelo->setNumpag($numero);
			      }
			     //H::getSalvarCorrelativo('numpag','fcpagos','numpag',$r,&$msg);
			    }
			    else
			    {
			       $clasemodelo->getNumpag(str_replace('#','0',$clasemodelo->getNumpag()));
			    }

				$clasemodelo->setNumpagold($clasemodelo->getNumpag());
				//$clasemodelo->setCodrec($codigorecibo);  //No se de donde sacarlo
				//echo $formpago[0]["monpag"]='555555';
				//echo $formpago->setMonpag('555');
				//$clasemodelo->setMonefe($formpago->getMonpag());

H::printR($clasemodelo);
exit();


			return -1;

		} catch (Exception $ex) {
			return 0;
		}

	}


  public static function FacinmegDesincorporar($clasemodelo)
  {
  	$clasemodelo->setEstinm('D');
  	$clasemodelo->save();
  }


	public static function salvarFacprocom($clasemodelo, $grid, $fundec)
	{
		try {

	          	if ($clasemodelo->getNrocon() == '##########') {
			       if (Herramientas::getVerCorrelativo('Nrocon','fcpagos',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcpagosPeer::NROCON,$numero);
			          $resul= FcpagosPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			         $clasemodelo->setNrocon($numero);
			      }
			    }
			    else
			    {
			       $clasemodelo->getNrocon(str_replace('#','0',$clasemodelo->getNrocon()));
			    }

			//if ($clasemodelo->getTraspaso()=='S')
			//{
				//Faltan mas Campos
			//	$clasemodelo->setDueAnt($clasemodelo->getRifconant());
			//}

			self::GrabarGridFacprocom($clasemodelo, $grid);

			if ($clasemodelo->getId())  if (self::RegistrarCambiosFacprocom($clasemodelo, $fundec)!= -1 ) { return 0; }


			$clasemodelo->setStapro('A');
			$clasemodelo->setStadec('N');
			$clasemodelo->save();

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}



	public static function GrabarGridFacprocom($clasemodelo, $grid)
	{
	    try{
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setNrocon($clasemodelo->getNrocon());
	        $x[$j]->setRifcon($clasemodelo->getRifcon());
	        $x[$j]->setTippro($clasemodelo->getTippro());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		} catch (Exception $ex){
			 return 0;
		}
	}



	public static function EliminarFacprocom($clasemodelo, $grid)
	{
		try {

			if (self::EliminarGridFacproco($clasemodelo, $grid) == -1)
			{
				$clasemodelo->delete();
				return -1;
			}

			return 0;

		} catch (Exception $ex) {
			return 0;
		}
	}


	public static function EliminarGridFacproco($clasemodelo, $grid)
	{
		try {
			$c = new Criteria();
			$c->add(FcprolicdetPeer :: NROCON, $clasemodelo->getNrocon());
			$c->add(FcprolicdetPeer :: RIFCON, $clasemodelo->getRifcon());
			$c->add(FcprolicdetPeer :: TIPPRO, $clasemodelo->getTippro());
			FcprolicdetPeer :: doDelete($c);

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}


	public static function RegistrarCambiosFacprocom($clasemodelo, $fundec) {
		try{
			   $numero=str_pad('1', 10, '0', STR_PAD_LEFT);
		       if (Herramientas::getVerCorrelativo('refmod','Fcmodpro',&$r))
		       {
		          $encontrado=false;
		         while (!$encontrado)
		         {
		          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
		          $c= new Criteria();
		          $c->add(FcmodproPeer::REFMOD,$numero);
		          $resul= FcmodproPeer::doSelectOne($c);
		          if ($resul)
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		         }
		      }

			$c = new Fcmodpro();
			$c->setNrocon($clasemodelo->getNrocon());
			$c->setFecmod(date('Y-m-d'));
			$c->setRefmod($numero);
			$c->setTippro($clasemodelo->getTippro());
			$c->setFunrec($fundec);
			$c->setDespro($clasemodelo->getDespro());
			$c->setDirpro($clasemodelo->getDirpro());

			//Para saber si fue cambiado estos datos se buscan en la BD
			//y se almacenan
			$fcprolic = new Criteria();
			$fcprolic->add(FcprolicPeer::ID, $clasemodelo->getId());
			$reg = FcprolicPeer::doselectone($fcprolic);

			if ($reg)
			{
				$c->setTipproant($reg->getTippro());
				$c->setDesproant($reg->getDespro());
				$c->setDirproant($reg->getDirpro());
				$c->setMonproant($reg->getMonpro());
			}
			$c->save();

			return -1;
		} catch (Exception $ex) {
			return 0;
		}

	}


	public static function salvarFacesppub($clasemodelo, $grid, $fundec)
	{
		try {
	          	if ($clasemodelo->getNrocon() == '########') {
			       if (Herramientas::getVerCorrelativo('Nrocon','fcesplic',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcesplicPeer::NROCON,$numero);
			          $resul= FcesplicPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			         $clasemodelo->setNrocon($numero);
			      }
			    }
			    else
			    {
			       $clasemodelo->setNrocon(str_replace('#','0',$clasemodelo->getNrocon()));
			    }
			self::GrabarGridFacesppub($clasemodelo, $grid);

			if ($clasemodelo->getId())
			{
				$clasemodelo->setFecrec(date('Y-m-d'));
				$clasemodelo->setFunrec($fundec);
				if (self::RegistrarCambiosFacesppub($clasemodelo, $fundec)!= -1 ) { return 0; }
			}


			$clasemodelo->setStaest('A');
			$clasemodelo->setStadec('N');
			$clasemodelo->save();

			return -1;

		} catch (Exception $ex) {
			echo $ex;
			exit();
			return 0;
		}
	}



	public static function GrabarGridFacesppub($clasemodelo, $grid)
	{
	    try{
	      $x=$grid[0];
	      $j=0;
	      //H::printR($x);
	      //exit();
	      while ($j<count($x))
	      {
	        $x[$j]->setNrocon($clasemodelo->getNrocon());
	        $x[$j]->setRifcon($clasemodelo->getRifcon());
	        $x[$j]->setTipesp($clasemodelo->getTipesp());
	      //  $x[$j]->setCampo($clasemodelo->getTipvar());
	       // $x[$j]->setValor($clasemodelo->getValor());
//H::printR($x[$j]);
	//      exit();
	        $x[$j]->save();
	        $j++;
	      }
	      //H::printR($x);
	      //exit();

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

	      //H::printR($z);
	      //exit();

			return -1;

		} catch (Exception $ex){
			echo $ex;
			//exit();
			 return 0;
		}
	}


	public static function RegistrarCambiosFacesppub($clasemodelo, $fundec) {
		try{
			   $numero=str_pad('1', 10, '0', STR_PAD_LEFT);
		       if (Herramientas::getVerCorrelativo('refmod','Fcmodpro',&$r))
		       {
		          $encontrado=false;
		         while (!$encontrado)
		         {
		          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
		          $c= new Criteria();
		          $c->add(FcmodproPeer::REFMOD,$numero);
		          $resul= FcmodproPeer::doSelectOne($c);
		          if ($resul)
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		         }
		      }

			$c = new Fcmodpro();
			$c->setNrocon($clasemodelo->getNrocon());
			$c->setFecmod(date('Y-m-d'));
			$c->setRefmod($numero);
			$c->setTipesp($clasemodelo->getTipesp());
			$c->setFunrec($fundec);
			$c->setDesesp($clasemodelo->getDesesp());
			$c->setDiresp($clasemodelo->getDiresp());

			//Para saber si fue cambiado estos datos se buscan en la BD
			//y se almacenan
			$fcesplic = new Criteria();
			$fcesplic->add(FcesplicPeer::ID, $clasemodelo->getId());
			$reg = FcesplicPeer::doselectone($fcesplic);

			if ($reg)
			{
				$c->setTipespant($reg->getTipesp());
				$c->setDesespant($reg->getDesesp());
				$c->setDirespant($reg->getDiresp());
				$c->setMonespant($reg->getMonesp());
			}

			$c->save();

			return -1;
		} catch (Exception $ex) {
			echo $ex;
			exit();
			return 0;
		}

	}


	public static function EliminarFacesppub($clasemodelo, $grid)
	{
		try {
			if (self::EliminarGridFacesppub($clasemodelo, $grid) == -1)
			{
				$clasemodelo->delete();
				return -1;
			}

			return 0;

		} catch (Exception $ex) {
			return 0;
		}
	}


	public static function EliminarGridFacesppub($clasemodelo, $grid)
	{
		try {
			$c = new Criteria();
			$c->add(FcesplicdetPeer :: NROCON, $clasemodelo->getNrocon());
			$c->add(FcesplicdetPeer :: RIFCON, $clasemodelo->getRifcon());
			$c->add(FcesplicdetPeer :: TIPESP, $clasemodelo->getTipesp());
			FcesplicdetPeer :: doDelete($c);

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}


	public static function salvarFacapulic($clasemodelo, $grid, $fundec)
	{
		try {
	          	if ($clasemodelo->getNrocon() == '########') {
			       if (Herramientas::getVerCorrelativo('Nrocon','fcapulic',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcapulicPeer::NROCON,$numero);
			          $resul= FcapulicPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			         $clasemodelo->setNrocon($numero);
			      }
			    }
			    else
			    {
			       $clasemodelo->setNrocon(str_replace('#','0',$clasemodelo->getNrocon()));
			    }
			self::GrabarGridFacapulic($clasemodelo, $grid);

			if ($clasemodelo->getId())
			{
				$clasemodelo->setFecrec(date('Y-m-d'));
				$clasemodelo->setFunrec($fundec);
				if (self::RegistrarCambiosFacapulic($clasemodelo, $fundec)!= -1 ) { return 0; }
			}


			$clasemodelo->setStaapu('A');
			$clasemodelo->setStadec('N');
			$clasemodelo->save();

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}



	public static function GrabarGridFacapulic($clasemodelo, $grid)
	{
	    try{
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setNrocon($clasemodelo->getNrocon());
	        $x[$j]->setRifcon($clasemodelo->getRifcon());
	        $x[$j]->setTipapu($clasemodelo->getTipapu());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		} catch (Exception $ex){
			 return 0;
		}
	}


	public static function RegistrarCambiosFacapulic($clasemodelo, $fundec) {
		try{
			   $numero=str_pad('1', 10, '0', STR_PAD_LEFT);
		       if (Herramientas::getVerCorrelativo('refmod','Fcmodpro',&$r))
		       {
		          $encontrado=false;
		         while (!$encontrado)
		         {
		          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
		          $c= new Criteria();
		          $c->add(FcmodproPeer::REFMOD,$numero);
		          $resul= FcmodproPeer::doSelectOne($c);
		          if ($resul)
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		         }
		      }

			$c = new Fcmodpro();
			$c->setNrocon($clasemodelo->getNrocon());
			$c->setFecmod(date('Y-m-d'));
			$c->setRefmod($numero);
			$c->setTipapu($clasemodelo->getTipapu());
			$c->setFunrec($fundec);
			$c->setDesapu($clasemodelo->getDesapu());
			$c->setDirapu($clasemodelo->getDirapu());

			//Para saber si fue cambiado estos datos se buscan en la BD
			//y se almacenan
			$fcapulic = new Criteria();
			$fcapulic->add(FcapulicPeer::ID, $clasemodelo->getId());
			$reg = FcapulicPeer::doselectone($fcapulic);

			if ($reg)
			{
				$c->setTipapuant($reg->getTipapu());
				$c->setDesapuant($reg->getDesapu());
				$c->setDirapuant($reg->getDirapu());
				$c->setMonapuant($reg->getMonapu());
			}

			$c->save();

			return -1;
		} catch (Exception $ex) {
			return 0;
		}

	}


	public static function EliminarFacapulic($clasemodelo, $grid)
	{
		try {
			if (self::EliminarGridFacapulic($clasemodelo, $grid) == -1)
			{
				$clasemodelo->delete();
				return -1;
			}

			return 0;

		} catch (Exception $ex) {
			return 0;
		}
	}


	public static function EliminarGridFacapulic($clasemodelo, $grid)
	{
		try {
			$c = new Criteria();
			$c->add(FcapulicdetPeer :: NROCON, $clasemodelo->getNrocon());
			$c->add(FcapulicdetPeer :: RIFCON, $clasemodelo->getRifcon());
			$c->add(FcapulicdetPeer :: TIPAPU, $clasemodelo->getTipapu());
			FcapulicdetPeer :: doDelete($c);

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}


        public static function generarCorrelativoSolvencia($clase)
        {
            $tienecorrelativo=false;
            $correlativo = '';

            if ($clase->getCodsol() == '##########')
            {
                if (Herramientas::getVerCorrelativo('codsol','fcsolvencia',&$r)) // Buscar Correlativo
                {
                    $tienecorrelativo=true;
                    $encontrado=false;

                       while (!$encontrado)
                       {
                         $r1 = str_pad($r, 8, '0', STR_PAD_LEFT);
                         $numero = "Z".substr($r1, 2, strlen($r1))."/".date($clase->getFecexp('y'));
                         $sql="select codsol from fcsolvencia where codsol ='".$numero."'";
                         if (Herramientas::BuscarDatos($sql,&$result))
                         {
                           $r=$r+1;
                         }
                         else
                         {
                           $encontrado=true;
                         }
                       }

                   $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }
            }
            else
            {
               $correlativo = str_replace('#','0',$clase->getCodsol());
            }

            /* if ($tienecorrelativo==true)
             {
               Herramientas::getSalvarCorrelativo('reftra','cpsoltrasla','Referencia',$correlativo,&$msg);
             }*/
            return $correlativo;
       }

	public static function salvarFacsolvencia($clase, $grid, $fundec)
	{
            $cod = self::generarCorrelativoSolvencia($clase);
            $codsol = "Z".substr($cod, 2, strlen($cod))."/".date($clase->getFecexp('y'));

            $clase->setCodsol($codsol);
            $clase->setStasol("V");
            $clase->save();

            $gridS = $grid[0];

                    $i = 0;
                    while ($i < count($gridS))
                    {
                        if ($gridS[$i])
                        {

                            //GENERAL
                                $c2 = new Fcsoldet2();
                                $c2->setCodsol($codsol);
                                $c2->setCodfue($gridS[$i]['codfue']);
                                $c2->setNomfue($gridS[$i]['nomfue']);
                                $c2->setObjeto($gridS[$i]['objeto']);
                                $c2->setFecven($gridS[$i]['fecven']);
                                
                                $edodecstatus = "";
                                if ($gridS[$i]['edodec'] == 'PAGADA'){
                                        $edodecstatus = "P";
                                }else if ($gridS[$i]['edodec'] == 'VIGENTE'){
                                        $edodecstatus = "V";
                                }else if ($gridS[$i]['edodec'] == 'VENCIDA'){
                                        $edodecstatus = "E";
                                }

                                $c2->setEdodec($edodecstatus);
                                $c2->setConpag($gridS[$i]['conpag']);
                                $c2->setFecultpag($gridS[$i]['fecultpag']);
                                $c2->save();

                            //RESUMEN
                                $c3 = new Fcsoldet();
                                $c3->setCodsol($codsol);
                                $c3->setCodfue($gridS[$i]['codfue']);
                                $c3->setNomfue($gridS[$i]['nomfue']);
                                $c3->setObjeto($gridS[$i]['objeto']);
                                $c3->setFecven($gridS[$i]['fecven']);
                                $c3->setEdodec($edodecstatus);
                                $c3->setFecultpag($gridS[$i]['fecultpag']);
                                $c3->save();

                            $i++;
                        }else
                        {
                            $i++;
                        }

                    }
                    return -1;


	}

        public static function eliminarSolvencia($clase){
           if ($clase->getStasol() != 'N'){

               
               //Eliminamos los Detalles

               //GENERALES
               $c = new Criteria();
               $c->add(FcsoldetPeer::CODSOL, $clase->getCodsol());
               $reg1 = FcsoldetPeer::doSelect($c);

               if ($reg1){
                   foreach($reg1 as $v){
                       $v->delete();
                   }
               }

               //RESUMEN
               $c = new Criteria();
               $c->add(Fcsoldet2Peer::CODSOL, $clase->getCodsol());
               $reg1 = Fcsoldet2Peer::doSelect($c);

               if ($reg1){
                   foreach($reg1 as $v){
                       $v->delete();
                   }
               }

               $clase->delete();

               return -1;

           }else{
                return 711;
           }

        }



	public static function GrabarGridFacsolvencia($clasemodelo, $grid)
	{
	    //try{
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setCodsol($clasemodelo->getCodsol());
	        $x[$j]->setCodfue($clasemodelo->getFueing());
	        $x[$j]->setObjeto($clasemodelo->getNomabrnumref());
	        $x[$j]->setEdodec($clasemodelo->getEdodecgrid());
	        $x[$j]->setConpag($clasemodelo->getConpagstatus());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		/*} catch (Exception $ex){
			 return 0;
		}*/
	}


	public static function GrabarGrid2Facsolvencia($clasemodelo, $grid)
	{
	   // try{
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
	        $x[$j]->setCodsol($clasemodelo->getCodsol());
	        $x[$j]->setCodfue($clasemodelo->getFueing());
	        $x[$j]->setObjeto($clasemodelo->getNomabrnumref());
	        $x[$j]->setEdodec($clasemodelo->getEdodecgrid());
	        $x[$j]->setConpag($clasemodelo->getConpagstatus());
	        $x[$j]->save();
	        $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		/*} catch (Exception $ex){
			 return 0;
		}*/
	}


	public static function salvarFacrepfisliq($clasemodelo, $grid, $gridD)
	{
		try {
	          	if ($clasemodelo->getNumrep() == '################') {
			       if (Herramientas::getVerCorrelativo('numrep','fcrepfis',&$r))
			       {
			          $encontrado=false;
			         while (!$encontrado)
			         {
			          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
			          $c= new Criteria();
			          $c->add(FcapulicPeer::NROCON,$numero);
			          $resul= FcapulicPeer::doSelectOne($c);
			          if ($resul)
			          {
			            $r=$r+1;
			          }
			          else
			          {
			            $encontrado=true;
			          }
			         }

			         $clasemodelo->setNrocon('DSHM-RF000001/'.date('y'));
			      }
			    }
			    else
			    {
			       $clasemodelo->setNumrep(str_replace('#','0',$clasemodelo->getNrocon()));
			    }
			self::GrabarGridFacapulic($clasemodelo, $grid);

			if ($clasemodelo->getId())
			{
				$clasemodelo->setFecrec(date('Y-m-d'));
				$clasemodelo->setFunrec($fundec);
				if (self::RegistrarCambiosFacapulic($clasemodelo, $fundec)!= -1 ) { return 0; }
			}


			$clasemodelo->setStaapu('A');
			$clasemodelo->setStadec('N');
			$clasemodelo->save();

			return -1;

		} catch (Exception $ex) {
			return 0;
		}
	}

	public static function DistribuirVencimiento($FechaDia, $FechaInicio, $fportion, $fportionName, $grid_datos, &$grid= array() )
	{
	    try{
	    	$reg_grid = $grid_datos;

			switch ($fportion)
			{
				case 1:
				case 2:
				case 3:
				case 4:
				case 6:
				case 12:
					$auxiliar = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)12/$fportion,$FechaInicio,'-'))- 1);
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)3,$FechaInicio,'-'))- 1);

					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $fportionName." del ".$grid[0]["fecven"];
					}else{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));

					for ($i=1; $i < count($reg_grid); $i++)
					{
						if ($i > 0){
							$auxiliar= str_replace("/", "-",$grid[$i-1]["fecven"]);
							$FechaInicio = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$auxiliar,'+')));
						}

						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)12/$fportion,$FechaInicio,'-'))- 1);
						$grid[$i]["tipo"] = strtoupper(substr($fportionName,2,3));

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[$i]["fecven"];
						}


						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

					}
					break;
				case 24:
					$DiasMax = 0;
					$Ultimo  = false;
					$fecha   = $FechaInicio;

			         if ((substr($fecha,2,2)== '4' or substr($fecha,2,2)== '6' or substr($fecha,2,2)== '9' or substr($fecha,2,2)== '11') and substr($fecha,0,2)== '30' ){
			            $Ultimo = true;
			         }
			         if ((substr($fecha,2,2)== '1' or substr($fecha,2,2)== '3' or substr($fecha,2,2)== '5' or substr($fecha,2,2)== '7' or substr($fecha,2,2)== '8' or substr($fecha,2,2)== '10' or substr($fecha,2,2)== '12') and substr($fecha,0,2)== '31'){
			            $Ultimo = true;
			         }

			         if (substr($fecha,2,2)== '2'){
			            if ((substr($fecha,6,4) % 4) == '0' and substr($fecha,2,2) == '29'){
			               $Ultimo = true;
			         	}else{
			               if ((substr($fecha,6,4) % 4) <> '0' and substr($fecha,2,2) == '28'){ $Ultimo = true;	}
			         	}
			         }


					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)15,$FechaInicio,'-'))- 1);

					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $fportionName." del ".$grid[0]["fecven"];
					}else{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));

					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}


					for ($i=1; $i < count($reg_grid); $i++)
					{
						if (($i % 2) == 0 )
						{
							$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',1,$FechaInicio,'-'))- 1);
							if ($grid[$i]["fecven"] >= $FechaDia)
							{
								$grid[$i]["edodecstatus"] = 'VIGENTE';
							}else{
								$grid[$i]["edodecstatus"] = 'VENCIDA';
							}

	                        if (substr($fecha,2,2)== '2'){
	                        	if ($Ultimo)
	                        	{
	                        		if (substr($fecha,0,2)== '28'){
		                        		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',3,$grid[$i]["fecven"],'-')));
										if ($grid[$i]["fecven"] >= $FechaDia)
										{
											$grid[$i]["edodecstatus"] = 'VIGENTE';
										}else{
											$grid[$i]["edodecstatus"] = 'VENCIDA';
										}
									}else{
										if (substr($fecha,0,2)== '29'){
			                        		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',2,$grid[$i]["fecven"],'-')));
											if ($grid[$i]["fecven"] >= $FechaDia)
											{
												$grid[$i]["edodecstatus"] = 'VIGENTE';
											}else{
												$grid[$i]["edodecstatus"] = 'VENCIDA';
											}

										}
									}
	                        	}else{
						         	if ($DiasMax > 28)
									{
			                    		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',$DiasMax - substr($fecha,0,2),$grid[$i]["fecven"],'-')));
										if ($grid[$i]["fecven"] >= $FechaDia)
										{
											$grid[$i]["edodecstatus"] = 'VIGENTE';
										}else{
											$grid[$i]["edodecstatus"] = 'VENCIDA';
										}
									}
					        	}
						    }else{   //substr($fecha,2,2)== '2'
								if ($Ultimo and ((substr($fecha,2,2)== '6')  or (substr($fecha,2,2)== '9') or (substr($fecha,2,2)== '11')) and (substr($fecha,0,2)== '30'))
								{
		                    		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$grid[$i]["fecven"],'-')));
									if ($grid[$i]["fecven"] >= $FechaDia)
									{
										$grid[$i]["edodecstatus"] = 'VIGENTE';
									}else{
										$grid[$i]["edodecstatus"] = 'VENCIDA';
									}
								}
						    }

					}else{
                		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',15,$grid[$i-1]["fecven"],'-')));
						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}
						$DiasMax = substr($fecha,0,2);
						$fecha   = $grid[$i-1]["fecven"];
					}

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[0]["nombre"] = $fportionName." del ".date('d/m/Y',strtotime($grid[($i-1)]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

						$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));
				}//FOR
				break;

				case 52:
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',7,$FechaInicio - 1 ,'-')));
					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio;
					}else{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));
					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

					for ($i=1; $i < count($reg_grid); $i++)
					{
						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',7,$grid[$i-1]["fecven"] ,'-')));

						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

						$grid[$i]["tipo"] = strtoupper(substr($fportionName,2,3));

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $fportionName." del ".date('d/m/Y',strtotime($grid[$i-1]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

					}
				break;


				case 365:
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$FechaInicio - 1 ,'-')));
					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio;
					}else{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));
					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

					for ($i=1; $i < count($reg_grid); $i++)
					{
						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$grid[$i-1]["fecven"] ,'-')));

						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

						$grid[$i]["tipo"] = strtoupper(substr($fportionName,2,3));

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $fportionName." del ".date('d/m/Y',strtotime($grid[$i-1]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

					}
				break;

			}

		} catch (Exception $ex){
			 return 0;
		}
	}




	public static function DistribuirVencimientoPropaganda($FechaDia, $FechaInicio, $fportion, $fportionName, $grid_datos, &$grid= array(),$clasemodelo )
	{
	    try{
	    	$reg_grid = $grid_datos;

			switch ($fportion)
			{
				case 1:
				case 2:
				case 3:
				case 4:
				case 6:
				case 12:
				    $grid[0]["id"] ='';
					$auxiliar = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)12/$fportion,$FechaInicio,'-'))- 1);
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)3,$FechaInicio,'-'))- 1);

					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

				/*	if ($fportion == '1')
					{
						$grid[0]["nombre"] = $fportionName." del ".$grid[0]["fecven"];
					}else{
						$grid[0]["nombre"] = $fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}
					*/
					$grid[0]["nombre"] = $clasemodelo->getDespro();

					$grid[0]["tipo"] = 'PAG';

					for ($i=1; $i < count($reg_grid); $i++)
					{
					/*	if ($i > 0){
							$auxiliar= str_replace("/", "-",$grid[$i-1]["fecven"]);
							$FechaInicio = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$auxiliar,'+')));
						}*/

						$grid[$i]["id"] ='';
						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)12/$fportion,$grid[$i-1]["fecven"],'+')));
						$grid[$i]["tipo"]   = 'PAG';
						$grid[$i]["nombre"]  = $clasemodelo->getDespro();

//Falta la ultima columna del costo

						$grid[$i]["mondec"]  = $clasemodelo->getFrecuencia();

						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

					}
					break;
				case 24:
					$DiasMax = 0;
					$Ultimo  = false;
					$fecha   = $FechaInicio;

			         if ((substr($fecha,2,2)== '4' or substr($fecha,2,2)== '6' or substr($fecha,2,2)== '9' or substr($fecha,2,2)== '11') and substr($fecha,0,2)== '30' ){
			            $Ultimo = true;
			         }
			         if ((substr($fecha,2,2)== '1' or substr($fecha,2,2)== '3' or substr($fecha,2,2)== '5' or substr($fecha,2,2)== '7' or substr($fecha,2,2)== '8' or substr($fecha,2,2)== '10' or substr($fecha,2,2)== '12') and substr($fecha,0,2)== '31'){
			            $Ultimo = true;
			         }

			         if (substr($fecha,2,2)== '2'){
			            if ((substr($fecha,6,4) % 4) == '0' and substr($fecha,2,2) == '29'){
			               $Ultimo = true;
			         	}else{
			               if ((substr($fecha,6,4) % 4) <> '0' and substr($fecha,2,2) == '28'){ $Ultimo = true;	}
			         	}
			         }

					$grid[0]["id"] ='';
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',(int)15,$FechaInicio,'+'))- 1);

					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$grid[0]["fecven"];
					}else{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($clasemodelo->getDespro(),2,3));

					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}


					for ($i=1; $i < count($reg_grid); $i++)
					{
						$grid[$i]["id"] ='';
						if (($i % 2) == 0 )
						{
							$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',1,$FechaInicio,'+')));
							if ($grid[$i]["fecven"] >= $FechaDia)
							{
								$grid[$i]["edodecstatus"] = 'VIGENTE';
							}else{
								$grid[$i]["edodecstatus"] = 'VENCIDA';
							}

	                        if (substr($fecha,2,2)== '02'){
	                        	if ($Ultimo)
	                        	{
	                        		if (substr($fecha,0,2)== '28'){
		                        		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',3,$grid[$i]["fecven"],'+')));
										if ($grid[$i]["fecven"] >= $FechaDia)
										{
											$grid[$i]["edodecstatus"] = 'VIGENTE';
										}else{
											$grid[$i]["edodecstatus"] = 'VENCIDA';
										}
									}else{
										if (substr($fecha,0,2)== '29'){
			                        		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('m',2,$grid[$i]["fecven"],'+')));
											if ($grid[$i]["fecven"] >= $FechaDia)
											{
												$grid[$i]["edodecstatus"] = 'VIGENTE';
											}else{
												$grid[$i]["edodecstatus"] = 'VENCIDA';
											}

										}
									}
	                        	}else{
						         	if ($DiasMax > 28)
									{
			                    		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',$DiasMax - substr($fecha,0,2),$grid[$i]["fecven"],'+')));
										if ($grid[$i]["fecven"] >= $FechaDia)
										{
											$grid[$i]["edodecstatus"] = 'VIGENTE';
										}else{
											$grid[$i]["edodecstatus"] = 'VENCIDA';
										}
									}
					        	}
						    }else{   //substr($fecha,2,2)== '2'
								if ($Ultimo and (((substr($fecha,2,2)== '4')  or substr($fecha,2,2)== '6')  or (substr($fecha,2,2)== '9') or (substr($fecha,2,2)== '11')) and (substr($fecha,0,2)== '30'))
								{
		                    		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$grid[$i]["fecven"],'+')));
									if ($grid[$i]["fecven"] >= $FechaDia)
									{
										$grid[$i]["edodecstatus"] = 'VIGENTE';
									}else{
										$grid[$i]["edodecstatus"] = 'VENCIDA';
									}
								}
						    }

					}else{
                		$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',15,$grid[$i-1]["fecven"],'+')));
						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}
						$DiasMax = substr($fecha,0,2);
						$fecha   = $grid[$i-1]["fecven"];
					}

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".date('d/m/Y',strtotime($grid[($i-1)]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

						$grid[$i]["tipo"] = strtoupper(substr($clasemodelo->getDespro(),2,3));
				}//FOR
				break;

				case 52:
				    $grid[0]["id"] ='';
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',7,$FechaInicio - 1 ,'-')));
					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$FechaInicio;
					}else{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($clasemodelo->getDespro(),2,3));
					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

					for ($i=1; $i < count($reg_grid); $i++)
					{
						$grid[$i]["id"] ='';
						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',7,$grid[$i-1]["fecven"] ,'+')));

						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

						$grid[$i]["tipo"] = strtoupper(substr($clasemodelo->getDespro(),2,3));

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".date('d/m/Y',strtotime($grid[$i-1]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

					}
				break;


				case 365:
				    $grid[0]["id"] ='';
					$grid[0]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$FechaInicio - 1 ,'+')));
					if ($fportion == '1')
					{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$FechaInicio;
					}else{
						$grid[0]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$FechaInicio." al ".$grid[0]["fecven"];
					}

					$grid[0]["tipo"] = strtoupper(substr($fportionName,2,3));
					if ($grid[0]["fecven"] >= $FechaDia)
					{
						$grid[0]["edodecstatus"] = 'VIGENTE';
					}else{
						$grid[0]["edodecstatus"] = 'VENCIDA';
					}

					for ($i=1; $i < count($reg_grid); $i++)
					{
						$grid[$i]["id"] ='';
						$grid[$i]["fecven"] = date('d/m/Y',strtotime(Herramientas::dateAdd('d',1,$grid[$i-1]["fecven"] ,'+')));

						if ($grid[$i]["fecven"] >= $FechaDia)
						{
							$grid[$i]["edodecstatus"] = 'VIGENTE';
						}else{
							$grid[$i]["edodecstatus"] = 'VENCIDA';
						}

						$grid[$i]["tipo"] = strtoupper(substr($clasemodelo->getDespro(),2,3));

						if ($fportion == '1')
						{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".$grid[$i]["fecven"];
						}else{
							$grid[$i]["nombre"] = $clasemodelo->getDespro()." ".$fportionName." del ".date('d/m/Y',strtotime($grid[$i-1]["fecven"])+1)." al ".$grid[$i]["fecven"];
						}

					}
				break;

			}

		} catch (Exception $ex){
			 return 0;
		}
	}


	public static function saveFacprodec($clasemodelo,$grid,$gridDeuda)
	{
	    try{
		  $x = $gridDeuda[0];
		  $y = $grid[0];

	      if (!$clasemodelo->getId()) //COTIZACION NUEVA
          {
        	$numero = "P".substr($clasemodelo->getNumref(),3,6)."/".substr($clasemodelo->getFechafin(),6,4);
            $sql = "select numdec from fcdeclar where numdec='".$numero."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              return 708;
            }
	      $clasemodelo->setNumdec($numero);
	      }

			$c = new Criteria();
			$c->add(FcprolicPeer::NROCON, $clasemodelo->getNumref());
			$reg = FcprolicPeer::doSelectone($c);
			if ($reg){  $reg->setStadec('D'); //$reg->save();
			}

			$c = new Criteria();
			$c->add(FcabonosPeer::RIFCON, $clasemodelo->getRifcon());
			$c->add(FcabonosPeer::FUEING, '04');
			$c->add(FcabonosPeer::STAPAG, 'N');
			$reg = FcabonosPeer::doSelectone($c);
			if ($reg){  $saldo = $reg->getSalpag(); }else{  $saldo = 0; }


	      $j=0;
	      while ($j<count($x))
	      {
	      	$x[$j]->setNumdec($clasemodelo->getNumdec());
	      	$x[$j]->setFueing($clasemodelo->getFuente());
	      	$x[$j]->setFecdec($clasemodelo->getFecdec());
	      	$x[$j]->setRifcon($clasemodelo->getRifcon());
	      	$x[$j]->setNumref($clasemodelo->getNumref());
	      	$x[$j]->setMora(0);
	      	$x[$j]->setProntopg(0);
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->setFundec($clasemodelo->getFundec());
echo $x[$j]->getMondec();
			$c = new Criteria();
			$c->add(FcfueprePeer::CODFUE, $clasemodelo->getFuente());
			$reg = FcfueprePeer::doSelectone($c);
			H::printR($reg );
//			exit();
			if ($reg){  $reg->setDeufec($reg->getDeufec()+$x[$j]->getMondec());  $reg->save();}
			H::printR($reg );
			exit();

			if ($saldo <= $x[$j]->getMondec())
			{
				$x[$j]->setAutliq($saldo);
			}else{
				$x[$j]->setAutliq($x[$j]->getMondec());
			}

			$saldo = $saldo - $x[$j]->getMondec();

			if ($saldo < 0){  $saldo =0;  }

			if ($x[$j]->getEdodecstatus() == 'VIGENTE')
			{
				$x[$j]->setEdodec('V');

			}elseif ($x[$j]->getEdodecstatus() == 'VENCIDA')
			{
				$x[$j]->setEdodec('E');
			}

			if ($x[$j]->getMondec() == $clasemodelo->getAutliq())
			{
				$x[$j]->setEdodec('P');
			}



H::printR($x[$j]);
		exit();
		        //$x[$j]->save();
	        $j++;
	      }
/*
	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }
	*/
			return -1;

		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}
	}


	public static function saveFacespdec($clasemodelo,$grid,$gridDeuda)
	{
	    try{
		  $x = $gridDeuda[0];
		  $y = $grid[0];

	      if (!$clasemodelo->getId()) //COTIZACION NUEVA
          {
        	$numero = "S".substr($clasemodelo->getNumref(),3,6)."/".substr($clasemodelo->getFechafin(),0,4);
            $sql = "select numdec from fcdeclar where numdec='".$numero."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              return 709;
            }

			$clasemodelo->setNumdec($numero);
          }

			$c = new Criteria();
			$c->add(FcesplicPeer::NROCON, $clasemodelo->getNumref());
			$reg = FcesplicPeer::doSelectone($c);
			if ($reg){  $reg->setStadec('D'); $reg->save();
			}
			//Saldo_Abono

			$c = new Criteria();
			$c->add(FcabonosPeer::RIFCON, $clasemodelo->getRifcon());
			$c->add(FcabonosPeer::FUEING, '05');
			$c->add(FcabonosPeer::STAPAG, 'N');
			$reg = FcabonosPeer::doSelectone($c);
			if ($reg){  $saldo = $reg->getSalpag();  }else{ $saldo = 0;  }
exit();
	      $j=0;
	      while ($j<count($x))
	      {
	      	$x[$j]->setNumdec($clasemodelo->getNumdec());
	      	$x[$j]->setFueing($clasemodelo->getFuente());
	      	$x[$j]->setFecdec($clasemodelo->getFecdec());
	      	$x[$j]->setRifcon($clasemodelo->getRifcon());
	      	$x[$j]->setNumref($clasemodelo->getNumref());
	      	$x[$j]->setMora(0);
	      	$x[$j]->setProntopg(0);
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->setFundec($clasemodelo->getFundec());

			$c = new Criteria();
			$c->add(FcfueprePeer::CODFUE, $clasemodelo->getFuente());
			$reg = FcfueprePeer::doSelectone($c);
			if ($reg){  $reg->setDeufec($reg->getDeufec()+$x[$j]->getMondec());  $reg->save();}

			if ($saldo <= $x[$j]->getMondec())
			{
				$x[$j]->setAutliq($saldo);
			}else{
				$x[$j]->setAutliq($x[$j]->getMondec());
			}

			$saldo = $saldo - $x[$j]->getMondec();
			$monto = $x[$j]->getAutliq();
			//Actualizar_Saldo
			$c = new Criteria();
			$c->add(FcabonosPeer::RIFCON, $clasemodelo->getRifcon());
			$c->add(FcabonosPeer::FUEING, '05');
			$c->add(FcabonosPeer::STAPAG, 'N');
			$reg = FcabonosPeer::doSelectone($c);
			if ($reg){
				foreach($reg as $datos)
				{
					if ($monto > 0)
					{
						if ($datos->getSalpag() >= $monto)
						{
							$datos->setSalpag($datos->getSalpag() - $monto);
						}else{
							$datos->setSalpag(0);
							$monto = $monto - $datos->getSalpag();
						}
						if ($datos->getSalpag() == 0)
						{
							$datos->setStapag('S');
						}
					}
					$datos->save();
				}
			}
			////////////////

			if ($saldo < 0){  $saldo =0;  }

			if ($x[$j]->getEdodecstatus() == 'VIGENTE')
			{
				$x[$j]->setEdodec('V');

			}elseif ($x[$j]->getEdodecstatus() == 'VENCIDA')
			{
				$x[$j]->setEdodec('E');
			}

			if ($x[$j]->getMondec() == $clasemodelo->getAutliq())
			{
				$x[$j]->setEdodec('P');
			}

		     $x[$j]->save();
 	         $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}
	}


	public static function EliminarFacespdec($clasemodelo,$grid,$gridDeuda)
	{
	    try{
			$c = new Criteria();
			$c->add(FcdeclarPeer::NUMDEC, $clasemodelo->getNumdec());
			FcdeclarPeer::doDelete($c);

			$c = new Criteria();
			$c->add(FcesplicPeer::NROCON, $clasemodelo->getNumref());
			$reg = FcesplicPeer::doSelectone($c);
			if ($reg)
			{
				$reg->getStadec('N');
				$reg->save();
			}

			return -1;

		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}

	}


	public static function saveFacapudec($clasemodelo,$grid,$gridDeuda)
	{
	    try{
		  $x = $gridDeuda[0];
		  $y = $grid[0];

	      if (!$clasemodelo->getId()) //COTIZACION NUEVA
          {
          	exit('55555');
        	$numero = "A".substr($clasemodelo->getNumref(),3,6)."/".substr($clasemodelo->getFechafin(),6,4);
            $sql = "select numdec from fcdeclar where numdec='".$numero."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              return 710;
            }
			$clasemodelo->setNumdec($numero);
          }
exit('666');
			$c = new Criteria();
			$c->add(FcapulicPeer::NROCON, $clasemodelo->getNumref());
			$reg = FcapulicPeer::doSelectone($c);
			if ($reg){  $reg->setStadec('D'); $reg->save();
			}

			//Saldo_Abono
			$c = new Criteria();
			$c->add(FcabonosPeer::RIFCON, $clasemodelo->getRifcon());
			$c->add(FcabonosPeer::FUEING, '06');
			$c->add(FcabonosPeer::STAPAG, 'N');
			$reg = FcabonosPeer::doSelectone($c);
			if ($reg){  $saldo = $reg->getSalpag();  }else{ $saldo = 0;  }

	      $j=0;
	      while ($j<count($x))
	      {
	      	$x[$j]->setNumdec($clasemodelo->getNumdec());
	      	$x[$j]->setFueing($clasemodelo->getFuente());
	      	$x[$j]->setFecdec($clasemodelo->getFecdec());
	      	$x[$j]->setRifcon($clasemodelo->getRifcon());

	      	$x[$j]->setNumref($clasemodelo->getNumref());
	      	$c = $j+1;
	      	$x[$j]->setNumero($c);
	      	$x[$j]->setMora(0);
	      	$x[$j]->setProntopg(0);
	        $x[$j]->setNumpag($clasemodelo->getNumpag());
	        $x[$j]->setFundec($clasemodelo->getFundec());

			$c = new Criteria();
			$c->add(FcfueprePeer::CODFUE, $clasemodelo->getFuente());
			$reg = FcfueprePeer::doSelectone($c);
			if ($reg){  $reg->setDeufec($reg->getDeufec()+$x[$j]->getMondec());  $reg->save();}

			if ($saldo <= $x[$j]->getMondec())
			{
				$x[$j]->setAutliq($saldo);
			}else{
				$x[$j]->setAutliq($x[$j]->getMondec());
			}

			$saldo = $saldo - $x[$j]->getMondec();
			$monto = $x[$j]->getAutliq();
			//Actualizar_Saldo
			$c = new Criteria();
			$c->add(FcabonosPeer::RIFCON, $clasemodelo->getRifcon());
			$c->add(FcabonosPeer::FUEING, '06');
			$c->add(FcabonosPeer::STAPAG, 'N');
			$reg = FcabonosPeer::doSelectone($c);
			if ($reg){
				foreach($reg as $datos)
				{
					if ($monto > 0)
					{
						if ($datos->getSalpag() >= $monto)
						{
							$datos->setSalpag($datos->getSalpag() - $monto);
						}else{
							$datos->setSalpag(0);
							$monto = $monto - $datos->getSalpag();
						}
						if ($datos->getSalpag() == 0)
						{
							$datos->setStapag('S');
						}
					}
					$datos->save();
				}
			}
			////////////////

			if ($saldo < 0){  $saldo =0;  }

			if ($x[$j]->getEdodecstatus() == 'VIGENTE')
			{
				$x[$j]->setEdodec('V');

			}elseif ($x[$j]->getEdodecstatus() == 'VENCIDA')
			{
				$x[$j]->setEdodec('E');
			}

			if ($x[$j]->getMondec() == $clasemodelo->getAutliq())
			{
				$x[$j]->setEdodec('P');
			}

		     //$x[$j]->save();
		     H::printR($x[$j]);
		     exit();
 	         $j++;
	      }

	      $z=$grid[1];
	      $j=0;
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

			return -1;

		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}
	}


	public static function EliminarFacapudec($clasemodelo,$grid,$gridDeuda)
	{
	    try{
			$c = new Criteria();
			$c->add(FcdeclarPeer::NUMDEC, $clasemodelo->getNumdec());
			FcdeclarPeer::doDelete($c);

			$c = new Criteria();
			$c->add(FcapulicPeer::NROCON, $clasemodelo->getNumref());
			$reg = FcapulicPeer::doSelectone($c);
			if ($reg)
			{
				$reg->getStadec('N');
				$reg->save();
			}

			return -1;

		} catch (Exception $ex){
			echo $ex; exit();
			 return 0;
		}

	}

        public static function generarCorrelativoConvenio($clase)
        {
            $tienecorrelativo=false;
            $correlativo = '';

            if ($clase->getCodsol() == '##########')
            {
                if (Herramientas::getVerCorrelativo('refcon','fcconpag',&$r)) // Buscar Correlativo
                {
                    $tienecorrelativo=true;
                    $encontrado=false;

                       while (!$encontrado)
                       {
                         $r1 = str_pad($r, 6, '0', STR_PAD_LEFT);
                         $numero = "DHM".substr($r1, 2, strlen($r1))."/".date($clase->getFeccon('y'));
                         $sql="select refcon from fcconpag where refcon ='".$numero."'";
                         if (Herramientas::BuscarDatos($sql,&$result))
                         {
                           $r=$r+1;
                         }
                         else
                         {
                           $encontrado=true;
                         }
                       }

                   $correlativo = str_pad($r, 6, '0', STR_PAD_LEFT);
                }
            }
            else
            {
               $correlativo = str_replace('#','0',$clase->getCodsol());
            }

            /* if ($tienecorrelativo==true)
             {
               Herramientas::getSalvarCorrelativo('reftra','cpsoltrasla','Referencia',$correlativo,&$msg);
             }*/
            return $correlativo;
       }

        public static function salvarConvenio($clase, $gridC, $gridP, $gridR){
            //GUARDA CONVENIO
            $cod = self::generarCorrelativoConvenio($clase);
            $refcon = "DHM".substr($cod, 2, strlen($cod))."/".date($clase->getFeccon('y'));

            $clase->setRefcon($refcon);
            $clase->setStacon("N");
            $clase->save();

            //GRABAR DETALLE CONVENIO
                //EN CASO DE MODIFICACION, Elimina los datos viejos
                $c = new Criteria();
                $c->add(FcdetconPeer::REFCON,$refcon);
                $reg = FcdetconPeer::doSelect($c);

                if($reg){
                    foreach($reg as $r){
                        $r->delete();
                    }

                }

            $gridS = $gridC[0];

            $i = 0;
            $con = 1;
            while ($i < count($gridS))
            {
                if ($gridS[$i])
                {
                    $c2 = new Fcdetcon();
                    $c2->setRefcon($refcon);
                    $c2->setDescuo($gridS[$i]['descuo']);
                    $c2->setObscuo($gridS[$i]['obscuo']);
                    $c2->setFecven($gridS[$i]['fecven']);
                    $c2->setMoncuo($gridS[$i]['moncuo']);
                    $c2->setMonpag(0);
                    $c2->setNumdec($refcon);
                    $c2->setNumcuo($con);
                    $c2->save();
                    $i++;
                    $con++;
                 }else
                 {
                    $i++;
                 }
              }

            //GRABAR DETALLE CONVENIO POR DESGLOSADO POR FUENTE
                //EN CASO DE MODIFICACION, Elimina los datos viejos
                $c = new Criteria();
                $c->add(FcdetconfuePeer::REFCON,$refcon);
                $reg = FcdetconfuePeer::doSelect($c);

                if($reg){
                    foreach($reg as $r){
                        $r->delete();
                    }

                }

            $gridS = $gridR[0];

            $i = 0;
            $con = 1;
            while ($i < count($gridS))
            {
                if ($gridS[$i])
                {
                    $c2 = new Fcdetconfue();
                    $c2->setRefcon($refcon);
                    $c2->setDescuo($gridS[$i]['descuo']);
                    $c2->setObscuo($gridS[$i]['obscuo']);
                    $c2->setFecven($gridS[$i]['fecven']);
                    $c2->setMoncuo($gridS[$i]['moncuo']);
                    $c2->setMonpag(0);
                    $c2->setFuente($gridS[$i]['fuente']);
                    $c2->setNumdec($refcon);
                    $c2->setNumcuo($con);
                    $c2->save();
                    $i++;
                    $con++;
                 }else
                 {
                    $i++;
                 }
              }

            //Actualiza Deudas Antiguas
            $gridS = $gridP[0];

            $i = 0;
            $con = 1;
            while ($i < count($gridS))
            {
                if ($gridS[$i])
                {
                    $c2 = new Fcdeucon();
                    $c2->setRefcon($refcon);
                    $c2->setFecven($gridS[$i]['fecven']);
                    $c2->setFueing($gridS[$i]['fuente']);
                    $c2->setNumdec($gridS[$i]['numdec']);
                    $c2->setNumero($con);
                    $c2->save();


                    $c = new Criteria();
                    $c->add(FcdeclarPeer::NUMDEC, $gridS[$i]['numdec']);
                    $c->add(FcdeclarPeer::NUMREF, $refcon);
                    $c->add(FcdeclarPeer::FECVEN, $gridS[$i]['fecven']);
                    $c->add(FcdeclarPeer::FUEING, $gridS[$i]['fueing']);

                    $c3 = new Fcdeclar();


                    $i++;
                    $con++;
                 }else
                 {
                    $i++;
                 }
              }

            return -1;
        }
        /*


' actualizar deudas antiguas
   For Pos = 1 To GridBd1.Rows - 1
      If Trim(GridBd1.TextMatrix(Pos, 0)) <> "" Then
         Sql = "Select * from FCDeuCon"
         Set Tabla2 = DataBaseGrid.OpenResultset(Sql, rdOpenDynamic, rdConcurRowVer, rdExecDirect)


         Sql = "Select * from FCDECLAR where NumDec='" + GridBd1.TextMatrix(Pos, 3) + "' and NumRef='" + GridBd1.TextMatrix(Pos, 4) + "' and TO_CHAR(FecVen,'dd/mm/yyyy')='" + GridBd1.TextMatrix(Pos, 6) + "' And Numero='" + GridBd1.TextMatrix(Pos, 1) + "' AND FueIng='" + GridBd1.TextMatrix(Pos, 15) + "'"
         Set TablaPagos = DataBaseGrid.OpenResultset(Sql, rdOpenDynamic, rdConcurRowVer, rdExecDirect)
         TablaPagos.Edit
         TablaPagos!EdoDec = "P"
         TablaPagos!AutLiq = TablaPagos!MonDec
         TablaPagos!ConPAG = "S"
'         LaFuente = TablaPagos!Fueing
         TablaPagos.Update
         TablaPagos.Close
      End If
   Next

' generar deudas nuevas
   Sql = "Select * from FCDECLAR"
   Set FCDeclar = DataBaseGrid.OpenResultset(Sql, rdOpenDynamic, rdConcurRowVer, rdExecDirect)

   For Pos = 1 To GridBd5.Rows - 1
''      Numero = "C" + FILL(CStr(Pos), "0", 2, 1) + Mid(DatosIns(0).Text, 4, 7)
''      Numero = "C" + FILL(CStr(Pos), "0", 2, 1) + Mid(DatosIns(0).Text, 4, 7)
      FCDeclar.AddNew
      FCDeclar!NumDec = DatosIns(0).Text ''"C" & FILL(CStr(Pos), "0", 2, 1) & Mid(DatosIns(0).Text, 4, 7)
      FCDeclar!Numero = FILL(CStr(Pos), "0", 2, 1)
      FCDeclar!FecVen = CDate(GridBd5.TextMatrix(Pos, 0))
      FCDeclar!Fueing = GridBd5.TextMatrix(Pos, 5)
      FCDeclar!FecDec = Fechas(0).Text
      FCDeclar!RifCon = FILL(DatosIns(1).Text, " ", 14, 3)
      FCDeclar!Tipo = "CVP"
      FCDeclar!Nombre = Trim(GridBd5.TextMatrix(Pos, 2)) + " Porcion Corresp. a " + Trim(GridBd5.TextMatrix(Pos, 1))
      FCDeclar!NumRef = DatosIns(0).Text
      FCDeclar!MonDec = CDbl(GridBd5.TextMatrix(Pos, 4))
      FCDeclar!mora = CDbl(0)
      FCDeclar!AutLiq = CDbl(0)
      FCDeclar!ProntoPg = CDbl(0)
      FCDeclar!EdoDec = "V"
      FCDeclar!ConPAG = "S"
      FCDeclar!FUNDEC = NomUsu
      FCDeclar.Update
   Next
   FCDeclar.Close
   'GenerarPago
Exit Sub

errores:
If Err.Number > 0 Then
  m = MsgBox("Advertencia Número: " + Str(Err.Number) + " en el sistema (" + Err.Description + ")", vbCritical, "Facturación de Hacienda Municipal")
   Err.Clear
   Limpiar
   Exit Sub
End If 'err.number
End Sub
         */


}

?>
