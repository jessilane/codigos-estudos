<?php
  define('MPDF_PATH', 'class/mpdf/');
  include(MPDF_PATH.'mpdf.php');
  $mpdf=new mPDF();
  $mpdf->WriteHTML('Hello World');
  $mpdf->Output();
  exit();
  ?>