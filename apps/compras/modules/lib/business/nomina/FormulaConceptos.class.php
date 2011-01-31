<?php
/**
 * Formulación de Conceptos: Clase estática para validar y generar la formulación de conceptos
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FormulaConceptos {

    public static function CargarListasVariables($codcon,$codnom,$tipo) {

			$objlist=array();
			if($tipo=='C')
			{
				$codigo=$codcon;
				$sql2="Select distinct(a.CodCon) as codcon, b.nomcon from NPASICONNOM a, npdefcpt b, npcalcon c where a.codcon=b.codcon and a.codcon = c.codcon Order By CodCon";
				if (Herramientas::BuscarDatos($sql2,&$result2))
				{
					$i=0;
					$objlist = array();
					$r=0;
					while ($i<count($result2))
					{
						if ($result2[$i]["codcon"] < $codigo)
						{
							$v = "C" . $result2[$i]["codcon"] . "S";
							$objlist[$v] = "C" . $result2[$i]["codcon"] . "S" . " " . $result2[$i]["nomcon"] ;
							//$r++;
							$v = "C" . $result2[$i]["codcon"] . "A";
							$objlist[$v] = "C" . $result2[$i]["codcon"] . "A" . " " . $result2[$i]["nomcon"];
						    //$r++;
						}
						$i++;
					}
				}
				return $objlist;

			}elseif($tipo=='M')
			{
				$codigo=$codnom;
				$sql="Select A.CODNOM,A.CODCON,A.STATUS,C.NOMCON from NPDEFCPT C,NPDEFMOV A,NPASICONNOM B
							WHERE A.CODCON=C.CODCON AND A.CODCON=B.CODCON AND A.CODNOM=B.CODNOM AND A.CodNom = '".$codigo."'
							ORDER BY A.CODCON,A.STATUS ";
				if (Herramientas::BuscarDatos($sql,&$result))
				{
					$i=0;
	                $r=0;
					while ($i<count($result))
					{
						$v = "M" . $result[$i]["codnom"] . $result[$i]["codcon"] . $result[$i]["status"];
						$objlist[$v] = "M" . $result[$i]["codnom"] . $result[$i]["codcon"] . $result[$i]["status"] . " " . $result[$i]["nomcon"];
						//$r++;
						$i++;
					}
				}
				return $objlist;

			}elseif($tipo=='H')
			{
				$codigo=$codnom;
				$c2 = new Criteria();
				$obj2 = NpdefcptPeer::doSelect($c2);
				if ($obj2)
				{
					$r=0;
					foreach ($obj2 as $res)
					{
						$c3 = new Criteria();
						$c3->add(NpdefmovPeer::CODCON,$res->getCodcon());
						$c3->setDistinct();
						$obj3 = NpdefmovPeer::doSelect($c3);
						if ($obj3)
						{
							foreach ($obj3 as $o)
							{
								$v = "H" . $o->getCodnom() . $res->getCodcon();
								$objlist2[$v] = "H" . $o->getCodnom() . $res->getCodcon() . " " . $res->getNomcon();
								//$r++;
							}
						}else
						{
							$v = "H" . $codigo . $res->getCodcon();
							$objlist2[$v] = "H" . $codigo . $res->getCodcon() . " " . $res->getNomcon();
							//$r++;
						}
					}
				}
				return $objlist2;
			}

    }

}

?>