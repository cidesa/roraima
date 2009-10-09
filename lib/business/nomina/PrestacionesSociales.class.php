<?php
/**
 * Prestaciones Sociales: Clase estática para trabajar con las prestaciones sociales
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class PrestacionesSociales
{

 /* public static function FormatoFecha($fecraya)
  {
   $fecha=split('-',$fecraya);
   $fecbarra=$fecha[2]."/".$fecha[1]."/".$fecha[0];
   return $fecbarra;
  }*/


  public static function VerificaEmpLiquidado($codemp)
  {
	   $sql = "Select CodEmp from NPLiquidacion_Det where CodEmp='". $codemp . "'";
	   if (Herramientas::BuscarDatos($sql,&$result))
	       return false;
	   else
	       return true;
  }

  public static function FechaparaCalculo($codcon)
  {
   $sql = "Select fecinireg From NPTipCon Where CodTipCon = '".$codcon."'";
   if (Herramientas::BuscarDatos($sql,&$result))
   {
	      $FecCalculo =$result[0]['fecinireg'];
		  return true;
   }
   else
   {
         $FecCalculo = "";
	     return false;
    }
  }

  public static function TiempoServicioTotal($CodEmpleado,&$diaSumar,&$mesSumar,&$annoSumar,&$diasTot,&$mesesTot,&$annostot,$dentroFuera)
  {
		//dentro es D,  F es fuera
		//'I= historico de ingresos egresos
		if ($dentroFuera == "F")
		  $sql = " SELECT SUM(cuantotiempo(FECINI,FECTER,'CD','0')) as diaspub,
		         SUM(cuantotiempo(FECINI,FECTER,'CM','0')) as mesespub,
		         SUM(cuantotiempo(FECINI,FECTER,'CY','0')) as annospub
		         FROM NPEXPLAB WHERE CodEmp = '". $CodEmpleado . "'
		         AND STACAR = 'F' AND TIPORG = 'Público' ";

		 else if ($dentroFuera== "D")
		   $sql = " SELECT SUM(cuantotiempo(FECINI,FECTER,'CD','0')) as diaspub,
		         SUM(cuantotiempo(FECINI,FECTER,'CM','0')) as mesespub,
		         SUM(cuantotiempo(FECINI,FECTER,'CY','0')) as annospub
		         FROM NPEXPLAB WHERE CodEmp = '".$CodEmpleado."'
		         AND STACAR = 'D'";

		else if ($dentroFuera == "I")
		  $sql = "SELECT SUM(cuantotiempo(A.FECING,FECEGR,'CD','0')) as diaspub,
		         SUM(cuantotiempo(A.FECING,FECEGR,'CM','0')) as mesespub,
		         SUM(cuantotiempo(A.FECING,FECEGR,'CY','0')) as annospub
		         FROM NPHIINEG A,NPHOJINT B WHERE A.CODEMP=B.CODEMP
				 AND A.FECEGR<>coalesce(B.FECRET,'31-DEC-2500') AND A.CodEmp = '".$CodEmpleado."' ";


		 $diasPub = 0;
		 $MesesPub = 0;
		 $annosPub = 0;


		 if (Herramientas::BuscarDatos($sql,&$result))
		 {
		     if (!empty($result[0]['diaspub'])) $diasPub =$result[0]['diaspub']; else $diasPub=0;
		     if (!empty($result[0]['mesespub'])) $diasPub =$result[0]['mesespub']; else $MesesPub=0;
		     if (!empty($result[0]['annospub'])) $diasPub =$result[0]['annospub']; else $annosPub=0;

		    // adaptamos la fecha a fechas reales
		    if ($diasPub > 30)
		    {
		       $MesesPub = $MesesPub + (int)($diasPub / 30);
		       $diasPub = $diasPub - ((int)($diasPub / 30) * 30);
		    }
		    if ($MesesPub > 11)
		    {
		       $annosPub = $annosPub + (int)($MesesPub / 12);
		       $MesesPub = $MesesPub - ((int)($MesesPub / 12) * 12);
		    }
		 }

		 $diasTot = $diaSumar + $diasPub;
		 $mesesTot = $mesSumar + $MesesPub;
		 $annostot = $annoSumar + $annosPub;

		 if ($diasTot > 30)
		 {
		    $mesesTot = $mesesTot + (int)($diasTot / 30);
		    $diasTot = $diasTot - ((int)($diasTot / 30) * 30);
  		  }
		 if ($mesesTot > 11)
		 {
		    $annostot = $annostot + (int)($mesesTot / 12);
		    $mesesTot = $mesesTot - ((int)($mesesTot / 12) * 12);
		  }
}


  public static function CalculaTiempo($strFec1, $strFec2,$strFecIni,$strFecFin,$strFecIng,$codemp,$CodCon,$ftrabajado=false)
  {
   $sql = "select cuantotiempo(to_date('". Herramientas::FormatoFecha($strFec1) ."','DD/MM/YYYY'),to_date('". Herramientas::FormatoFecha($strFec2) ."','DD/MM/YYYY'),'CD','0') as dias,
                  cuantotiempo(to_date('". Herramientas::FormatoFecha($strFec1) ."','DD/MM/YYYY'),to_date('". Herramientas::FormatoFecha($strFec2) ."','DD/MM/YYYY'),'CM','0') as meses,
                  cuantotiempo(to_date('". Herramientas::FormatoFecha($strFec1) ."','DD/MM/YYYY'),to_date('". Herramientas::FormatoFecha($strFec2) ."','DD/MM/YYYY'),'CY','0') as annos From Empresa ";

   if (Herramientas::BuscarDatos($sql,&$result))
   {
	      $dias =$result[0]['dias'];
	      $meses =$result[0]['meses'];
	      $annos =$result[0]['annos'];
   }//if (Herramientas::BuscarDatos($sql,&$result))

   if ($dias >= 30)
   {
      $dias = 0;
      If ($meses < 11)
         $meses = $meses + 1;
      else
      {
         $meses = 0;
         $annos = $annos + 1;
      }
   }// if ($dias >= 30)

   if ($meses==12)
   {
      $meses = 0;
      $annos = $annos + 1;
   }

 //A CONTINUACION SE BUSCA EN LA EXPERIENCIA LABORAL DEL EMPLEADO EN NPEXPLAB

  $diasTot = 0;
  $mesesTot = 0;
  $annostot = 0;

 // si se toma en cuenta la experiencia fuera de la empresa dentro del contrato colectivo
 // se se suma al tiempo de servicio
 // de no ser asi (else) dichas variables totales se le setean  los mismos valores del tiempo de servicio

   $AnoServicio= (int)(Herramientas::dateDiff("d",$strFecIng, $strFecFin)/365);

   ##print "Ano servicio ". $AnoServicio. " Calculado con estas fechas, fecini ". $strFecIng. " fec fin ".$strFecFin;
   //Colocar la fecha en el formato correcto para ejecutar el sql

   $strSQL = "Select antap From NPBonoCont Where ANOVIG <= TO_DATE('". Herramientas::FormatoFecha($strFecIni)."', 'DD/MM/YYYY') And ANOVIGHAS >= TO_DATE('". Herramientas::FormatoFecha($strFecFin) ."', 'DD/MM/YYYY')  And
       ".$AnoServicio." >= Desde  and  ".$AnoServicio." <= Hasta  and CodTipCon = '". $CodCon . "' Order By AnoVig desc";
   if (Herramientas::BuscarDatos($strSQL,&$res))
     $iAntAp = $res[0]['antap'];
   else
     $iAntAp = "N";


  if ($iAntAp == "S")
  {
     self::TiempoServicioTotal($codemp, &$dias, &$meses, &$annos, &$diasTot, &$mesesTot, &$annostot, "F");
  }
  else
  {
     $diasTot = $dias;
     $mesesTot = $meses;
     $annostot = $annos;
  }

   $iDias = $dias;
   $iMeses = $meses;
   $iAnnos = $annos;


   if (!$ftrabajado)
   {
      $lblDiasServ = $iDias;
      $lblMesesServ = $iMeses;
      $lblAnnosServ = $iAnnos;
   }
   else
   {
      $lblDiasTrab = $diasTot;
      $lblMesesTrab = $mesesTot;
      $lblAnnosTrab = $annostot;
   }

    #print " D ".$iDias. " M ".$iMeses. " A ".$iAnnos;


  }

  public static function  CalculoPeriodoNuevoRegimen($strFechaDel, $strFechaAl,$bDiaInicioPeriodo,$bDiasMes,$lFila,$codemp)
  {

   $CalculoPeriodoNuevoRegimen = True;

   $strSQL = "Select Max(FecFinCon) as Fecha, Sum(MonAsi) as Salario,CodEmp  From NPSalInt Where CodEmp = '". $codemp ."'
             and FecFinCon <= TO_DATE('". Herramientas::FormatoFecha($strFechaAl) ."','DD/MM/YYYY') Group By CodEmp,FecFinCon Order By Fecha Desc";

  #print $strSQL;

  if (Herramientas::BuscarDatos($strSQL,&$result))
  {
      if (!empty($result[0]['fecha']))
      {
         //Calcula los dias de diferencia entre las fechas
        $lDiasDif = Herramientas::dateDiff("d", $strFechaDel, $strFechaAl)+ 1;
        #print "<br> RESTA de fechas: ".$lDiasDif;
      }
  }

  return true;

 /*           ' Obtiene los dias para el Art. 108
            ' 5 (+ 2 por cada a�o dentro y fraccion >= 6 meses
            ' dentro de la empresa despues de los 2 primeros a�os)
            If Day(strFechaDel) = bDiaInicioPeriodo Or CuentaUltimo = 1 Then
               bAnnos = DateDiff("yyyy", strFecCalculo, strFechaDel)

               ' Deposito de dias para antiguedad >= 2 a�os
               ' y fraccion >= a 6 meses
               If bAnnos >= 2 And Month(strFechaDel) = Month(strFecCalculo) Then
                     iAnnoEnCurso = Year(strFechaDel)
                     bCtAnnos = IIf(bAnnos = 2, 1, bCtAnnos + 1)
                     iDiasArt8 = 5 + (2 * bCtAnnos)

                     ' Guarda los ultimos dias depositados
                     ' segun art. 108
                     iUltDiasDep = iDiasArt8
               Else
                  If CDate(strFechaDel) <= CDate(mskFecha.Text) Then
                     iDiasArt8 = 5
                  Else
                     iDiasArt8 = 0
                  End If
               End If
            Else
               iDiasArt8 = 0
            End If

            ' Llena las columnas del spread
            Call sprCalculo.SetText(FecDel, lFila, Format(strFechaDel, ""))
            Call sprCalculo.SetText(FecAl, lFila, Format(strFechaAl, ""))
            Call sprCalculo.SetText(Salario, lFila, Format(!Salario, ""))
            sprCalculo.Col = SalDia
            sprCalculo.Row = lFila
            sprCalculo.Formula = _
            "((R" & lFila & "C" & Salario & ":R" & lFila & "C" & Salario & ") /" & _
             iDiasdeCalculo & ")"

            If iAlicuota = 1 Then
               TraerAlicuota strFechaDel, strFechaAl
               If Bisiesto(0).Value = True Then
                  iDiasAnno = IIf(Year(strFechaDel) Mod 4 = 0, 366, 365)
               Else
                  iDiasAnno = 360
               End If
               Call sprCalculo.SetText(AliUti, lFila, Format(((!Salario / 30) * iAliUti / iDiasAnno), "#,##0.00"))
               Call sprCalculo.SetText(AliBono, lFila, Format(((!Salario / 30) * iAliBono / iDiasAnno), "#,##0.00"))
               sprCalculo.Col = SalTot
               sprCalculo.Row = lFila
               sprCalculo.Formula = "R" & lFila & "C" & SalDia & " + R" & lFila & "C" & AliUti & " + R" & lFila & "C" & AliBono
            Else
               sprCalculo.Col = SalTot
               sprCalculo.Row = lFila
               sprCalculo.Formula = "R" & lFila & "C" & SalDia & " + R" & lFila & "C" & AliUti & " + R" & lFila & "C" & AliBono
            End If


            Call sprCalculo.SetText(DiasArt8, lFila, Format(iDiasArt8, ""))
            Call sprCalculo.SetText(DiasDifer, lFila, Format(lDiasDif, ""))

            ' Busca anticipos sobre prestaciones solicitados
            ' por el trabajador y los coloca en el Spread(Grid)
            Call sprCalculo.SetText(AdelantoAnti, lFila, _
            Format(AnticiposSobrePrestaciones(strFechaDel, strFechaAl), ""))

            ' Busca adelantos de intereses sobre prestaciones solicitados
            ' por el trabajador y los coloca en el Spread(Grid)
            Call sprCalculo.SetText(AdelantoInter, lFila, _
            Format(AdelantoSobreIntereses(strFechaDel, strFechaAl), ""))

            ' Calcula le valor para el art. 8
            ' Crea la formula para el calculo
            ' ValorArt8 = (Salario/DiasBonificacion de fin de a�o) * No. dias del Art8
            sprCalculo.Col = ValorArt8
            sprCalculo.Row = lFila

            ' Coloca la formula dentro del Spread

            If Promedio(0).Value = True Then
                  If iDiasArt8 > 5 Then
                     iDiasAdi8 = iDiasArt8 - 5

                     MesDesde = DateAdd("m", -12, strFechaAl)

                     strSQL = "Select  *  From NPSalInt Where CodEmp = '" & Mcodigo & "' "
                     strSQL = strSQL & "And FecFinCon > "
                     strSQL = strSQL & "LAST_DAY(TO_DATE('" & Format(MesDesde, "dd/mm/yyyy") & "','DD/MM/YYYY')) "
                     strSQL = strSQL & "And FecFinCon <= "
                     strSQL = strSQL & "LAST_DAY(TO_DATE('" & Format(strFechaAl, "dd/mm/yyyy") & "','DD/MM/YYYY')) "
                     'Set tabladiasadi = Databasegrid.OpenResultset(strSQL, rdOpenStatic, rdConcurRowver, rdExecDirect)
                     If Buscar_Datos(Databasegrid, tabladiasadi, strSQL) Then
                        Total = 0
                        While Not tabladiasadi.EOF
                           Servicio = Format(CalculaAnnosServicio(lblFecIng, ObtenerValorRegistro(tabladiasadi!FECFINCON)), "")
                           strSQL = "Select * From NPBonoCont "
                           strSQL = strSQL & "Where ANOVIG <= TO_DATE('" + CStr(ObtenerValorRegistro(tabladiasadi!FECINICON)) + "', 'DD/MM/YYYY') And "
                           strSQL = strSQL & " ANOVIGHAS >= TO_DATE('" + CStr(ObtenerValorRegistro(tabladiasadi!FECFINCON)) + "', 'DD/MM/YYYY')  And "
                           strSQL = strSQL & CStr(Servicio) & " >= Desde  and " & CStr(Servicio) & " <= Hasta "
                           strSQL = strSQL & "and CodTipCon = '" & strCodCon & "' "
                           strSQL = strSQL & "Order By AnoVig desc"
                           Set rsTemp = Databasegrid.OpenResultset(strSQL, rdOpenStatic, rdConcurRowver, rdExecDirect)
                           If Not rsTemp.EOF Then
                              SubTotal = tabladiasadi!MONASI / 30
                              Utilidades = SubTotal * ObtenerValorNumericoReal(rsTemp!DiaUti) / iDiasAnno
                              BonoVac = SubTotal * ObtenerValorNumericoReal(rsTemp!DiaVac) / iDiasAnno
                              Total = Total + SubTotal + ((Utilidades + BonoVac) * Val(iAlicuota))
                           Else
                              SubTotal = ObtenerValorNumericoReal(tabladiasadi!MONASI) / 30
                              Utilidades = SubTotal * 1 / iDiasAnno
                              BonoVac = SubTotal * 1 / iDiasAnno
                              Total = Total + SubTotal + ((Utilidades + BonoVac) * Val(iAlicuota))
                           End If
                           tabladiasadi.MoveNext
                        Wend
                     End If


                     sprCalculo.SetText SalAdi, lFila, Total / 12
                     Total = Format(Total / 12, "#,##0.00")
                     Call sprCalculo.GetText(SalTot, lFila, varValor)
                     varValor = Format(varValor, "#,##0.00")
                     Total = varValor * 5 + iDiasAdi8 * Total
                     varValor = Total
                     sprCalculo.SetText ValorArt8, lFila, varValor
                     'sprCalculo.Col = ValorArt8
                     'sprCalculo.Row = lFila
                     'sprCalculo.Formula = _
                     "(R" & lFila & "C" & SalTot & ":R" & lFila & "C" & SalTot & ") * " & _
                        5 & " + " & iDiasAdi8 & " * " & Total
                  Else
                     Total = 0

                     sprCalculo.SetText SalAdi, lFila, Total
                     Call sprCalculo.GetText(SalTot, lFila, varValor)
                     Total = Format(varValor, "#,##0.00")
                     Total = Total * iDiasArt8
                     varValor = Total
                     sprCalculo.SetText ValorArt8, lFila, varValor
                     'sprCalculo.Col = ValorArt8
                     'sprCalculo.Row = lFila
                     'sprCalculo.Formula = _
                     "(R" & lFila & "C" & SalTot & ":R" & lFila & "C" & SalTot & ") * " & _
                        iDiasArt8
                  End If
               Else
'                  Total = 0
'                  sprCalculo.SetText SalAdi, lFila, Total
'                  sprCalculo.Col = ValorArt8
'                  sprCalculo.Row = lFila
'                  sprCalculo.Formula = _
'                     "(R" & lFila & "C" & SalTot & ":R" & lFila & "C" & SalTot & ") * " & _
'                        iDiasArt8
                  If iDiasArt8 > 5 Then
                     iDiasAdi8 = iDiasArt8 - 5
                     MesHasta = strFechaAl
                     If Format(MesHasta, "dd") = 30 Then
                        MesDesde = DateAdd("d", -29, MesHasta)
                     Else
                        MesDesde = DateAdd("d", -30, MesHasta)
                     End If
                     strSQL = "Select  Sum(MonAsi) Salario From NPSalInt Where CodEmp = '" & Mcodigo & "' "
                     strSQL = strSQL & "And FecIniCon >= "
                     strSQL = strSQL & "TO_DATE('" & Format(MesDesde, "dd/mm/yyyy") & "','DD/MM/YYYY') "
                     strSQL = strSQL & "And FecFinCon <= "
                     strSQL = strSQL & "TO_DATE('" & Format(MesHasta, "dd/mm/yyyy") & "','DD/MM/YYYY') "
                     Set tabladiasadi = Databasegrid.OpenResultset(strSQL, rdOpenStatic, rdConcurRowver, rdExecDirect)

                     Total = tabladiasadi!Salario / 30
                     Utilidades = Total * iAliUti / iDiasAnno
                     BonoVac = Total * iAliBono / iDiasAnno
                     Total = Total + Utilidades + BonoVac
                     sprCalculo.SetText SalAdi, lFila, Total
                     Total = Format(Total, "#,##0.00")
                     Call sprCalculo.GetText(SalTot, lFila, varValor)
                     varValor = Format(varValor, "#,##0.00")
                     Total = varValor * 5 + iDiasAdi8 * Total
                     varValor = Total
                     sprCalculo.SetText ValorArt8, lFila, varValor
                     'sprCalculo.Col = ValorArt8
                     'sprCalculo.Row = lFila
                     'sprCalculo.Formula = _
                     "(R" & lFila & "C" & SalTot & ":R" & lFila & "C" & SalTot & ") * " & _
                        5 & " + " & iDiasAdi8 & " * " & Total
                  Else
                     Total = 0

                     sprCalculo.SetText SalAdi, lFila, Total
                     Call sprCalculo.GetText(SalTot, lFila, varValor)
                     Total = Format(varValor, "#,##0.00")
                     Total = Total * iDiasArt8
                     varValor = Total
                     sprCalculo.SetText ValorArt8, lFila, varValor
                  End If

               End If

            'EDGAR MOSQUERA
            'CALCULO DE UNA INCIDENCIA DE BONO VACACIONAL Y/O AGUINALDO
            'ESTO ES UNICO Y EXCLUSIVAMENTE PARA LA BIBLIOTECA DE MIRANDA.
            'VOY A REALIZAR OTRA PANTALLA DE DEFINICI�N DONDE SE PARAMETRICE
            'SI CALCULA LA INCIDENCIA O NO, PARA NO TENER QUE ESTAR PONIENDO
            'ESTO EN COMENTARIO CADA VEZ QUE SE LLEVE EL FUENTE PARA OTRO
            'CLIENTE

            If iCalInc = "S" Then
                Call sprCalculo.GetText(2, lFila, Periodo)
                FecIngreso = lblFecIng.Caption

                'VERIFICAMOS SI CUMPLE A�O EN LA EMPRESA
                If CStr(Format(Periodo, "MM")) = Format(FecIngreso, "MM") Then
                  'Esta cumpliendo a�os en la empresa
                  'Buscamos el monto de Bono Vacacional + Utilidades obtenidos el a�o anterior
                  'al periodo que se esta caluculando
                  SQL = "Select NVL(Sum(Monto),0) as Monto from NPHisCon where CodEmp='" + Mcodigo.Text + "' and TO_Char(FecNom,'YYYY')='" + CStr(Year(CDate(Periodo)) - 1) + "' and (CodCon in (Select CodConVac from NPVacDefGen) or CodCon in (Select CodConUti from NPVacDefGen))"
                  If Buscar_Datos(Databasegrid, NPHISCON, SQL) Then
                     MontoBono = ObtenerValorNumericoReal(NPHISCON!Monto)
                     MontoIncidencia = MontoBono / 360 * iAliBono / 30 * 5
                     sprCalculo.GetText ValorArt8, lFila, MontoArt
                     If CDbl(MontoArt) <> 0 Then
                        sprCalculo.SetText ValorArt8, lFila, MontoArt + MontoIncidencia
                     End If
                     NPHISCON.Close
                  End If
                End If

                'AHORA BUSCAMOS SI COBR� UTILIDADES EN EL PER�ODO
                SQL = "Select * from NPHisCon where CodEmp='" + Mcodigo.Text + "' and CodCon in (Select CodConUti from NPVacDefGen) and TO_CHAR(FecNom,'MM/YYYY')='" + Format(Periodo, "MM/YYYY") + "'"
                If Buscar_Datos(Databasegrid, NPHISCON, SQL) Then
                   NPHISCON.Close
                   SQL = "Select NVL(Sum(Monto),0) as Monto from NPHisCon where CodEmp='" + Mcodigo.Text + "' and TO_Char(FecNom,'YYYY')='" + CStr(Year(CDate(Periodo)) - 1) + "' and (CodCon in (Select CodConVac from NPVacDefGen) or CodCon in (Select CodConUti from NPVacDefGen))"
                   If Buscar_Datos(Databasegrid, NPHISCON, SQL) Then
                      MontoBono = ObtenerValorNumericoReal(NPHISCON!Monto)
                      MontoIncidencia = MontoBono / 360 * iAliUti / 30 * 5
                      sprCalculo.GetText ValorArt8, lFila, MontoArt
                      If CDbl(MontoArt) <> 0 Then
                         sprCalculo.SetText ValorArt8, lFila, MontoArt + MontoIncidencia
                      End If
                      NPHISCON.Close
                   End If
                End If
            End If
            ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


            ' Antiguedad Acumulada
            ' Ant Acu = Suma(Art.8)
            sprCalculo.Col = Antiguedad
            sprCalculo.Row = lFila

            ' Coloca la formula dentro del Spread
            If lFila > 1 Then
'               sprCalculo.Formula = _
'               "Sum(R1C" & ValorArt8 & ":R" & lFila & "C" & ValorArt8 & _
'               ") - R" & lFila - 1 & "C" & AdelantoAnti
               sprCalculo.Formula = _
               "(R" & lFila - 1 & "C" & Antiguedad & "+R" & lFila & "C" & ValorArt8 & _
               ")+0 - R" & lFila - 1 & "C" & AdelantoAnti
            Else
               sprCalculo.Formula = _
               "Sum(R1C" & ValorArt8 & ":R" & lFila & "C" & ValorArt8 & _
               ") "
            End If

            ' Obtiene la Tasa de interes para el periodo entre.
            ' en caso de no estar definida, toma la tasa anterior
            If Interes(0).Value = True Then
            dblTasa = TraerTasaInteresActiva(strFechaDel, strFechaAl)
            End If
            If Interes(1).Value = True Then
            dblTasa = TraerTasaInteresPasiva(strFechaDel, strFechaAl)
            End If
            If Interes(2).Value = True Then
            dblTasa = TraerTasaInteresPromedio(strFechaDel, strFechaAl)
            End If



            If dblTasa = 0 And lFila > 1 Then
                Call sprCalculo.GetText(TasaInteres, lFila - 1, varValor)
                dblTasa = CDbl(varValor)
            End If

            Call sprCalculo.SetText(TasaInteres, lFila, Format(dblTasa, "#,##0.00"))

            ' Obtiene el capital y le resta
            ' anticipos en caso de tenerlos
            sprCalculo.Col = Capital
            sprCalculo.Row = lFila
            If Capitalizacion.ListIndex = 1 Then 'capitalizar mensualmente los interes

                If iDiasArt8 > 0 Then
                   If lFila > 1 Then
    '                  sprCalculo.Formula = _
    '                  "(Sum(R" & lFila & "C" & Antiguedad & ":R" & lFila & "C" & Antiguedad & ")" & _
    '                  "+R" & lFila - 1 & "C" & InteresAcu & ")-R" & lFila - 1 & "C" & AdelantoAnti
                      sprCalculo.Formula = _
                       "R" & lFila & "C" & Antiguedad & "" & _
                      "+R" & lFila - 1 & "C" & InteresAcu & " "
                   Else
                      sprCalculo.Formula = "(R" & lFila & "C" & ValorArt8 & ":R" & lFila & "C" & ValorArt8 & "+ 0" & _
                      ")-R" & lFila & "C" & AdelantoAnti
                   End If
                Else
    '               Call sprCalculo.GetText(Capital, lFila - 1, varValor)
    '               Call sprCalculo.SetText(Capital, lFila, varValor)
    '                  sprCalculo.Formula = _
    '                  "(R" & lFila & "C" & Antiguedad & ":R" & lFila & "C" & Antiguedad & ")" & _
    '                  "+R" & lFila - 1 & "C" & InteresAcu & " "
                  sprCalculo.Formula = "R" & lFila - 1 & "C" & Capital & "-R" & lFila - 1 & "C" & AdelantoAnti
                End If
            ElseIf Capitalizacion.ListIndex = 2 Then 'no capitalizar interes



                If iDiasArt8 > 0 Then
                If lFila > 1 Then
                  sprCalculo.Formula = "R" & lFila & "C" & Antiguedad & ""
                Else
                  sprCalculo.Formula = "R" & lFila & "C" & ValorArt8 & "-R" & lFila & "C" & AdelantoAnti
                End If

                Else
                  sprCalculo.Formula = "R" & lFila - 1 & "C" & Capital & "-R" & lFila - 1 & "C" & AdelantoAnti
                End If

            Else 'capitalizar interes Anualmente

                If iDiasArt8 > 0 Then
                If lFila > 1 Then
                    If bAnnos >= 1 And Month(strFechaDel) = Month(PrimerDeposito) + 1 And Day(strFechaDel) = Day(PrimerDeposito) Then
                        sprCalculo.Formula = _
                       "R" & lFila & "C" & Antiguedad & "" & _
                      "+R" & lFila - 1 & "C" & InteresAcu & " "
                        Call sprCalculo.GetText(InteresAcu, lFila - 1, varValor)
                        AcumulaInteresAnual = varValor
'                        sprCalculo.Formula = "R" & lFila & "C" & Antiguedad & "+" + CStr(AcumulaInteresAnual)
'                        AcumulaInteresAnual = 0
                    Else
                        sprCalculo.Formula = "R" & lFila & "C" & Antiguedad & "+" & CStr(AcumulaInteresAnual)
                    End If
                Else
                  sprCalculo.Formula = "R" & lFila & "C" & ValorArt8 & "-R" & lFila & "C" & AdelantoAnti
                  AcumulaInteresAnual = 0
                End If

                Else
                  sprCalculo.Formula = "R" & lFila - 1 & "C" & Capital & "-R" & lFila - 1 & "C" & AdelantoAnti
                End If

            End If
            ' Calcula los intereses devengados
            ' y los coloca en el Spread
            ' I = C * ((1+Tasa)^(DiasMes/365)-1)
            Call sprCalculo.GetText(Capital, lFila, varValor)

            dblCapital = CDbl(varValor)

            ' Calcula los dias a 365 o 366
            ' dependiendo si se ha indicado
            If Bisiesto(0).Value = True Then
               iDiasAnno = IIf(Year(strFechaDel) Mod 4 = 0, 366, 365)
            Else
               iDiasAnno = 360
            End If
            dblDias = lDiasDif / iDiasAnno

            ' Calcula la tasa de interes
            dblTasaInt = 1 + (dblTasa / 100)

            ' Ejecuta la formula
            If cDefInt(2).Value = True Then
               dblValor = CDbl(varValor) * ((dblTasaInt ^ dblDias) - 1)
            ElseIf cDefInt(0).Value = True Then
               dblValor = CDbl(varValor) * (dblTasa / 100) / 12 / 30 * lDiasDif
            Else
               dblValor = CDbl(varValor) * (dblTasa / 100) / 12 / 30 * lDiasDif
            End If
            ' Coloca el valor dentro del Spread
            Call sprCalculo.SetText(InteresDev, lFila, Format(dblValor))

            ' Formula para Intereses acumulados
            ' Suma(Intereses devengados) - Adelanto Intereses
            sprCalculo.Col = InteresAcu
            sprCalculo.Row = lFila

             ' Coloca la formula dentro del Spread
             If lFila > 1 Then
                sprCalculo.Formula = _
                "(R" & lFila & "C" & InteresDev & "+R" & lFila - 1 & _
                "C" & InteresAcu & ")-R" & lFila & "C" & AdelantoInter
            Else
                sprCalculo.Text = Format(dblValor)
            End If
      Else
         CalculoPeriodoNuevoRegimen = False
      End If
   End With

   Exit Function

End Function*/
}

  public static function verificaRealizaCalculo($fecing,$mesini,$feccor,$codcon,$codemp,$strfecultreg,&$mensajeerror)
  {
       $fecha=split('/',$fecing);
       $fecingfor=$fecha[2]."-".$fecha[1]."-".$fecha[0];
	   $mesing=$fecha[1];
	   $Valor_Year=$fecha[2];
	   $Valor_Ingreso=$mesing  + $mesini;

	   if ($Valor_Ingreso > 12)
	   {
	      $Valor_Ingreso = $Valor_Ingreso - 12;
	      $Valor_Year =$Valor_Year + 1;
	   }

       $Ingreso=$Valor_Year."-".str_pad($Valor_Ingreso,2,"0",STR_PAD_LEFT)."-".$fecha[0];

       //Valida si se le calcula Prestaciones al empleado o no de acuerdo a sus fechas de Ingreso y de Egreso
        if ($feccor!="")
        {
          $fechacor=split('/',$feccor);
          $fechacorte=$fechacor[2]."-".$fechacor[1]."-".$fechacor[0];
        }
        else
        {
           $fechacorte=date("Y-m-d");
        }

        $mes= 1; // los meses a sumar
		$dia= 1; // los dias a restar
   	   	$fecha1=date("Y-m-d", strtotime("$Ingreso -$mes month"));
		$mifecha=date("Y-m-d", strtotime("$fecha1 $dia day"));

		if (strtotime($mifecha) <= strtotime($fechacorte))
		{
          if (self::FechaParaCalculo($codcon))
            {
				$strFecCalculo="1997-06-19";
            }
            else
            {
	          $mensajeerror= "No hay una fecha definida para el inicio del calculo. Posiblemente este trabajador no tenga asociado contrato colectivo.";
	          return false;
            }
            // Inicializa las variable q contienen los totales para la tabla encabezado
			$dblTotAntAcu = 0;
			$dblTotIntAcu = 0;
			$dblTotAdePre = 0;
			$dblTotAdeInt = 0;
			$dblBonTra = 0;
			$dblArt146 = 0;
			//Inicializa la variable q contiene el salario del trabajador al 31-12-1996 para el calculo
			// del bono de transferencia en el regimen anterior
			$dblSalarioAl3112 = 0;
			//Inicializa la variable q contiene el salario
			//del trabajador al 18-06-1997 para el calculo
			//del Art�culo 146 (Utilidades)
			$dblSalarioAl1806 = 0;
			//Inicializa la variable q controla el incremento de los dias segun art. 108
			$iAnnoEnCurso = 0;
			$bCtAnnos = 0;
            $dFecIng = $fecingfor;
		    $iUltDiasDep = 0;
		   // Fecha de inicio del periodo  se calcula: en base al Nuevo Regimen o al Regimen Anterior
		   // Fecha de inicio del periodo se coloca dependiendo de estas condiciones: > 6 meses e ingreso antes 18/12/1996
	        $dFechaRegimen = "1996-12-18";
		    if (strtotime($dFecIng) <= strtotime($dFechaRegimen))
		    {
				 $mes=Herramientas::dateDiff("m",$dFecIng, "1997-06-18");
				 if ($mes>6)
		         {
		            $strFechaIniRef = "1997-07-19";
		            $strFecCalculo = "1997-06-18";
		         }
		    }//if (strtotime($dFecIng) <= strtotime($dFechaRegimen))

		    // <= 6 meses e ingreso antes 18/06/1997
		     $dFechaRegimen ="1997-06-18";
		     if (strtotime($dFecIng) <= strtotime($dFechaRegimen))
		     {
		       $mes=Herramientas::dateDiff("m",$dFecIng, "1997-06-18");
		        if ($mes<=6)
		       {
		            $strFechaIniRef ="1997-10-19";
		            $strFecCalculo = "1997-06-18";
		       }
		     }//if (strtotime($dFecIng) <= strtotime($dFechaRegimen))

		      // Ingreso despues del 19/06/1997
		      $dFechaRegimen  ="1997-06-19";
		      if (strtotime($dFecIng) >= strtotime($dFechaRegimen))
		      {
                 $fecingstr=split('-',$dFecIng);
		         if ($fecingstr[2]== "01")
		         {
		            $mesres=$mesini-1;
		            $strFechaIniRef=date("Y-m-d", strtotime("$dFecIng +$mesres month"));
		         }
		         else
		         {
		            $strFechaIniRef=date("Y-m-d", strtotime("$dFecIng +$mesini month"));
		         }
		         $strFecCalculo = $dFecIng;
		      }//if (strtotime($dFecIng) >= strtotime($dFechaRegimen))


		   $PrimerDeposito =  $strFechaIniRef;
		   //Guarda la fecha de inicio para el calculo de los dias del art. 108
		   $strFechaInicio =  $strFechaIniRef;

		   // Trae el dia de comienzo para el calculo1
 		   $feciniref_arr=split('-',$strFechaIniRef);
		   $bDiaInicio = $feciniref_arr[2];

		   //Trae el numero de dias del mes de la fecha de inicio referenciada
		    $strUltDiaMes = date("t", strtotime($strFechaIniRef));

		   //Crea la Fecha Hasta del periodo
 		   $feciniref_arr=split('-',$strFechaIniRef);
		   $strFechaFinRef = $feciniref_arr[0]."-".$feciniref_arr[1]. "-".$strUltDiaMes;

		   $lblFecCalculo = $strFecCalculo;

		  //Realiza el calculo para los dias, meses y años de servicio y trabajados
		  // CalculaTiempo strFecCalculo, mskFecha
		  // CalculaTiempo lblFecIng, mskFecha, True

       	   #print "Calcula tiempo " .$strFecCalculo. " fecha corte: ". $fechacorte. "resto parametros ".$strFechaIniRef. " y ". $strFechaFinRef. " y ".$dFecIng. " y ".$codemp. " y ".$codcon;
		   self::CalculaTiempo($strFecCalculo, $fechacorte,$strFechaIniRef, $strFechaFinRef,$dFecIng,$codemp,$codcon);
           self::CalculaTiempo($fecingfor, $fechacorte,$strFechaIniRef, $strFechaFinRef,$dFecIng,$codemp,$codcon,true);

            // Trae los datos calculo del trabajador para el calculo pertenecientes al intervalo de fechas referenciadas (inicio y fin)
   			$fBuscar = true;
   			$lRow = 1;

       	   while ($fBuscar)
       	   {
	         //Realiza el calculo en el nuevo regimen
	        //$fAgregaFila =
             #print "PARAMETROS PARA CalculoPeriodoNuevoRegimen <br> ".$strFechaIniRef." ". $strFechaFinRef." ". $bDiaInicio." ".$strUltDiaMes." ".$lRow." ".$codemp;

             $CuentaUltimo=1;
             $fAgregaFila=self::CalculoPeriodoNuevoRegimen($strFechaIniRef, $strFechaFinRef, $bDiaInicio, $strUltDiaMes, $lRow, $codemp);
	      //   $fBuscar=false;

	        $diasFecFin = date("t", strtotime($strFechaFinRef));
	        if (intval($bDiaInicio) <= intval($diasFecFin) || $CuentaUltimo==1)
	        {
			   $dia= 1; // los dias a restar
			   $strFechaIniRef=date("Y-m-d", strtotime("$strFechaFinRef $dia day"));
   	   		   $CuentaUltimo = 0;
	        }
	        else
	        {
	          $strFechaIniRef = $strFechaFinRef;
	          $CuentaUltimo = 1;
	        }

		   // Cambio 04/08/2004, agregandole función VAL
            $diaif=intval($bDiaInicio)-1;
            $fecstr=split('-',$strFechaIniRef);
	        if ($diaif < intval($fecstr[2]))
	        {
	           // Trae el ultimo dia del mes de la fecha de inicio referenciada. Si el trabajador es obrero y se esta calculando
	           //por el regimen anterior(inicio de regimen 1975), se tomara en cuenta:si el mes referencia de inicio es el mes en q se
	           //inicia el calculo, se divide en dos(2) quincenas
	           // las fechas referenciadas, es decir del 1-15 y del 16-FinDeMes (dos intervalos de fechas referenciadas)
	           //de lo contrario se tomara desde el primer dia del mes
	           //hasta el fin del mes(un solo intervalo de fecha referenciada)
		        $strUltDiaMes = date("t", strtotime($strFechaIniRef));
		        //Crea la ultima fecha de referencia para el calculo en curso
	 		    $feciniref_arr=split('-',$strFechaIniRef);
			    $strFechaFinRef = $feciniref_arr[0]."-".$feciniref_arr[1]. "-".$strUltDiaMes;
	        }
	        else
	        {
	            //Crea la ultima fecha de referencia para el calculo en curso
                $diass=intval($bDiaInicio)-1;
                $diass=str_pad($diass,2,"0",STR_PAD_LEFT);
                $feciniref_arr=split('-',$strFechaIniRef);
			    $strFechaFinRef = $feciniref_arr[0]."-".$feciniref_arr[1]. "-".$diass;

			    //checkdate ( int mes, int dia, int anyo )
	            if (!checkdate($feciniref_arr[1], $diass, $feciniref_arr[0]))
	            {
	               $strUltDiaMes = date("t", strtotime($strFechaIniRef));
	               $feciniref_arr=split('-',$strFechaIniRef);
	               $strFechaFinRef = $feciniref_arr[0]."-".$feciniref_arr[1]. "-".$strUltDiaMes;
	            }
	        }

	        #print "<br> Nuevo strFechaIniRef ". $strFechaIniRef;
	        #print "<Br> Nuevo strFechaFinRef ". $strFechaFinRef;
	        #print "<Br> fechacorte ". $fechacorte;
	        #print "<Br> Fecultregimen ". $strfecultreg;

	     if (strtotime($fechacorte) <= strtotime($strfecultreg)) $fecultregcomp= $fechacorte; else $fecultregcomp=$strfecultreg;

	     #print "<br> Fecha a comparar ".$fecultregcomp;
         if (strtotime($strFechaIniRef) <= strtotime($fecultregcomp))
         {
            if ($fAgregaFila)
            {
               $lRow = $lRow + 1;
               #print "paso por aqui";
            }
         }
         else
         {
            $fBuscar = false;
       	 }

       	 #print "CICLO";
      }//while ($fBuscar)

      // Coloca los ajustes al final del Spread
      /*AjusteCompletarAnno sprCalculo;
      AjusteDiasDepositados strFechaIniRef, sprCalculo;

      // Inserta las filas de totales
      // en el Spread(grid)
      InsertarTotalesNuevoRegimen True // , True, True, False*/

			$mensajeerroddr="HASTA AHORA TODO OK...";
		}
		else
		{
           $mensajeerror="El Empleado no puede ser Calculado para Prestación...";
           return false;
		}
  }


  public static function saveNppresoc($nppresoc,$grid)
  {
  	if($grid[4][0]=='V')
	{
		if ((self::GrabarEncabezadoAntiguoRegimen($nppresoc,$grid)) !=-1){ return 0;}
		if ((self::GrabarDetallesAntiguoRegimen($nppresoc,$grid)) !=-1){ return 0;}			
	}else
	{
		if ((self::GrabarEncabezadoNuevoRegimen($nppresoc,$grid)) !=-1){ return 0;}
		if ((self::GrabarDetallesNuevoRegimen($nppresoc,$grid)) !=-1){ return 0;}			
	}
	

	return -1;
  }


  public static function GrabarEncabezadoNuevoRegimen($nppresoc,$grid)
  {
  	try
  	{
	  $c = new Criteria();
	  $c->add(NppresocPeer::CODEMP,$nppresoc->getCodemp());
	  NppresocPeer::doDelete($c);

	  $x  = $grid[0];
	  $x2 = $grid[2];
	  $x3 = $grid[3];   //Tiempo de Servicio

      $nppresoc->setCodcon($x[0]->getCodtipcon());   //!CodCon = strCodCon
      $nppresoc->setFeccal($nppresoc->getFeccalpres());      //!FecCal = lblFecCalculo

      $nppresoc->setDiaser($x3[2][0]);     //!DiaSer = lblDiasServ
      $nppresoc->setMesser($x3[2][1]);    //!MesSer = lblMesesServ
      $nppresoc->setAnoser($x3[2][2]);    //!AnoSer = lblAnnosServ

/*
 *       $nppresoc->setDiaser($x3[0]->getAntdias());     //!DiaSer = lblDiasServ
      $nppresoc->setMesser($x3[0]->getAntmeses());    //!MesSer = lblMesesServ
      $nppresoc->setAnoser($x3[0]->getAntannos());    //!AnoSer = lblAnnosServ
      $nppresoc->setDiatra($x[0]->getAntdias());     //!DiaTra = lblDiasTrab
      $nppresoc->setMestra($x[0]->getAntmeses());    //!Mestra = lblMesesTrab
      $nppresoc->setAnotra($x[0]->getAntannos());    //!AnoTra = lblAnnosTrab

 * */
      $nppresoc->setDiatra($x3[2][0]);     //!DiaTra = lblDiasTrab
      $nppresoc->setMestra($x3[2][1]);    //!Mestra = lblMesesTrab
      $nppresoc->setAnotra($x3[2][2]);    //!AnoTra = lblAnnosTrab

      $nppresoc->setRegpre('N');
      $nppresoc->setStapre('C');

      //totales
      $nppresoc->setIntacu($x2[0]);  //getTotintacu   --> !IntAcu = dblTotIntAcu
      $nppresoc->setAdeint($x2[1]);  //getTotmonadeint --> !adeint = dblTotAdeInt
      $nppresoc->setAntacu($x2[4]);  //getTotmonant  --> !antacu = dblTotAntAcu
      $nppresoc->setAdepre($x2[3]);  //getTotcapitalact   --> !AdePre = dblTotAdePre
	  $nppresoc->setMonpre(H::formatonum($x2[4])+H::Formatonum($x2[0]));  //getTotintacu + getTotmonant
      $nppresoc->save();

	return -1;

	}catch (Exception $ex){
		return 0;
	}
  }

  public static function GrabarDetallesNuevoRegimen($nppresoc,$grid)
  {
  	try{

	$c = new Criteria();
	$c->add(npimppresocPeer::CODEMP,$nppresoc->getCodemp());
	npimppresocPeer::doDelete($c);


    $codemp   = $nppresoc->getCodemp();
    $fechacor = $nppresoc->getFeccor();
    $x  = $grid[0];
    $x2 = $grid[2];
    $x3 = $grid[3];

    $j = 0;
    while ($j<count($x))
    {
      $x[$j]->setCodemp($codemp);
      $x[$j]->setFeccor($fechacor);
      $x[$j]->setSalempdia($x[$j]->getMondia());
	  $x[$j]->setSalemp($x[$j]->getMonto());
      $x[$j]->setDiaart108($x[$j]->getDias());
      $x[$j]->setSaladi($x[$j]->getMondiapro());
      $x[$j]->setCapemp($x[$j]->getCapital());
      $x[$j]->setAntacum($x[$j]->getCapitalact());
      $x[$j]->setValart108($x[$j]->getMonpres());
      $x[$j]->setTasint($x[$j]->getTasa());
      $x[$j]->setDiadif($x[$j]->getMesactual());
      $x[$j]->setIntdev($x[$j]->getMonint());
      $x[$j]->setIntacum($x[$j]->getIntacu());
      $x[$j]->setAdeant($x[$j]->getMonant());
      $x[$j]->setAdepre($x[$j]->getMonadeint());
      $x[$j]->setSaltot($x[$j]->getMondia());  //getTotintacu + getTotmonant
      $x[$j]->setRegpre('N');
     // $x[$j]->settipo('');


      if ($x[$j]->getTipo()=='AJUSTE DIAS ADICIONALES NO DEPOSITADOS')
      {
      	$x[$j]->setTipo('P');

      }else if ($x[$j]->getTipo()=='AJUSTE DIAS NO DEPOSITADOS'){
      	$x[$j]->setTipo('A');

      }else
      {
      	$x[$j]->setTipo('');
      }
      $x[$j]->save();
      $j++;
    }
/*
	for($i = 0; $i < 2; $i += 1)
	{
 	  $c = new Npimppresoc();
      $c->setCodemp($codemp);
      $c->setFeccor($fechacor);
      $c->setFecini($x3[$i]['fecini']);
      $c->setFecfin($x3[$i]['fecfin']);
      $c->setSalempdia($x3[$i]['mondia']);
	  $c->setSalemp($x3[$i]['monto']);
      $c->setDiaart108($x3[$i]['dias']);

      $c->setSaladi($x3[$i]['mondiapro']);

      $c->setCapemp($x3[$i]['capital']);
      $c->setAntacum($x3[$i]['capitalact']);
      $c->setValart108($x3[$i]['monpres']);
      $c->setTasint($x3[$i]['tasa']);
      $c->setDiadif($x3[$i]['mesactual']);
      $c->setIntdev($x3[$i]['monint']);
      $c->setIntacum($x3[$i]['intacu']);
      $c->setAdeant($x3[$i]['monant']);
      $c->setAdepre($x3[$i]['monadeint']);
      $c->setSaltot($x2[0]+$x2[3]);  //getTotintacu + getTotmonant
      $c->setRegpre('N');

      if ($i==0)
      {
      	$c->settipo('P');
      }else{
      	$c->settipo('A');
      }

      $c->save();
	}
*/
	return -1;

	}catch (Exception $ex){
		echo $ex;
		return 0;
	}

//Del                      fecini
//Al                       fecfin
//Total Diario             mondia
//Dias Art. 108            dias
//Salario Día Adicional    monpro
//Capital                  capital
//Antigüedad Acumulada     capitalact


//Valor Art. 108     monpres
     //!MONPRE = CDbl(lblTotal(0))

//Tasa                     tasa
//Dias Diferencia          Dias del Mes (día del fecfin)

//Interés Devengado        monint
//Adelanto Anticipo        monant

//Interés Acumulado     intacu
      //!IntAcu = dblTotIntAcu


//Adelanto Intereses     monadeint
    //!adeint = dblTotAdeInt

//!AdePre = dblTotAdePre (capitalact del ultimo registro)
      //!AdePre = getTotcapitalact (capitalact del ultimo registro)

      //!FECCOR = mskFecha (la fecha de corte)
      //!CodCon = strCodCon (codtipcon)
     // !DiaSer = lblDiasServ (antdias)
     // !MesSer = lblMesesServ (antannos)
    //  !AnoSer = lblAnnosServ (antmeses)

    //  !DiaTra = lblDiasTrab
   //   !Mestra = lblMesesTrab
   //   !AnoTra = lblAnnosTrab
   //   !antacu = dblTotAntAcu (la suma de monant)

  }
  
  public static function GrabarEncabezadoAntiguoRegimen($nppresoc,$grid)
  {
  	try
  	{
	  $c = new Criteria();
	  $c->add(NppresocPeer::CODEMP,$nppresoc->getCodemp());
	  $c->add(NppresocPeer::REGPRE,'V');
	  NppresocPeer::doDelete($c);

	  $x  = $grid[0];
	  $x2 = $grid[2];
	  $x3 = $grid[3];   //Tiempo de Servicio

      $nppresoc->setCodcon($x[0]->getCodtipcon());   //!CodCon = strCodCon
      $nppresoc->setFeccal($nppresoc->getFeccalpres());      //!FecCal = lblFecCalculo

      $nppresoc->setDiaser($x3[2][0]);     //!DiaSer = lblDiasServ
      $nppresoc->setMesser($x3[2][1]);    //!MesSer = lblMesesServ
      $nppresoc->setAnoser($x3[2][2]);    //!AnoSer = lblAnnosServ

      $nppresoc->setDiatra($x3[2][0]);     //!DiaTra = lblDiasTrab
      $nppresoc->setMestra($x3[2][1]);    //!Mestra = lblMesesTrab
      $nppresoc->setAnotra($x3[2][2]);    //!AnoTra = lblAnnosTrab

      $nppresoc->setRegpre('V');
      $nppresoc->setStapre('C');

      //totales
      $nppresoc->setIntacu($x2[0]);  //getTotintacu   --> !IntAcu = dblTotIntAcu
      $nppresoc->setAdeint($x2[1]);  //getTotmonadeint --> !adeint = dblTotAdeInt
      $nppresoc->setAntacu($x2[4]);  //getTotmonant  --> !antacu = dblTotAntAcu
      $nppresoc->setAdepre($x2[3]);  //getTotcapitalact   --> !AdePre = dblTotAdePre
	  $nppresoc->setMonpre(H::formatonum($x2[4])+H::Formatonum($x2[0]));  //getTotintacu + getTotmonant
      $nppresoc->save();

	return -1;

	}catch (Exception $ex){
		return 0;
	}
  }

  public static function GrabarDetallesAntiguoRegimen($nppresoc,$grid)
  {
  	try{

	$c = new Criteria();
	$c->add(NpimppresocantPeer::CODEMP,$nppresoc->getCodemp());
	NpimppresocantPeer::doDelete($c);


    $codemp   = $nppresoc->getCodemp();
    $fechacor = $nppresoc->getFeccor();
    $x  = $grid[0];
    $x2 = $grid[2];
    $x3 = $grid[3];

    $j = 0;
    while ($j<count($x))
    {
      $x[$j]->setCodemp($codemp);
      $x[$j]->setFeccor($fechacor);      
      $x[$j]->setAntacum($x[$j]->getCapitalact());
	  $x[$j]->setAdeant($x[$j]->getMonant());
      $x[$j]->setIntacum($x[$j]->getIntacu());
      $x[$j]->setRegpre('V');
      $x[$j]->save();
      $j++;
    }

	return -1;

	}catch (Exception $ex){
		echo $ex;
		return 0;
	}



  }

  public static function AguinaldosFracionados($codnom,$codemp,$fecegr,$ultimosueldo,$totarr,$estaliquidado)
  {
  	   $arr=array();
	   $diasuti=0;
	   if (!$estaliquidado && $totarr>0)
	   {  #NO ESTA LIQUIDADO
	   	  #Primero verificamos cuantos meses cumplidos trabajados tiene el trabajador en el año 
	   	  $anoegr=date('Y',strtotime($fecegr));
		  $fecegrf=date('d/m/Y',strtotime($fecegr));
		  #PARA CALCULAR LOS MESES DEL AÑO
		  $mesegr=date('m',strtotime($fecegr));
		  $mesnext=str_pad($mesegr+1,2,'0',STR_PAD_LEFT);
		  $anoe=$anoegr;
		  if($mesegr=='12')
		  {
		  	$anoe=$anoegr+1;
			$mesnext='01';
		  }		  	  
		  $sqlmeses = "select case when (to_date('".$fecegrf."','dd/mm/yyyy'))=cast('$anoe-$mesnext-01' as date)-1 then (to_char(to_date('".$fecegrf."','dd/mm/yyyy'),'mm')::numeric -to_char(to_date('01/01/$anoegr','dd/mm/yyyy'),'mm')::numeric)+1 else (to_char(to_date('".$fecegrf."','dd/mm/yyyy'),'mm')::numeric -to_char(to_date('01/01/$anoegr','dd/mm/yyyy'),'mm')::numeric) end as meses";
		  if (Herramientas::BuscarDatos($sqlmeses,&$result))
		   	$meses = $result[0]['meses'];
		  else
		 	$meses = 0;	
			
		  #BUSCAMOS SI ESTA DEFINIDO LOS PARAMETROS DE AGUINALDOS Y FACTOR
		  $agui = 'N';
		  $factor=0;
		  $sqldef = "select  aguicom,apartirmes,factorbonfinanofra from npdefespparpre where codnom='$codnom'";
		  if (Herramientas::BuscarDatos($sqldef,&$result))
		  {
		  	$agui = $result[0]['aguicom'];
		  	$mescom = $result[0]['apartirmes'];			
			if($agui=='S' && intval($meses)>=intval($mescom))
			{
				$meses=12;
			}
			if(is_numeric($result[0]['factorbonfinanofra']) && $result[0]['factorbonfinanofra']!=0)
				if($result[0]['factorbonfinanofra']>1)
					$factor = $result[0]['factorbonfinanofra'];
			
		  }		 	
		  #BUSCAMOS SI COBRÓ UTILIDADES EN EL PERÍODO
          $sqluti = "Select * from NPHisCon where CodEmp='$codemp' and CodCon in (Select CodConUti from NPVacDefGen) and TO_CHAR(FecNom,'YYYY')='$anoegr'";
		  if (!Herramientas::BuscarDatos($sqluti,&$result))
		  { # NO COBRO UTILIDADES
		  	if($meses>=1)
			{
				PrestacionesSociales::TraerAlicuota($codemp,'01/01/'.$anoegr,$fecegrf,&$ialiuti,&$ialibono,&$icalinc,&$utilinc);
				$montouti = ($ialiuti) / 12;
				$montouti = $montouti * $meses;
				#YA NO SE CALCULA LA PARTE DE INCIDENCIA
				$montoinc = 0;
				$montoinc = $montoinc * $montouti;

				/*if($utilinc)
				{
					$sql = "Select coalesce(max(saltot),0) as Monto from NPImpPresoc where CodEmp='$codemp' And Tipo='P'";
					if (Herramientas::BuscarDatos($sql,&$result))
					{
						$montouti = $montouti * $result[0]['monto'];
						$diasuti = $montouti / $result[0]['monto'];
					}else
					    $diasuti = 0;
				}else
				{*/
				    $diasuti = $montouti;
					($factor!=0 && (!is_null($factor))) ? $montouti = $montouti * ($ultimosueldo*$factor/365) : $montouti = $montouti * ($ultimosueldo/30);
					
				//}
				#ARREGLO DEL GRID
			    $sql = "Select * from NPDefPreLiq where CODNOM='$codnom' AND CodCon='005' and PerDes<='$anoegr' and PerHas>='$anoegr'";
				if (Herramientas::BuscarDatos($sql,&$result))
					$partida = $result[0]['codpar'];
				else
				    $partida='';	
				$arr[$totarr]['orden'] = '5';
				$arr[$totarr]['dias'] = $diasuti;
				$arr[$totarr]['monto'] = $montouti + $montoinc;
				$arr[$totarr]['descripcion'] = 'BONIFICACIÓN DE FIN DE AÑO';				
				$arr[$totarr]['partida'] = $partida;
			}else
			{
				#NO SE LE PAGA NADA
			}
		  }else
		  {
		  	#SI COBRO UTILIDADES EN EL PERIODO
		  	if($meses>=1)
			{
				PrestacionesSociales::TraerAlicuota($codemp,'01/01/'.$anoegr,$fecegrf,&$ialiuti,&$ialibono,&$icalinc,&$utilinc);

				$montouti = ($ialiuti) / 12;
				$montouti = $montouti * (12 - $meses);
				#YA NO SE CALCULA LA PARTE DE INCIDENCIA
				$montoinc = 0;
				$montoinc = $montoinc * $montouti;
				
				if($utilinc)
				{
					$sql = "Select coalesce(max(saltot),0) as Monto from NPImpPresoc where CodEmp='$codemp' And Tipo='P'";
					if (Herramientas::BuscarDatos($sql,&$result))
					{
						$diasuti = $montouti;
						$montouti = $montouti * $result[0]['monto'];						
					}						
				}else
				{
					$diasuti = $montouti;
					($factor!=0 && (!is_null($factor))) ? $montouti = $montouti * ($ultimosueldo*$factor/365) : $montouti = $montouti * ($ultimosueldo/30);
				}
				#ARREGLO DEL GRID
				$sql = "Select * from NPDefPreLiq where CODNOM='$codnom' AND CodCon='005' and PerDes<='$anoegr' and PerHas>='$anoegr'";
				if (Herramientas::BuscarDatos($sql,&$result))
					$partida = $result[0]['codpar'];
				else
				    $partida='';	
				$arr[$totarr]['orden'] = '5';
				$arr[$totarr]['dias'] = $diasuti;
				$arr[$totarr]['monto'] = ($montouti + $montoinc)*(-1);
				$arr[$totarr]['descripcion'] = 'BONIFICACIÓN DE FIN DE AÑO';				
				$arr[$totarr]['partida'] = $partida;				
			}else
			{
				PrestacionesSociales::TraerAlicuota($codemp,'01/01/'.$anoegr,$fecegrf,&$ialiuti,&$ialibono,&$icalinc,&$utilinc);
				$montouti = $ialiuti / 12;
				#YA NO SE CALCULA INCIDENCIA
				$montoinc = 0;				
				$montoinc = $montoinc * $montouti;
				$diasuti = $montouti;
				($factor!=0 && (!is_null($factor))) ? $montouti = $montouti * ($ultimosueldo*$factor/365) : $montouti = $montouti * ($ultimosueldo/30);
				#ARREGLO DEL GRID
				$sql = "Select * from NPDefPreLiq where CODNOM='$codnom' AND CodCon='005' and PerDes<='$anoegr' and PerHas>='$anoegr'";
				if (Herramientas::BuscarDatos($sql,&$result))
					$partida = $result[0]['codpar'];
				else
				    $partida='';	
				$arr[$totarr]['orden'] = '5';
				$arr[$totarr]['dias'] = $diasuti;
				$arr[$totarr]['monto'] = ($montouti + $montoinc)*(-1);
				$arr[$totarr]['descripcion'] = 'BONIFICACIÓN DE FIN DE AÑO';				
				$arr[$totarr]['partida'] = $partida;
			}	
		  } 
		  
	   }
	   else
	   {
	   	 #YA ESTA LIQUIDADO
	   	 #SE CALCULO AL PRINCIPIO	   	 
	   } 
	   return $arr;
  }
  
  public static function TraerAlicuota($codemp,$fechaini,$fechafin,&$ialiuti,&$ialibono,&$icalinc,&$utilinc)
  {
  	$sql = "Select * from NPAsiEmpCont where CodEmp='$codemp'";
	if (Herramientas::BuscarDatos($sql,&$result))
		$contrato = $result[0]['codtipcon'];
	else
		$contrato = '001';
	
	$sql = "select trunc((to_date('$fechaini','dd/mm/yyyy')-(select fecing from nphojint where codemp='$codemp'))::numeric/365)::numeric as anoser;";
	if (Herramientas::BuscarDatos($sql,&$result))
		$anoser = $result[0]['anoser'];		
	else
		$anoser=0;		
	$anoser=$anoser+1;
		
	$sql = "select * from npbonocont 
	       where 
		    anovig<= to_date('$fechaini','dd/mm/yyyy') and 
			anovighas >= to_date('$fechafin','dd/mm/yyyy') and 
			$anoser>= desde and $anoser<= hasta and 
			codtipcon = '$contrato'
			order by anovig desc
			";	
    if (Herramientas::BuscarDatos($sql,&$result))
	{
		$ialiuti = $result[0]['diauti'];
		$ialibono = $result[0]['diavac'];
		$icalinc = $result[0]['calinc'];		
		#UtilInt = (ObtenerValorRegistro(rsTemp!UtilInt) = "S")
		$icalinc == "S" ? $utilinc=true : $utilinc=false;		
	}else
	{
		$ialiuti = 1;
		$ialibono = 1;
		$icalinc = "N";		
		$utilinc=false;		
	}			
  	
  }
  
   public static function salvar_liquidacion($clase,$grida,$gridd)
  {
  	  #SALVAR ASIGANCIONES
      $x=$grida[0];
	  $i=0;
	  $codemp=$clase->getCodemp();
	  $c = new Criteria();
	  $c->Add(NpliquidacionDetPeer::CODEMP,$codemp);
	  NpliquidacionDetPeer::doDelete($c);
	  while ($i<count($x))
	  {
	  	$npliq = new NpliquidacionDet();
    	$npliq->setCodemp($codemp);
		$npliq->setConcepto($x[$i]['concepto']);
		$npliq->setMonto($x[$i]['monto']);
		$npliq->setAsided('A');
		$npliq->setNumreg($i);
		$npliq->setCodpre($x[$i]['codpre']);
		$npliq->setCodcon($x[$i]['codcon']);
		$npliq->setNumord('');
		$npliq->setDias($x[$i]['dias']);
    	$npliq->save();
       $i++;
      }      
	  #SALVAR DEDUCCIONES
	  $x=$gridd[0];
	  $i=0;
	  $codemp=$clase->getCodemp();
	  while ($i<count($x))
	  {
    	$npliq = new NpliquidacionDet();
    	$npliq->setCodemp($codemp);
		$npliq->setConcepto($x[$i]['concepto']);
		$npliq->setMonto($x[$i]['monto']);
		$npliq->setAsided('D');
		$npliq->setNumreg($i);
		$npliq->setCodpre($x[$i]['codpre']);
		$npliq->setCodcon($x[$i]['codcon']);
		$npliq->setNumord('');
		$npliq->setDias($x[$i]['dias']);
    	$npliq->save();
       $i++;
      }
	  
	return -1;
  }
  public static function validarNpreghistadeint($codemp, $fecade) {
    // return self:: validarNpantpre($codemp);
    $error = -1;
    $c = new Criteria;
    $c->add(NphojintPeer :: CODEMP, $codemp);
    $per = NphojintPeer :: doSelectOne($c);

    if (!$per) {
      $error = 425;
    } else {
      $c = new Criteria;
      $c->add(NpadeintPeer :: CODEMP, $codemp);
      $c->add(NpadeintPeer :: FECADE, $fecade);
      $per = NpadeintPeer :: doSelectOne($c);

      if ($per) {
        $error = 433;
      }
    }
    return $error;
  }
  
  public static function salvar_nppernom($clase,$grid) {

    $error = -1;
    if($clase->getId()=='')
	{
		foreach($grid[0] as $x)
		{
			$nppernom = new Nppernom();
			$nppernom->setCodnom($clase->getCodnom());
			$nppernom->setAnno($clase->getAnno());
			$nppernom->setMes($x['mes']);
			$nppernom->setFecini($x['fecini']);
			$nppernom->setFecfin($x['fecfin']);
			$nppernom->save();
		}	
	}else
	{
		$c = new Criteria;
	    $c->add(NppernomPeer :: CODNOM, $clase->getCodnom());	
		$c->addAscendingOrderByColumn(NppernomPeer::MES);
	    $per = NppernomPeer :: doSelect($c);		
		if($per)
		{
			foreach($per as $x)
			{				
			    foreach($grid[0] as $r)
				{
					if($x->getMes()==$r['mes'])
					{
						$x->setFecini($r['fecini']);
						$x->setFecfin($r['fecfin']);
						$x->save();
					}	
				}
			}	
		}
				
	}
	
    return $error;
  }

  
  }
class PS extends PrestacionesSociales
{}

?>