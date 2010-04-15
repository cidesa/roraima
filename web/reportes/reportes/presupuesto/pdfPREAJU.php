<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");

  class pdfreporte extends fpdf
  {

    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $anchos2;
    var $campos;
    var $sql1;
    var $sql2;
    var $rep;
    var $numero;
    var $cab;
    var $aju1;
    var $aju2;
    var $fecha1;
    var $fecha2;
    var $tipo1;
    var $tipo2;
    var $codpre1;
    var $codpre2;
    var $estado;
    var $filtro;
    var $auxd=0;
    var $auxc=0;
    var $auxt=0;

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      $this->bd=new basedatosAdo();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->anchos2=array();
      $this->aju1=$_POST["aju1"];
      $this->aju2=$_POST["aju2"];
      $this->fecha1=$_POST["fecha1"];
      $this->fecha2=$_POST["fecha2"];
      $this->tipo1=$_POST["tipo1"];
      $this->tipo2=$_POST["tipo2"];
      $this->estado=$_POST["estado"];
      $this->codpre1=$_POST["codpre1"];
      $this->codpre2=$_POST["codpre2"];
      $this->filtro=$_POST["filtro"];

      if ($this->estado=="Todos")
      {
      $this->sql="select a.refaju as referencia, to_char(a.fecaju,'dd/mm/yyyy') as fecha, a.refere as arefere, b.codpre as bcodpre, d.nompre as nompre,
        a.staaju as status2, a.staaju as astaaju, a.fecanu as afecanu, c.nomext as tipo, rtrim(a.desaju) as adesaju,
        b.monaju as bmonaju
        from cpajuste  a, cpmovaju  b, cpdocaju c, cpdeftit d
        where a.refaju=b.refaju  and
        a.tipaju = c.tipaju and
               b.codpre= d.codpre and
               RTRIM(b.codpre)>= RTRIM('".$this->codpre1."') and RTRIM(b.codpre)<= RTRIM('".$this->codpre2."') and
        a.refaju>= rpad('".$this->aju1."',8,' ') and a.refaju<= rpad('".$this->aju2."',8,' ')  and
               a.fecaju >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecaju <= to_date('".$this->fecha2."','dd/mm/yyyy')  and
        a.tipaju >= rpad('".$this->tipo1."',4,' ') and a.tipaju<= rpad('".$this->tipo2."',4,' ') and
              b.codpre like '".$this->filtro."'
        order by a.refaju, a.tipaju";
      }
      else
      {
        if($this->estado=="Activo"){$this->estado="A";}
        else{ $this->estado="N";}

        $this->sql="select a.refaju as referencia, to_char(a.fecaju,'dd/mm/yyyy') as fecha, a.refere as arefere, b.codpre as bcodpre, d.nompre as nompre,
        a.staaju as status2, a.staaju as astaaju, a.fecanu as afecanu, c.nomext as tipo, rtrim(a.desaju) as adesaju,
        b.monaju as bmonaju
        from cpajuste  a, cpmovaju  b, cpdocaju c, cpdeftit d
        where a.refaju=b.refaju  and
        a.tipaju = c.tipaju and
               b.codpre= d.codpre and
               RTRIM(b.codpre)>= RTRIM('".$this->codpre1."') and RTRIM(b.codpre)<= RTRIM('".$this->codpre2."') and
        a.refaju>= rpad('".$this->aju1."',8,' ') and a.refaju<= rpad('".$this->aju2."',8,' ')  and
               a.fecaju >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecaju <= to_date('".$this->fecha2."','dd/mm/yyyy')  and
        a.tipaju >= rpad('".$this->tipo1."',4,' ') and a.tipaju<= rpad('".$this->tipo2."',4,' ') and
        a.staaju=('".$this->estado."') and
              b.codpre like '".$this->filtro."'
        order by a.refaju, a.tipaju";
      }



      $this->llenartitulosmaestro();
      $this->llenartitulosdetalle();
      $this->cab=new cabecera();

    }
    function llenartitulosmaestro()
    {
        $this->titulos[0]="AJUSTE Nro.";
        $this->titulos[1]="FECHA";
        $this->titulos[2]="TIPO DE AJUSTE";
        $this->titulos[3]="DOCUMENTO AJUSTADO";
    }
    function llenartitulosdetalle()
    {
        $this->titulos2[0]="Cod. Presupuestario";
        $this->titulos2[1]="Descripción Ajuste";
        $this->titulos2[2]="Ajuste";

    }

    function Header()
    {
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
      $this->setFont("Arial","B",9);
      $ncampos=count($this->titulos);
      $ncampos2=count($this->titulos2);
      for($i=0;$i<$ncampos;$i++)
      {
        $this->cell($this->anchos[$i],10,$this->titulos[$i]);
      }
      $this->ln();
      for($i=0;$i<$ncampos2;$i++)
      {
        $this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
      }
      $this->ln();
      $this->Line(10,60,200,60);
      $this->ln();
    }
    function Cuerpo()
    {

        $tb=$this->bd->select($this->sql);
      $tb2=$this->bd->select($this->sql);
      $this->setFont("Arial","B",8);
      $ncampos=count($this->titulos);
      if(!$tb2->EOF)
      {
        $ref=$tb2->fields["referencia"];
        $this->cell($this->anchos[0],5,$tb2->fields["referencia"]);
        $this->cell($this->anchos[1],5,$tb2->fields["fecha"]);
        $this->cell($this->anchos[2],5,$tb2->fields["tipo"]);
        $this->cell($this->anchos[3],5,$tb2->fields["arefere"]);
        $this->ln();
        $this->setFont("Arial","",8);
        //$this->cell($this->anchos2[0],5,$tb2->fields["bcodpre"]);
        //$this->cell($this->anchos2[1],5,$tb2->fields["adesaju"]);
        //$this->cell($this->anchos2[2],5,number_format($tb2->fields["bmonaju"],2,',','.'));
        //$this->ln();
        //$this->auxc=$this->auxc + $tb2->fields["bmonaju"];

      }
      while(!$tb->EOF)
      {
        if($tb->fields["referencia"]!=$ref)
        {
        //$this->Line(205,88,230,88);
        $this->setFont("Arial","B",8);
        $this->Line(165,$this->GetY(),190,$this->GetY());
        $this->cell(131,5,"");
        $this->cell(43,5,"Total Ajuste: ");
        $this->cell(5,5,number_format($this->auxc,2,',','.'),0,0,'R');
        //$this->cell(30,5,"                                                                                                                                                                           Total Ajuste:          ".number_format($this->auxc,2,',','.'));
        $this->auxc = 0;
        if ($this->GetY()>235){$this->ln(300);$this->cell(5,5,"");$this->ln(1);$this->ln(-1);}
        $this->ln();
        $this->cell($this->anchos[0],5,$tb->fields["referencia"]);
        $this->cell($this->anchos[1],5,$tb->fields["fecha"]);
        $this->cell($this->anchos[2],5,$tb->fields["tipo"]);
        $this->cell($this->anchos[3],5,$tb->fields["arefere"]);
        $this->ln();
        }

        $ref=$tb->fields["referencia"];
        $this->setFont("Arial","",8);
        //Detalle
        $this->cell($this->anchos2[0]+10,5,$tb->fields["bcodpre"]);
        $this->cell($this->anchos2[1]-10,5,substr($tb->fields["adesaju"],0,60));
        $this->cell($this->anchos2[2]-11,5,number_format($tb->fields["bmonaju"],2,',','.'),0,0,'R');
        $this->ln();
        $this->auxc=$this->auxc + $tb->fields["bmonaju"];
        $this->auxt=$this->auxt + $tb->fields["bmonaju"];
        $tb->MoveNext();
      }
      $this->setFont("Arial","B",8);
      $this->Line(165,$this->GetY(),190,$this->GetY());
      $this->cell(131,5,"");
      $this->cell(43,5,"Total Ajuste: ");
      $this->cell(5,5,number_format($this->auxc,2,',','.'),0,0,'R');
      //$this->cell(30,5,"                                                                                                                                                                           Total Ajuste:          ".number_format($this->auxc,2,',','.'));
      $this->ln();
      $this->Line(165,$this->GetY(),190,$this->GetY());
      $this->SetTextColor(0,0,128);
      $this->cell(125,5,"");
      $this->cell(49,5,"TOTAL AJUSTES: ");
      $this->cell(5,5,number_format($this->auxt,2,',','.'),0,0,'R');
    }
  }
?>
