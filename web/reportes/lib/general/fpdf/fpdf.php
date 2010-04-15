<?php
include_once("fpdfbase.class.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Herramientas.class.php");

class FPDF extends FPDFBASE
{

	var $flowingBlockAttr;
	var $widths;
	var $aligns;
	var $conf;
	var $angle=0;

	  public function FPDF($orientacion="",$medtam = "mm",$tippag = "Letter")
  {
    $conf = $this->getConfig();

    if($tippag) $t = $tippag;
    else $t = $conf['tippag'];

    if($medtam) $m = $medtam;
    else $m = $conf['medtam'];

    if($orientacion) $o = $orientacion;
    else $o = $conf['orientacion'];

    $this->conf=$o;

    parent::FPDFBASE($this->conf,$m,$t);

    $this->setFont($conf['fuente'],"",$conf['tamletra']);
  }

	function _endpage()
	{
		if($this->angle!=0)
		{
			$this->angle=0;
			$this->_out('Q');
		}
		parent::_endpage();
	}


	public function setConfDefault()
	{
		$conf = $this->getConfig();
		$this->conf=$conf['orientacion'];
		parent::FPDFBASE($this->conf,$conf['medtam'],$conf['tippag']);

		$this->setFont($conf['fuente'],"",$conf['tamletra']);
	}

  	public function texto($x,$y,$texto,$jus='',$bor=0,$fon=0)
	{
		$ancho=0;
		for ( $i = 0; $i < strlen( $texto ); $i++ )
		{
			$c = $texto{ $i };
			$ancho+= $this->CurrentFont[ 'cw' ][ $c ] * ( $this->FontSizePt / 2750 );
		}
		if ($jus=='') $jus='L';
		$this->setXY($x,$y);
		$this->cell($ancho,4,$texto,$bor,0,$jus,$fon);
	}

  	public function texver($x,$y,$texto)
	{
		$c = strlen(trim($texto));
		$r=0;
		for ($i=0; $i < $c ;$i++)
		{
			$this->setXY($x,$y+$r);
			$this->cell(4,5,substr($texto,$i,1));
			$r=$r+3;
		}
	}

	/*adolfredo palma*/
	function RoundedRect($x, $y, $w, $h,$r, $style = '')
	{
		$k = $this->k;
		$hp = $this->h;
		if($style=='F')
			$op='f';
		elseif($style=='FD' or $style=='DF')
			$op='B';
		else
			$op='S';
		$MyArc = 4/3 * (sqrt(2) - 1);
		$this->_out(sprintf('%.2f %.2f m',($x+$r)*$k,($hp-$y)*$k ));
		$xc = $x+$w-$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2f %.2f l', $xc*$k,($hp-$y)*$k ));

		$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
		$xc = $x+$w-$r ;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2f %.2f l',($x+$w)*$k,($hp-$yc)*$k));
		$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
		$xc = $x+$r ;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2f %.2f l',$xc*$k,($hp-($y+$h))*$k));
		$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
		$xc = $x+$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2f %.2f l',($x)*$k,($hp-$yc)*$k ));
		$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
		$this->_out($op);
	}

	function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
	{
		$h = $this->h;
		$this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
			$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
	}

	function RotatedText($x,$y,$txt,$angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}

	function RotatedImage($file,$x,$y,$w,$h,$angle)
	{
		//Image rotated around its upper-left corner
		$this->Rotate($angle,$x,$y);
		$this->Image($file,$x,$y,$w,$h);
		$this->Rotate(0);
	}

	function Rotate($angle,$x=-1,$y=-1)
	{
		if($x==-1)
			$x=$this->x;
		if($y==-1)
			$y=$this->y;
		if($this->angle!=0)
			$this->_out('Q');
		$this->angle=$angle;
		if($angle!=0)
		{
			$angle*=M_PI/180;
			$c=cos($angle);
			$s=sin($angle);
			$cx=$x*$this->k;
			$cy=($this->h-$y)*$this->k;
			$this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
		}
	}

	function saveFont()
	{

		$saved = array();

		$saved[ 'family' ] = $this->FontFamily;
		$saved[ 'style' ] = $this->FontStyle;
		$saved[ 'sizePt' ] = $this->FontSizePt;
		$saved[ 'size' ] = $this->FontSize;
		$saved[ 'curr' ] =& $this->CurrentFont;
		$saved[ 'color' ] = $this->TextColor;

		return $saved;

	}

	function restoreFont( $saved )
	{

		$this->FontFamily = $saved[ 'family' ];
		$this->FontStyle = $saved[ 'style' ];
		$this->FontSizePt = $saved[ 'sizePt' ];
		$this->FontSize = $saved[ 'size' ];
		$this->CurrentFont =& $saved[ 'curr' ];
		$this->TextColor = $saved[ 'color' ];

		if( $this->page > 0)
			$this->_out( sprintf( 'BT /F%d %.2f Tf ET', $this->CurrentFont[ 'i' ], $this->FontSizePt ) );

	}

	function newFlowingBlock( $w, $h, $b = 0, $a = 'J', $f = 0 )
	{
		$this->paso=0;
		$this->posx=$this->GetX();
		// cell width in points
		$this->flowingBlockAttr[ 'width' ] = $w * $this->k;

		// line height in user units
		$this->flowingBlockAttr[ 'height' ] = $h;

		$this->flowingBlockAttr[ 'lineCount' ] = 0;

		$this->flowingBlockAttr[ 'border' ] = $b;
		$this->flowingBlockAttr[ 'align' ] = $a;
		$this->flowingBlockAttr[ 'fill' ] = $f;

		$this->flowingBlockAttr[ 'font' ] = array();
		$this->flowingBlockAttr[ 'content' ] = array();
		$this->flowingBlockAttr[ 'contentWidth' ] = 0;

	}

	function finishFlowingBlock()
	{

		$maxWidth =& $this->flowingBlockAttr[ 'width' ];

		$lineHeight =& $this->flowingBlockAttr[ 'height' ];

		$border =& $this->flowingBlockAttr[ 'border' ];
		$align =& $this->flowingBlockAttr[ 'align' ];
		$fill =& $this->flowingBlockAttr[ 'fill' ];

		$content =& $this->flowingBlockAttr[ 'content' ];
		$font =& $this->flowingBlockAttr[ 'font' ];
		// set normal spacing
		$this->_out( sprintf( '%.3f Tw', 0 ) );

		// print out each chunk

		// the amount of space taken up so far in user units
		$usedWidth = 0;
		if($this->posx > $this->GetX())
		{
			$this->SetX($this->posx);
		}
		foreach ( $content as $k => $chunk )
		{

			$b = '';
			if($this->paso==0)
			{

				if ( is_int( strpos( $border, 'T' ) ) )
					$b .= 'T';
			}

			if ( is_int( strpos( $border, 'B' ) ) )
				$b .= 'B';

			if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
				$b .= 'L';

			if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
				$b .= 'R';

			$this->restoreFont( $font[ $k ] );

			// if it's the last chunk of this line, move to the next line after
			if ( $k == count( $content ) - 1 )
			{
				$this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk."  ", $b, 1, $align, $fill );
			}
			else
			{
				$this->Cell( $this->GetStringWidth( $chunk ), $lineHeight, $chunk, $b, 0, $align, $fill );
			}

			$usedWidth += $this->GetStringWidth( $chunk );

		}

	}

	function WriteFlowingBlock( $s )
	{

		// width of all the content so far in points
		$contentWidth =& $this->flowingBlockAttr[ 'contentWidth' ];

		// cell width in points
		$maxWidth =& $this->flowingBlockAttr[ 'width' ];

		$lineCount =& $this->flowingBlockAttr[ 'lineCount' ];

		// line height in user units
		$lineHeight =& $this->flowingBlockAttr[ 'height' ];

		$border =& $this->flowingBlockAttr[ 'border' ];
		$align =& $this->flowingBlockAttr[ 'align' ];
		$fill =& $this->flowingBlockAttr[ 'fill' ];

		$content =& $this->flowingBlockAttr[ 'content' ];
		$font =& $this->flowingBlockAttr[ 'font' ];

		$font[] = $this->saveFont();
		$content[] = '';

		$currContent =& $content[ count( $content ) - 1 ];

		// where the line should be cutoff if it is to be justified
		$cutoffWidth = $contentWidth;

		// for every character in the string
		for ( $i = 0; $i < strlen( $s ); $i++ )
		{

			// extract the current character
			$c = $s{ $i };

			// get the width of the character in points
			$cw = $this->CurrentFont[ 'cw' ][ $c ] * ( $this->FontSizePt / 1000 );
			if ( $c == ' ' )
			{

				$currContent .= ' ';
				$cutoffWidth = $contentWidth;

				$contentWidth += $cw;

				continue;

			}

			// try adding another char
			if ( $contentWidth + $cw > $maxWidth or $c == "\n")
			{

				// won't fit, output what we have
				$lineCount++;

				// contains any content that didn't make it into this print
				$savedContent = '';
				$savedFont = array();

				// first, cut off and save any partial words at the end of the string
				$words = explode( ' ', $currContent );

				// if it looks like we didn't finish any words for this chunk
				if ( count( $words ) == 1 and $c!="\n" )
				{

					// save and crop off the content currently on the stack
					$savedContent = array_pop( $content );
					$savedFont = array_pop( $font );

					// trim any trailing spaces off the last bit of content
					$currContent =& $content[ count( $content ) - 1 ];

					$currContent = rtrim( $currContent );

				}

				// otherwise, we need to find which bit to cut off
				elseif($c!="\n")
				{

					$lastContent = '';

					for ( $w = 0; $w < count( $words ) - 1; $w++)
						$lastContent .= "{$words[ $w ]} ";

					$savedContent = $words[ count( $words ) - 1 ];
					$savedFont = $this->saveFont();

					// replace the current content with the cropped version
					$currContent = rtrim( $lastContent );

				}
				else
				{

					$lastContent = '';

					for ( $w = 0; $w < count( $words ); $w++)
						$lastContent .= "{$words[ $w ]} ";

					$savedContent = $words[ count( $words ) ];
					$savedFont = $this->saveFont();

					// replace the current content with the cropped version
					$currContent = rtrim( $lastContent );

				}

				// update $contentWidth and $cutoffWidth since they changed with cropping
				$contentWidth = 0;

				foreach ( $content as $k => $chunk )
				{

					$this->restoreFont( $font[ $k ] );

					$contentWidth += $this->GetStringWidth( $chunk ) * $this->k;

				}

				$cutoffWidth = $contentWidth;

				// if it's justified, we need to find the char spacing
				if( $align == 'J' )
				{

					// count how many spaces there are in the entire content string
					$numSpaces = 0;

					foreach ( $content as $chunk )
						$numSpaces += substr_count( $chunk, ' ' );

					// if there's more than one space, find word spacing in points
					if ( $numSpaces > 0 )
						$this->ws = ( $maxWidth - $cutoffWidth ) / $numSpaces;
					else
						$this->ws = 0;

					$this->_out( sprintf( '%.3f Tw', $this->ws ) );

				}

				// otherwise, we want normal spacing
				else
					$this->_out( sprintf( '%.3f Tw', 0 ) );

				// print out each chunk
				$usedWidth = 0;

				foreach ( $content as $k => $chunk )
				{

					$this->restoreFont( $font[ $k ] );

					$stringWidth = $this->GetStringWidth( $chunk ) + ( $this->ws * substr_count( $chunk, ' ' ) / $this->k );

					// determine which borders should be used
					$b = '';

					//$this->paso=0;
					if ( $lineCount == 1 && is_int( strpos( $border, 'T' ) ) )
					{
						$this->paso=1;
						$b .= 'T';
					}

					if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
						$b .= 'L';

					if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
						$b .= 'R';

					// if it's the last chunk of this line, move to the next line after
					if($this->posx > $this->GetX())
					{
						$this->SetX($this->posx);
					}
					if ( $k == count( $content ) - 1 )
					{
						$this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk."  ", $b, 1, $align, $fill );
					}
					else
					{
						$this->Cell( $stringWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 0, $align, $fill );
						$this->x -= 2 * $this->cMargin;

					}

					$usedWidth += $stringWidth;

				}

				// move on to the next line, reset variables, tack on saved content and current char
				$this->restoreFont( $savedFont );

				$font = array( $savedFont );
				$content = array( $savedContent . $s{ $i } );

				$currContent =& $content[ 0 ];

				$contentWidth = $this->GetStringWidth( $currContent ) * $this->k;
				$cutoffWidth = $contentWidth;

			}

			// another character will fit, so add it on
			else
			{

				$contentWidth += $cw;
				$currContent .= $s{ $i };

			}

		}

	}

	function AsignarFuente($formato)
	{
		$f=explode(",",$formato);
		switch(count($f))
		{
			case 1:
				$this->SetFont(trim($f[0]),$this->FontStyle,$this->FontZise);
			break;
			case 2:
				$this->SetFont(trim($f[0]),trim($f[1]),$this->FontZise);
			break;
			case 3:
				$this->SetFont(trim($f[0]),trim($f[1]),trim($f[2]));
			break;
			case 4:
				$this->SetFont(trim($f[0]),trim($f[1]),trim($f[2]));
				$this->SetTextColor(trim($f[3]),0,0);
			break;
			case 5:
				$this->SetFont(trim($f[0]),trim($f[1]),trim($f[2]));
				$this->SetTextColor(trim($f[3]),trim($f[4]),0);
			break;
			case 6:
				$this->SetFont(trim($f[0]),trim($f[1]),trim($f[2]));
				$this->SetTextColor(trim($f[3]),trim($f[4]),trim($f[5]));
			break;
			default:
				echo "error en parametros de palabras del multicellplus";
				exit;
			break;
		}
	}

	public function MCPlus($largo=1,$alto=1,$texto="",$borde=0,$aliniacion='J',$fondo=0)
	{
		//se define el tipo de borde
		$fuentenormal=$this->saveFont();
		if($borde==0)
		{
			$this->newFlowingBlock($largo,$alto,'',$aliniacion,$fondo);
		}
		elseif($borde==1)
		{
			$this->newFlowingBlock($largo,$alto,'TBLR',$aliniacion,$fondo);
		}
		else
		{
			$this->newFlowingBlock($largo,$alto,$borde,$aliniacion,$fondo);
		}
		//se verifica si no hay errores
		if((substr_count($texto,"<@")==0 and substr_count($texto,"@>")==0) or (substr_count($texto,"<@")<>substr_count($texto,"@>")))
		{
			$this->WriteFlowingBlock($texto);
			$this->restoreFont($fuentenormal);
		}
		else
		{
			$primertrunck=explode("@>",$texto);
			foreach($primertrunck as $cortelargo)
			{
				if(substr_count($cortelargo,"<@")<>1)
				{
					$this->WriteFlowingBlock($cortelargo);
					$this->restoreFont($fuentenormal);
				}
				else
				{
					$segundotrunk=explode("<@",$cortelargo);
					$this->WriteFlowingBlock($segundotrunk[0]);
					$this->restoreFont($fuentenormal);
					if(substr_count($segundotrunk[1],"<,>")<>1)
					{
						$this->WriteFlowingBlock($segundotrunk[1]);
					}
					else
					{
						$cortecorto=explode("<,>",$segundotrunk[1]);
						$textovar=array_shift($cortecorto);
						$this->AsignarFuente($cortecorto[0]);
						$this->WriteFlowingBlock($textovar);
						$this->restoreFont($fuentenormal);
					}
				}
			}
		}
		$this->finishFlowingBlock();
	}

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
		//Set the borders for de table
		$this->border=false;
		$this->jump=4;
		$this->mcfill="D";

	}

	/*function SetBorder($valor=false)
	{
		//Set the borders for de table
		$this->border=$valor;
	}*/

	function SetBorder($valor=false)
	{
		if(eregi("T|B|L|R",$valor))
		{
			$this->border=true;
			$this->lados=strtoupper($valor);
		}
		elseif($valor==true)
		{
			$this->border=$valor;
			$this->lados='LRTB';
		}
		elseif($valor==false)
		{
			$this->border=false;
		}
		//Set the borders for de table
		//$this->border=$valor;
	}

	function SetFillTable($valor="D")
	{
		//Set the borders for de table
		if($valor==1)
		{
		$this->mcfill="DF";
		}
		elseif($valor=="D" or $valor==0)
		{
		$this->mcfill="D";
		}
		elseif($valor=="F")
		{
		$this->mcfill="F";
		}
		elseif($valor=="DF")
		{
		$this->mcfill="DF";
		}
		elseif($valor=="FD")
		{
		$this->mcfill="DF";
		}
	}

	function SetJump($valor=4)
	{
		//Set the jump of line to the multicell
		$this->jump=$valor;
	}

	function SetAligns($a='L')
	{
		//Set the array of column alignments
		if(!is_array($a))
		{
			$this->aligns=array();
			$this->aligns=array_pad($this->aligns,count($this->widths),$a);
		}
		else
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=$this->jump*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		$borde=$this->bMargin;
		$this->SetAutoPageBreak(false);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			if($this->border)
			{
				$this->Rect($x,$y,$w,$h,$this->mcfill);
			}
			//Print the text
			$this->MCPlus($w,$this->jump,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		$this->SetAutoPageBreak(true,$borde);
		//Go to the next line
		$this->Ln($h);
	}

	function RowM($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=$this->jump*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		$borde=$this->bMargin;
		$this->SetAutoPageBreak(false);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			if($this->border)
			{
				$this->Rect($x,$y,$w,$h,$this->mcfill);
			}
			//Print the text
			$this->MultiCell($w,$this->jump,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		$this->SetAutoPageBreak(true,$borde);
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}



	/*adolfredo palma*/

	function getOrientation()
	{
		return $this->CurOrientation;
	}

	public function getConfig()
  	{
  	  $config = Yaml::load("../../lib/bd/config.yml");
  	  if($config['reportes']) return $config['reportes'];
  	  else array();
	}

 public function getConfigCabecera()
    {
      $config = Yaml::load("../../lib/bd/config.yml");
      if($config['cabecera']) return $config['cabecera'];
      else array();
  }

  public function getCabecera($titulo='',$departamento='')
  {
      $pdf = $this;
      $this->confcabecera = $this->getConfigCabecera();
      $this->conf = $this->getConfig();
      $ori = strtolower($pdf->getOrientation());
      $conf = $this->conf;
      $c = $this->confcabecera;
      $r = $this->conf;
//print $ori;exit;
      if($ori=='p')
      {
        $xtitulo = 180;
        $xlinea = 200;
        $xdetalles= 180;
        $xpagina = 350;

      }
       else
       {
       	if($ori=='1')
      	{   $ori='p';
	        $xtitulo = 330;
	        $xlinea = 330;
	        $xdetalles= 100;
	        $xpagina = 600;
      	}
      else
	      {
            $ori='p';
	        $xtitulo = 265;
	        $xlinea = 265;
	        $xdetalles= 180;
	        $xpagina = 480;
	      }
       }



      //print_r($this->conf);exit();
      //H::PrintR(strtolower($ori));
      //configuro la pagina con Orientacion Vertical
      //busco la descripcion y direccion de la empresa
    $bd = new basedatosAdo();
    $tb3=$bd->select("select * from empresa where codemp='001'");
    if(!$tb3->EOF)
    {
      $nombre=trim($tb3->fields["nomemp"]);
      $direccion=$tb3->fields["diremp"];
      $telef=$tb3->fields["tlfemp"];
      $fax=$tb3->fields["faxemp"];
    }

    $pdf->setFont("Arial","B",8);
    //Logo de la Empresa
    $pdf->Image($c['logo']['img'],10,8,33);

    //fecha actual
    $fecha=date("d/m/Y");

    if($c['fecha']){
      $pdf->Cell($xpagina,10,'Fecha: '.$fecha,0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}
    $pdf->ln(5);

    //Paginas
    if($c['nropagina'])
    {
      $pdf->Cell($xpagina,10,'Pagina '.$pdf->PageNo().' de {nb}',0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}

    //Titulo Descripcion de la Empresa
    $pdf->Ln(-5);
    $tab = 50;

    $pdf->setX($c['empresa']['x'][$ori]);
    if($c['empresa']['y'][$ori]!='0') $pdf->setY($c['empresa']['y'][$ori]);
    $pdf->setFont($c['empresa']['fuente'],"B",11);
    $pdf->Cell($xdetalles,5,'República Bolivariana de Venezuela',0,0,$c['empresa']['pos']);

    // Detalles de la empresa
    $pdf->setFont($c['detemp']['fuente'],"B",$c['detemp']['tam']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    if($c['detemp']['y'][$ori]!='0') $pdf->setY($c['detemp']['y'][$ori]);
   // $pdf->Cell($xdetalles,5,'Ministerio del Poder Popular Para las Industrias Ligeras y Comercios',0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,$nombre,0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,'',0,0,$c['depemp']['pos']);
    $pdf->Ln(8);

    //Departamento
    $pdf->setFont($c['departamento']['fuente'],"B",$c['departamento']['tam']);
    $pdf->setX($c['departamento']['x'][$ori]);
    if($c['departamento']['y'][$ori]!='0') $pdf->setY($c['departamento']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$departamento,0,0,$c['departamento']['pos'],0);

    //Titulo del Reporte
    $pdf->setFont($c['titulo']['fuente'],"B",$c['titulo']['tam']);
    $pdf->setX($c['titulo']['x'][$ori]);
    if($c['titulo']['y'][$ori]!='0') $pdf->setY($c['titulo']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$titulo,0,0,$c['titulo']['pos'],0);
    $pdf->ln(10);
    $pdf->Line(10,35,$xlinea,35);

    $pdf->setFont($r['fuente'],"",$conf['tamletra']);
  }

    function PutLink($URL,$txt)
    {
        //Escribir un hiper-enlace
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }

    function SetDash($black=false,$white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }


    function SetStyle($tag,$enable)
    {
        //Modificar estilo y escoger la fuente correspondiente
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }
        function FecPerEje($pereje,$pos)
    {
    	if ($pos=='i'){
    		$fecha='fecdes';
    	}else $fecha='fechas';

    $bd = new basedatosAdo();
    $tb=$bd->select(" SELECT  TO_CHAR(".$fecha.",'dd/mm/yyyy') as fec from cppereje where  pereje='".$pereje."'");
    if(!$tb->EOF)
    {
      $fec=trim($tb->fields["fec"]);
    }
 return $fec;
    }

      function NomCatPre($pos)
    {


    $bd = new basedatosAdo();
    $tb=$bd->select("SELECT NOMEXT  FROM CPNIVELES WHERE CONSEC='".$pos."'");
    if(!$tb->EOF)
    {
      $nomext=trim($tb->fields["nomext"]);
    }
 return $nomext;
    }

      function Edo()
    {


    $bd = new basedatosAdo();
    $tb=$bd->select("select edoins from bndefins");
    if(!$tb->EOF)
    {
      $edoins=trim($tb->fields["edoins"]);
    }
 return $edoins;
    }

     function Mun()
    {


    $bd = new basedatosAdo();
    $tb=$bd->select("select munins from bndefins");
    if(!$tb->EOF)
    {
      $munins=trim($tb->fields["munins"]);
    }
 return $munins;
    }
         function Empresa($var)
    {


    $bd = new basedatosAdo();
    $tb=$bd->select("select * from empresa where codemp='001'");
    if(!$tb->EOF)
    {
                $nombre = $tb->fields["nomemp"];
				$direccion = $tb->fields["diremp"];
				$telf = $tb->fields["tlfemp"];
				$fax = $tb->fields["faxemp"];
    }
    if ($var=='nombre') return $nombre;
     if ($var=='direccion') return $direccion;
      if ($var=='telf') return $telf;
       if ($var=='fax') return $fax;

    }

    /////////////////////////

       public function getPrinom($var)  //Primer Nombre
    {
        if(strrpos($var,','))
        {
            $aux=split(',',$var);
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[1]));
                return $auxnom[0];
            }else
            {
                $auxnom=split(' ',$var);
                return  count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
            }
        }else
        {
            $auxnom=split(' ',$var);
            return  count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
        }
    }
    public function getSegnom($var) //Segundo Nombre
    {
        if(strrpos($var,','))
        {
            $aux=split(',',$var);
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[1]));
                return count($auxnom)>1 ? $auxnom[1] : ' ';
            }else
            {
                $auxnom=split(' ',$var);
                return  count($auxnom)>3 ? $auxnom[3] : ' ';
            }
        }else
        {
            $auxnom=split(' ',$var);
            return  count($auxnom)>3 ? $auxnom[3] : ' ';
        }
    }
    public function getPriape($var)  //Primer Apellido
    {
        if(strrpos($var,','))
        {
            $aux=split(',',$var);
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[0]));
                return $auxnom[0];
            }else
            {
                $auxnom=split(' ',$var);
                return  count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
            }
        }else
        {
            $auxnom=split(' ',$var);
            return  count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
        }
    }
    public function getSegape($var) //Segundo apellido
    {
        if(strrpos($var,','))
        {
            $aux=split(',',$var);
            if(count($aux)==2)
            {
                $auxnom=split(' ',trim($aux[0]));
                return count($auxnom)>1 ? $auxnom[1] : ' ';
            }else
            {
                $auxnom=split(' ',$var);
                return  count($auxnom)>2 ? $auxnom[1] : ' ';
            }
        }else
        {
            $auxnom=split(' ',$var);
            return  count($auxnom)>2 ? $auxnom[1] : ' ';
        }
    }
    ///////////////////////

}
?>
