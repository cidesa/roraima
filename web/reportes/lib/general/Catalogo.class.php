<?php

require_once('../../lib/bd/basedatosAdo.php');

class Catalogo {

  function Catalogo() {
     $this->bd=new basedatosAdo();
     $this->arregloref=array();
     $this->arreglocom=array();
     $this->cuantas=0;
     $this->campos=0;
  }

  var $bd;
  var $arregloref;
  var $cuantas;
  var $campos;
  var $arreglocom;
  var $codemp;

  function mostrar($sql,$objs, $campos)
  {
     //$sql=str_replace("¿","'",$sql);
     //$sql=str_replace("?","/",$sql);

     $tb=$this->bd->select($sql);
     $i=1;

//H::PrintR($sql);
//exit();
     if ($tb){
     //Llenamos un arreglo con los registros
     $totcampos=$tb->RecordCount();
     $registro=0;
     $this->arreglocom = $tb->GetArray();
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
     if (($tb->RecordCount()<500))
     {
       while (!$tb->EOF)
       {
        $arrayobj = 'new Array(';
        $arrayvals = 'new Array(';
        foreach($objs as $key => $obj){
          $arrayobj .= "'".$obj."',";
          $arrayvals .= "'".$tb->fields[$campos[$key]]."',";;
        }
        $arrayobj .= "'')";
        $arrayvals .= "'')";

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
             print "<a href=".chr(34)."javascript: aceptar($arrayobj,$arrayvals);".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
             print "</td>";
          }
          else
          {
             print "<td bgcolor='#EEF2F2'>";
             print "<a href=".chr(34)."javascript: aceptar($arrayobj,$arrayvals);".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";
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
     else
     {
     	print 'No se encontraron datos';
     }
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

?>