<?php

use Dompdf\Dompdf;
use Dompdf\Options;
class Download{
public function first($data){
require 'vendor/autoload.php';
   
$dompdf = new Dompdf();
$pdfoption = new Options();

$pdfoption ->set('defaultFont','Arial');
$html ='<html><body><div style="text-align:center; color:red;font-size:20px">PETRO FILING STATION <br><br><br></div> <div style="text-align:center;font-size:16px;">Monthly Payment Sheet- '.$data["month"]."-".$data["year"].'<br><br><br>
<br></div>
<div style="padding-top:10px;border:3px solid white; width: 600px; height: 400px;border-radius:10px;">
<h1 style="text-align:left;padding-left:20px;">Pumper Details</h1>
<ul style="float:left;font-size:20px;padding-left:20px;">
    <p>Pumper ID :'.$data['id'].'</p>
    <p>First Name:'.$data['first'].'</p>
    <p>Last Name :'.$data['last'].'</p>
    <p>Email     :'.$data['email'].'</p>
    <p>Month     :'.$data['month'].'</p>
    <p>Year      :'.$data['year'].'</p>
</ul>
</div>
<div class="my-class">
<table style="border-collapse: collapse; width: 100%; max-width: 600px;">
<tr>
    <th style="border: 5px solid black; padding: 5px;">JOB ID</th>
    <th style="border: 5px solid black; padding: 5px;">RS:</th>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">BASIC SALARY</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["basic_s"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">HOME RENTAL ALLOWANCES</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["HRA_s"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">Daily ALLOWANCES</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["DA_s"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">GROSS SALARY</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["GS"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">PROVIDENT FUND</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["PF_s"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">OT HOURS</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["OT_SALARY"].'</td>
</tr>
<tr>
<td style="border: 5px solid black; padding: 5px;">TOTAL</td>
<td style="border: 5px solid black; padding: 5px;">'.$data["total"].'</td>
</tr>
</table>
<br><br><br><br><br><br><br>
</body></html>';
$dompdf ->loadHtml($html);
$dompdf ->setPaper('A4','portrait');
$dompdf ->render();
$dompdf ->stream('Salary-Certificate.pdf');

    }

}

