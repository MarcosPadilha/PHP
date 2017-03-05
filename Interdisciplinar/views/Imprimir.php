<?php

require_once('PDF/mpdf.php');


$palestra = $_GET['palestra'];
$aluno = $_GET['aluno'];


$mpdf=new mPDF();
$mpdf->WriteHTML('
     <img style="margin-left:260px;" src="images/logo_qi.jpg"/>
     <h1 style="text-align:center;"> Escolas e Faculdades QI</h1>
     <h1 style="text-align:center;"> Certificado</h1>
     <h2>
          Certificamos que o Aluno '.$aluno.' esteve presente na palestra '.$palestra.' com carga horaria de
          quatro horas, ministrada na instituição escolas e faculdades QI.
     </h2>');
$mpdf->Output();
exit();



 ?>

 <img src="images/logo_qi.jpg"/>
 <h1> Escolas e Faculdades QI</h1>
 <h1> Certificado</h1>
 <h2>
      Certificamos que no dia '.$data.' o Aluno '.$aluno.' esteve presente na palestra '.$palestra.' com carga horaria de
      quatro horas.
 </h2>
