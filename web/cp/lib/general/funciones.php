<?
//session_start();
  //require_once('../../adodb/adodb.inc.php');
  //require_once('../../lib/bd/basedatosAdo.php');

  function obtenerpost($campo)
  {
    $aux="";
  if (array_key_exists($campo,$_POST))
  {
     $aux=$_POST[$campo];
     $aux=str_replace("�","¿",$aux);
  }
  return $aux;
  }

  function obtenerget($campo)
  {
    $aux="";
  if (array_key_exists($campo,$_GET))
  {
     $aux=$_GET[$campo];
     $aux=str_replace("�","¿",$aux);
  }
  return $aux;
  }


  function LlenarComboSql($sql,$campo1,$campo2,$seleccionado,$con)
  {
     $tb=$con->select($sql);
   while (!($tb->EOF))
   {
     if ($tb->fields[$campo1]==$seleccionado)
        {
     ?>
        <option value="<? print $tb->fields[$campo1];?>" selected><? print $tb->fields[$campo2];?></option>
     <?
        }
     else
        {
     ?>
        <option value="<? print $tb->fields[$campo1];?>"><? print $tb->fields[$campo2];?></option>
     <?
      }
     $tb->MoveNext();
   }
  }

  function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
   if (!$tb->EOF)
   {
     print $tb->fields[$campo1];
   }
   else
   {
     print "";
   }
  }

  function pintagrid($tabla,$filas,$columnas,$titulos)
  {
     print "<table width='100%' border='0' cellpadding='0' cellspacing='0'>";

   //Pintamos los titulos del grid
   print "<tr>";
   for ($j=0;$j<$columnas;$j++)
   {
      print "<td <font color='#333399' size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>".$titulos[$j]."</strong></font></td>\n";
   }
   print "</tr>";

   //Pintamos el grid
   for ($i=0;$i<$filas;$i++)
   {
      if ($tabla[$i][0]!="")
    {
      print "<tr>";
    for ($j=0;$j<$columnas;$j++)
    {
       print "<td>".$tabla[$i][$j]."</td>\n";
    }
    print "</tr>";
    }
   }
   print "</table>";
  }
  /////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////FUNCION MONTO ESCRITO//////////////////////////////////////
  function montoescrito($numero,$con)
  {
  $poscoma=0;
  $nombre='';
  $contmil=0;
  $nrochar=1;
  $tira="";
  $primero="";
  $segundo="";
  $tercero="";
  $cuarto="";
  $quinto="";
  $sexto="";
  $sepmil1="";
  $sepmil2="";
  $sepmil3="";
  $sepmil4="";
  $sepmil5="";
  $sepmil6="";
  $tira3="";
  $melones=" MILLONES ";
  $billones=" BILLONES ";
  //Formatear el N�mero en Estudio
  $monchar=number_format($numero,2,".",",")."";
  $monchar=trim($monchar);
  $pospunto=strpos($monchar,'.'); //Posici�n del Punto Decimal
  $indchar=$pospunto;             //Comienzo del recorrido de lectura
                                  //Se determina directamente
                                  //la parte decimal del n�mero
  $decimal=" CON ".substr($monchar,$pospunto+1)."/100";
  while($indchar>=0)        //Comienza el ciclo m�s externo
  {
     $contmil=$contmil+1;
     $indchar=$indchar - 1;
     $contchar=1;
     $tira3="";
     $num1="";
     $num2="";
     $num3="";
     $nro=substr($monchar,$indchar,1);
     while(($indchar>=0)&&($contchar<=3))
     {
         $sql="SELECT coalesce(NOMNUM,' ')  as nomnum
               FROM NUMEROS
               WHERE NUM = ".$nro." AND
               POS=".$contchar.";";
         $tb=$con->select($sql);
          if (!$tb->EOF)
     {
       $nombre=$tb->fields["nomnum"];
     }//if (!$tb->EOF)
     else
     {
       $nombre="";
     }//else
         if ($contchar==1)
     {
            $numant=$nro+0;
            $num1=$nombre;
     }//if ($contchar=1)
         elseif ($contchar==2)
     {
            $num2=$nombre;
      $nro=$nro+0;
            if($nro==1)
      {
         $nro=$nro+"";
               if ($numant==1)
         {
                  $num1="";
                  $num2="";
               }//if ($numant=1)
         elseif ($numant==2)
         {
                  $num1="";
                  $num2="DOCE";
               }//elseif ($numant=2)
         elseif ($numant==3)
         {
                  $num1="";
                  $num2="TRECE";
               }//elseif ($numant=3)
         elseif ($numant==4)
         {
                  $num1="";
                  $num2="CATORCE";
               }//elseif ($numant=4)
               elseif ($numant==5)
         {
                  $num1="";
                  $num2="QUINCE";
               }//elseif ($numant=5)
            }//if($nro=1)
     }//elseif ($contchar=2)
         elseif ($contchar==3)
     {
            $num3=$nombre;
         }//elseif ($contchar=3)
         $indchar=$indchar -1;
         $contchar=$contchar + 1;
         $nro=substr($monchar,$indchar,$nrochar);
     if (trim($nro)==",")
     {
       $nro="-1";
     } //if ($nro=",")

     }//while(($indchar>=0)&&($contchar<=3))
    if (trim($num2)<>"")
    {
        if ($numant<>0)
        {
         $operador = " Y ";
        }//if ($numant<>0)
        else
        {
         $operador ="";
        }//else
    }//if ($num2<>"")
    else
    {
       $operador="";
    }//else

     if (trim($num2)=="ONCE" || trim($num2)=="DOCE" || trim($num2)=="TRECE" || trim($num2)=="CATORCE" || trim($num2)=="QUINCE")
     {
      $operador="";
     }//if ($num2="ONCE" || $num2="DOCE" || $num2="TRECE" || $num2="CATORCE" || $num2="QUINCE")

      if (trim($num1)=="CERO")
    {
       if (trim($num2)<>"" || trim($num3)<>"")
       {
         $num1="";
         $operador="";
       }//if ($num2<>"" || $num3<>"")
    }//if ($num1="CERO")

    if (trim($num3)=="CIENTO")
    {
       if (trim($num2)=="" && trim($num1)=="")
       {
        $num3="CIEN";
        $num2="";
        $operador="";
        $num1="";
       }//if ($num2="" && $num1="")
    }//if ($num3="CIENTO")

    if (trim($num1)=="UNO")
    {
       if ($contmil>1)
       {
        $num1="UN";
       }//if ($contmil>1)
    }//if ($num1="UNO")

        $tira3= $num3." ".$num2.$operador.$num1;
      if ($contmil==1)
    {
          $primero=$tira3;
    }//if ($contmil=1)
      elseif ($contmil==2)
    {
          $segundo=$tira3;
          if (trim($segundo)=="CERO")
      {
             $segundo="";
             if (trim($primero)=="CERO")
       {
                $primero="";
             }//if ($primero="CERO")
          }//if ($segundo="CERO")
      else
      {
             $sepmil2=" MIL ";
             if (trim($primero)=="CERO")
       {
                $primero="";
             }//if ($primero="CERO")
          }//else
       }//elseif ($contmil=2)
    elseif ($contmil==3)
    {
          $tercero= $tira3;
          if (trim($num1)=="UN")
      {
             $sepmil3=" MILLON ";
          }//if ($num1="UN")
      else
      {
             $sepmil3=" MILLONES ";
          }//else
          if (trim($tercero)=="CERO")
      {
             $tercero="";
          }//if ($tercero="CERO")
    }//elseif ($contmil=3)
      elseif ($contmil==4)
    {
         $cuarto=$tira3;
         if (trim($cuarto)<>"CERO")
     {
            if (trim($sepmil3)=="MILLON")
      {
               $sepmil3=" MILLONES ";
            }//if ($sepmil3="MILLON")
            $sepmil4=" MIL ";
     }//if ($cuarto<>"CERO")
         else
     {
            $cuarto="";
         }//else
      }//elseif ($contmil=4)
    elseif ($contmil==5)
     {
         $quinto=$tira3;
         if (trim($num1)=="UN")
     {
            $sepmil5=" BILLON ";
         }//if ($num1="UN")
     else
     {
            $sepmil5=" BILLONES ";
         }//else

         if (trim($tercero)=="" && trim($cuarto)=="")
     {
            $sepmil3="";
         }//if ($tercero="" && $cuarto="")


         if (trim($quinto)<>"CERO")
     {
             if (trim($cuarto)=="CERO")
       {
                $cuarto="";
                $sepmil4="";
             }//if ($cuarto="CERO")
         }//if ($quinto<>"CERO")
     }//elseif ($contmil=5)
     elseif ($contmil==6)
   {
         $sexto=$tira3;
         if (trim($sexto)<>"CERO")
     {
            $sepmil6=" MIL ";
            if (trim($sepmil5)=="BILLON")
      {
               $sepmil5=" BILLONES ";
            }//if ($sepmil5="BILLON")
            if (trim($quinto)=="CERO")
      {
                $quinto="";
            }//if ($quinto="CERO")
         }//if ($sexto<>"CERO")
     }//elseif ($contmil=6)
  } // while($indchar>=0)
  return $sexto.$sepmil6.$quinto.$sepmil5.$cuarto.$sepmil4.$tercero.$sepmil3.$segundo.$sepmil2.$primero.$sepmil1.$decimal;
}//function montoescrito($numero,$con)
  /////////////////////////////////////////////////////////////////////////////////////////////////////



  //require_once("basedatosAdo.php");
  class negociocatalogo
  {
    var $bd;
  var $arregloref;
  var $cuantas;
  var $campos;
  var $arreglocom;
  var $codemp;
  function negociocatalogo()
  {
     $this->codemp=$_SESSION["codemp"];
     $this->bd=new basedatosAdo($this->codemp);
     $this->arregloref=array();
     $this->arreglocom=array();
     $this->cuantas=0;
     $this->campos=0;
  }


  function mostrar($sql,$filtro)
  {
     $sql=str_replace("¿","'",$sql);
     $sql=str_replace("?","/",$sql);

     $tb=$this->bd->select($sql);
     $i=1;

     //Llenamos un arreglo con los registros
     $totcampos=$tb->FieldCount();
        $registro=0;
     $tb->MoveFirst();
     while (!$tb->EOF)
     {
        for ($col=0;$col<$totcampos;$col++)
        {
         $this->arreglocom[$registro][$col]=$tb->fields[$col];
      }
      $registro++;
        $tb->MoveNext();
     }
     //////////////////////////////////////////////////////////

     $tb->MoveFirst();
     print "<tr class='queryheader'>";
       print "<td width='8%'> <div align='center'><font color='#FFFFFF'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Id</font></strong></font></div></td>";
     $this->campos=$tb->FieldCount();
     for ($i=1;$i<=$this->campos;$i++)
     {
         $info=$tb->FetchField($i-1);
         print "<td> <div align='center'><font color='#FFFFFF' size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>".ucwords($info->name)."</strong></font></div></td>";
     }
     print "</tr>";
     $i=1;
     if (($tb->RecordCount()<500) || ($filtro!=""))
     {
       while (!$tb->EOF)
       {
        $this->arregloref[$i]=$tb->fields[1];
        print "<tr>";
        print "<td bgcolor='#EEF2F2'>";
       // print "<input type='text' class='imagenInicio' onMouseOver=this.className='imagenFoco' onMouseOut=this.className='imagenInicio' name='p".$i."' value='".$i."' size='".strlen(count($this->arregloref)).""."' readonly='true' style='font-family:Verdana;font-size:x-small;'>";
          print "<a href=''><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$i."</font></strong></font></a>\n";
        print "</td>";
        for ($x=0;$x<=$this->campos-1;$x++)
        {
         $info=$tb->FetchField($x);
         $tipo = $tb->MetaType($info->type);
         if ($x==0)
         {
          if (($tipo=='C') || ($tipo=='X'))
          {
             print "<td bgcolor='#EEF2F2'>";
             print "<a href=".chr(34)."javascript: aceptar('".strtoupper($tb->fields[$x])."','".strtoupper($tb->fields[1])."');".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
             print "</td>";
          }
          else
          {
             print "<td bgcolor='#EEF2F2'>";
             print "<a href=".chr(34)."javascript: aceptar('".$tb->fields[$x]."','".strtoupper($tb->fields[1])."');".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
             print "</td>";
          }
         }
         else
         {
          if (($tipo=='C') || ($tipo=='X'))
          {
             print "<td bgcolor='#EEF2F2'>";
             print "<a name='".strtoupper($tb->fields[$x])."'><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
             print "</td>";
          }
          else
          {
             print "<td bgcolor='#EEF2F2'>";
             print "<a name='".$tb->fields[$x]."'><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
             print "</td>";
          }
         }
        }
        print "<td style='display:none'>";
        $info=$tb->FetchField(1);
        $tipo = $tb->MetaType($info->type);
        if (($tipo=='C') || ($tipo=='X'))
        {
         print "<input type='text' name='r".$i."' value='".strtoupper($tb->fields[1])."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";
        }
        else
        {
         print "<input type='text' name='r".$i."' value='".$tb->fields[1]."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";
        }
        print "</td>";
        print "<td style='display:none'>";
        print "<input type='text' name='c".$i."' value='".$tb->fields[0]."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";
        print "</td>";
        print "</tr>";
        $i++;

        $tb->MoveNext();
       } //End del While
     }//End del IF
  }

  function numerofilas()
  {
     $this->cuantas=count($this->arregloref);
     return $this->cuantas;
  }


  function devuelve_arreglo()
  {
     return $this->arreglocom;
  }

  function numerocampos()
  {
     return $this->campos;
  }
}

  function getNextvalSecuencia($seq,$con){

    $result=array();

    $sql="SELECT nextval('".$seq."') as val;";

    $result=$con->select($sql)->GetArray();

    if(count($result)>0){
      return $result[0]['val'];
    }else return 0;

  }

  function Buscar_Correlativo($con)
  {
    $num=0;
    $numcom='';
    $valido = false;
    $formato='';
    $longitud='8';
      $sql = "Select * from contaba where codemp = '001'";
      $tb = $con->select($sql)->GetArray();
      if ($tb)
      {
        if ($tb[0]["corcomp"]=='AAMM####')
        {
			$formato = date('ym');
			$longitud='4';
        }elseif ($tb[0]["corcomp"]=='AAMM####')
        {
			$formato = date('my');
			$longitud='4';
        }
      }
    while(!$valido){
      $num = getNextvalSecuencia('contabc_numcom_seq',$con);
	  $numcom = $formato.str_pad((string)$num, $longitud, "0", STR_PAD_LEFT);

      $sql = "Select * from contabc where numcom = '".$numcom."'";
      $contabc = $con->select($sql)->GetArray();
      if(count($contabc)==0){
        $valido = true;
      }
    }
    return $numcom;
  }


?>