<?php
require('fpdf.php');

class PDF_HTML extends FPDF
{
    var $B=0;
    var $I=0;
    var $U=0;
    var $HREF='';
    var $ALIGN='';

    function WriteHTML($html)
    {
        //HTML parser
		//style="text-align: center;    &lt;"
		//$html=str_replace('div style="text-align: justify;"','p align="justify"', $html);
		//$html=str_replace("<div",'<p', $html);
		//$html=str_replace("\n",' ', $html); 
		//$html=str_replace('&lt;','<', $html);
		//$html=str_replace('style="text-align: right;','align="right"', $html);
		//$html=str_replace('div style="text-align: center;"','p align="center"', $html);
		//$html=str_replace('style="text-align: center;','align="center"', $html);
        $html=str_replace("&nbsp;", ' ', $html);
		
        $a=preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
               if($this->ALIGN == 'center')
                    $this->MultiCell(185,5,$e,0,'J');
				else if($this->ALIGN == 'justify')
				   {
						$this->Cell(5);
						$this->MultiCell(185,5,htmlspecialchars($e),0,'J');
					}
                else
				{
					//$this->Cell(5);
                    $this->Write(5, $e);
					//$this->MultiCell(185,5,$e,0,'J');
				}
            }
            else
            {
                //Tag
                if($e{0}=='/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else
                {
                    //Extract properties
                    $a2=split(' ', $e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                        if(ereg('^([^=]*)=["\']?([^"\']*)["\']?$', $v, $a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    $this->OpenTag($tag, $prop);
                }
            }
        }
    }

    function OpenTag($tag, $prop)
    {
        if($tag=='STRONG')
			$tag='B';
		if($tag=='EM')
			$tag='I';
		//Opening tag
        if($tag=='B' or $tag=='I' or $tag=='U')
            $this->SetStyle($tag, true);
        if($tag=='A')
            $this->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->Ln(5);
        if($tag=='P')
            $this->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( $prop['WIDTH'] != '' )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $this->Ln(2);
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.4);
            $this->Line($x, $y, $x+$Width, $y);
            $this->SetLineWidth(0.2);
            $this->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
		if($tag=='STRONG')
			$tag='B';
		if($tag=='EM')
			$tag='I';
        if($tag=='B' or $tag=='I' or $tag=='U')
            $this->SetStyle($tag, false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->ALIGN='';
    }

    function SetStyle($tag, $enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B', 'I', 'U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('', $style);
    }
  
}
?>