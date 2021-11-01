<style>
   body, p, td, div { font-family: freesans; }

</style>


<?php
// require('php/DBconfig.php');
ini_set('max_execution_time', 0);
//   $db = new dbObj(['mode' => 'utf-8']); 

 include("mpdf/mpdf.php");
 ini_set("memory_limit", "1000M");
//  if(isset($_GET["MohalName"])){
//      $mohalName = $_GET["MohalName"];
//  }
//  else{
//      echo "Something went wrong. Please Try again..";
//      die();
//  }


/* PHP program to print a given number in words. 
The program handles till 9 digits numbers and 
can be easily extended to 20 digit number */
  
// strings at index 0 is not used, it is  
// to make array indexing simple 
$one = array("", "one ", "two ", "three ", "four ", 
             "five ", "six ", "seven ", "eight ", 
             "nine ", "ten ", "eleven ", "twelve ", 
             "thirteen ", "fourteen ", "fifteen ", 
             "sixteen ", "seventeen ", "eighteen ", 
             "nineteen "); 
  
// strings at index 0 and 1 are not used,  
// they is to make array indexing simple 
$ten = array("", "", "twenty ", "thirty ", "forty ", 
             "fifty ", "sixty ", "seventy ", "eighty ", 
             "ninety "); 
  
// n is 1- or 2-digit number 
function numToWords($n, $s) 
{ 
    global $one, $ten; 
    $str = ""; 
      
    // if n is more than 19, divide it 
    if ($n > 19) 
        { 
            $str .= $ten[(int)($n / 10)]; 
            $str .= $one[$n % 10]; 
        } 
    else
        $str .= $one[$n]; 
  
    // if n is non-zero 
    if ($n != 0 ) 
        $str .= $s; 
  
    return $str; 
} 
  
// Function to print a given number in words 
function convertToWords($n) 
{ 
    // stores word representation of  
    // given number n 
    $out = ""; 
  
    // handles digits at ten millions and  
    // hundred millions places (if any) 
    $out .= numToWords((int)($n / 10000000), "crore "); 
  
    // handles digits at hundred thousands  
    // and one millions places (if any) 
    $out .= numToWords(((int)($n / 100000) % 100), "lakh "); 
  
    // handles digits at thousands and tens 
    // thousands places (if any) 
    $out .= numToWords(((int)($n / 1000) % 100), "thousand "); 
  
    // handles digit at hundreds places (if any) 
    $out .= numToWords(((int)($n / 100) % 10), "hundred "); 
  
    if ($n > 100 && $n % 100) 
        $out .= "and "; 
  
    // handles digits at ones and tens 
    // places (if any) 
    $out .= numToWords(($n % 100), ""); 
  
    return $out; 
} 
  

$mpdf=new mPDF('utf-8', 'A4-L'); 
$mpdf->SetDisplayMode('fullpage' ,'single');
$text = "";
$sn = 0;
 $BuildingPhotograph = "";
$BuildingPlanPhotoName = "";
$shop = false;
$annexure = "";

$name="";
$empId="";
$joinDate="";
$bankName="";
$accountNo="";
$ifsc="";
$leftDate="";
$panNo="";
$department="";
$designation="";
$arrearDays=0;
$location="";
$loanBalance=0;
$daysPaid=0;
$daysLWP=0;
$basic=0;
$hra=0;
$basicSalary=0;
$ecm_hra=0;
$ecm_other=0;
$incentive=0;
$pf=0;
$other=0;
$salary_total=0;
$gross_salary=0;
$total_deduction=0;
$net_pay=0;
$actual_basic=0;
$actual_hra=0;
$actual_basicSalary=0;
$actual_ecm_hra=0;
$actual_ecm_other=0;
$actual_incentive=0;
$actual_pf=0;
$actual_other=0;
$month_year="";
$esi=0;
$actual_esi=0;
$tds=0;
$actual_tds=0;

if(isset($_POST['name'])){
   $name=strtoupper($_POST['name']);
}

if(isset($_POST['empId'])){
   $empId=strtoupper($_POST['empId']);
}

if(isset($_POST['joinDate'])){
   $joinDate=date('d-m-Y',strtotime($_POST['joinDate']));
   if($joinDate=='01-01-1970'){
      $joinDate="";
   }
}

if(isset($_POST['bankName'])){
   $bankName=strtoupper($_POST['bankName']);
}

if(isset($_POST['accountNo'])){
   $accountNo=$_POST['accountNo'];
}

if(isset($_POST['ifsc'])){
   $ifsc=strtoupper($_POST['ifsc']);
}

if(isset($_POST['leftDate'])){
   $leftDate=date('d-m-Y',strtotime($_POST['leftDate']));
   if($leftDate=='01-01-1970'){
      $leftDate="";
   }
}

if(isset($_POST['panNo'])){
   $panNo=strtoupper($_POST['panNo']);
}

if(isset($_POST['department'])){
   $department=strtoupper($_POST['department']);
}

if(isset($_POST['designation'])){
   $designation=strtoupper($_POST['designation']);
}

if(isset($_POST['arrearDays'])){
   $arrearDays=$_POST['arrearDays'];
}

if(isset($_POST['location'])){
   $location=strtoupper($_POST['location']);
}

if(isset($_POST['loanBalance'])){
   $loanBalance=$_POST['loanBalance'];
}

if(isset($_POST['daysPaid'])){
   $daysPaid=$_POST['daysPaid'];
}

if(isset($_POST['daysLWP'])){
   $daysLWP=$_POST['daysLWP'];
}

if(isset($_POST['basic'])){   
   $actual_basic=(float)$_POST['basic'];
   $basic=number_format($actual_basic,2,'.',',');
}

if(isset($_POST['hra'])){
   $actual_hra=(float)$_POST['hra'];
   $hra=number_format($actual_hra,2,'.',',');
}

if(isset($_POST['basicSalary'])){
   $actual_basicSalary=(float)$_POST['basicSalary'];
   $basicSalary=number_format($actual_basicSalary,2,'.',',');
}

if(isset($_POST['ecm_hra'])){
   $actual_ecm_hra=(float)$_POST['ecm_hra'];
   $ecm_hra=number_format($actual_ecm_hra,2,'.',',');
}

if(isset($_POST['incentive'])){
   $actual_incentive=(float)$_POST['incentive'];
   $incentive=number_format($actual_incentive,2,'.',',');
}

if(isset($_POST['ecm_other'])){
   $actual_ecm_other=(float)$_POST['ecm_other'];
   $ecm_other=number_format($actual_ecm_other,2,'.',',');
}

if(isset($_POST['pf'])){
   $actual_pf=(float)$_POST['pf'];
   $pf=number_format($actual_pf,2,'.',',');
}

if(isset($_POST['esi'])){
   $actual_esi=(float)$_POST['esi'];
   $esi=number_format($actual_esi,2,'.',',');
}

if(isset($_POST['tds'])){
   $actual_tds=(float)$_POST['tds'];
   $tds=number_format($actual_tds,2,'.',',');
}

if(isset($_POST['other'])){
   $actual_other=(float)$_POST['other'];
   $other=number_format($actual_other,2,'.',',');
}

if(isset($_POST['month_year'])){
   $month_year=date('M-Y',strtotime($_POST['month_year'])); 
   if($month_year=='Jan-1970'){
      $month_year="";
   }
}

$actual_net_pay=0;
$number_format_salary_total=0;
$number_format_gross_salary = 0;
$number_format_total_deduction=0;
$word_net_pay_value="";

if($actual_basic>0 && $actual_hra>0 && $actual_other>0){
   $salary_total = ($actual_basic+$actual_hra+$actual_other);
   $number_format_salary_total= number_format(($actual_basic+$actual_hra+$actual_other),2,'.',',');   
}else if($actual_hra>0 && $actual_other>0){
   $salary_total = ($actual_hra+$actual_other);
   $number_format_salary_total= number_format(($actual_hra+$actual_other),2,'.',',');   
}else if($actual_basic>0 && $actual_hra>0){
   $salary_total = ($actual_basic+$actual_hra);
   $number_format_salary_total= number_format(($actual_basic+$actual_hra),2,'.',',');
}else if($actual_basic>0 && $actual_other>0){
   $salary_total = ($actual_basic+$actual_other);
   $number_format_salary_total= number_format((($actual_basic+$actual_other)),2,'.',',');
}else if($actual_basic>0){
   $salary_total = $actual_basic;
   $number_format_salary_total= number_format($actual_basic,2,'.',',');   
}
else{
   $salary_total = 0;
   $number_format_salary_total= number_format(0,2,'.',',');
}

// if($actual_basicSalary>0 && $actual_ecm_hra>0 && $actual_incentive>0){
   $gross_salary = ($actual_basicSalary+$actual_ecm_hra+$actual_incentive+$actual_ecm_other);
   $number_format_gross_salary = number_format(($actual_basicSalary+$actual_ecm_hra+$actual_incentive+$actual_ecm_other),2,'.',',');
// }else if($actual_basicSalary>0 && $actual_ecm_hra>0){
//    $gross_salary = ($actual_basicSalary+$actual_ecm_hra);
//    $number_format_gross_salary = number_format(($actual_basicSalary+$actual_ecm_hra),2,'.',',');
// }else if($actual_basicSalary>0 && $actual_incentive>0){
//    $gross_salary = ($actual_basicSalary+$actual_incentive);
//    $number_format_gross_salary = number_format(($actual_basicSalary+$actual_incentive),2,'.',',');
// }else if($actual_ecm_hra>0 && $actual_incentive>0){
//    $gross_salary = ($actual_ecm_hra+$actual_incentive);
//    $number_format_gross_salary = number_format(($actual_ecm_hra+$actual_incentive),2,'.',',');
// }else if($actual_basicSalary>0){
//    $gross_salary = $actual_basicSalary;
//    $number_format_gross_salary = number_format($actual_basicSalary,2,'.',',');
// }else{
//    $gross_salary = 0;
//    $number_format_gross_salary = number_format(0,2,'.',',');
// }


$total_deduction = $actual_pf+$actual_esi+$actual_tds; 
$number_format_total_deduction = number_format(($actual_pf+$actual_esi+$actual_tds),2,'.',',');

$net_pay=number_format(($gross_salary-$total_deduction),2,'.',',');
$actual_net_pay=($gross_salary-$total_deduction);
// extract($_POST);
if($actual_net_pay>0){ 
   $word_net_pay_value=ucwords(convertToWords($actual_net_pay));
   
   $word_net_pay_value.=" Only";
}

                                              
            $text = "<div style='border:1.5px solid black;width:1200px;height:350px;'>
            <div style='width:100%;'>
            <div style='width:40%;float:left'> <img src='..\images\icons\logo.png' style='width:170px;height:50px;margin-left:25px;margin-top:18px;'> </div>
            <div style='width:60%;float:left;'><span style='font-family:arial;margin-top:5px;font-size:25px;'>Multimind Creations</span><br>
            <span style='font-family:times new roman;font-size:9px;margin-top:5px;'>99, 1st Floor, M.B. Road ,(Next to Basist Complex)<br>
            Khanpur,New Delhi(Delhi)<br>
            Pin 110062</span>
            </div>
            </div>
            
            <br><div style='border:1px solid black;width:1200px;height:0.1px;'></div>
            <div style='background-color:#C0C0C0'>
            <div style='width:1200px;height:5px;text-align:center;font-family:arial;font-size:13px;margin-top:3px;'><b>PAYSLIP FOR THE MONTH OF ".$month_year."</b></div>
            <div style='border:0.5px solid black;margin-top:3px;width:1200px;height:0.1px;'></div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Name</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$name."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana,sans-serif;font-size:10px;padding-top:3px;'><b>&nbsp;Employee ID</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$empId."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Joining Date</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$joinDate."</div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Bank Name</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$bankName."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Account No</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$accountNo."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;IFSC</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$ifsc."</div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Left Date</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$leftDate."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;PAN No</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$panNo."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Department</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$department."</div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Designation</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$designation."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Days Paid</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$daysPaid."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Days LWP</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$daysLWP."</div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Arrear Days</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$arrearDays."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Location</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$location."</div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Loan Balance</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'>&nbsp;".$loanBalance."</div>
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:251px;height:20px;float:left;font-family:verdana;font-size:12px;padding-top:3px;text-align:center;'><b>&nbsp;Salary Rates(Rs)</b></div>
           
            <div style='border:1px solid black;width:248px;height:20px;float:left;font-family:verdana;font-size:12px;padding-top:3px;text-align:center;'><b>&nbsp;Earning Current Month(Rs) </b></div>
           
            <div style='border:1px solid black;width:247.9px;height:20px;float:left;font-family:verdana;font-size:12px;padding-top:3px;text-align:center;'><b>&nbsp;Deduction(Rs)</b></div>
        
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:251px;height:20px;float:left;font-family:verdana;font-size:10px;padding-top:3px;padding-bottom:3px;'>
            
            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;Basic</div>
            <div style='width:50%;float:left;text-align:right;'>".$basic."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;HRA</div>
            <div style='width:50%;float:left;text-align:right;'>".$hra."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;Other</div>
            <div style='width:50%;float:left;text-align:right;'>".$other."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;</div>
            <div style='width:50%;float:left;text-align:right;'>&nbsp;</div>
            </div>

            </div>
           
            <div style='border:1px solid black;width:248px;height:20px;float:left;font-family:verdana;font-size:10px;padding-top:3px;padding-bottom:3px;'>
            
            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;Basic Salary</div>
            <div style='width:50%;float:left;text-align:right;'>".$basicSalary."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;HRA</div>
            <div style='width:50%;float:left;text-align:right;'>".$ecm_hra."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;Other</div>
            <div style='width:50%;float:left;text-align:right;'>".$ecm_other."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;Incentive</div>
            <div style='width:50%;float:left;text-align:right;'>".$incentive."&nbsp;</div>
            </div>

            </div>
           
            <div style='border:1px solid black;width:247.9px;height:20px;float:left;font-family:verdana;font-size:10px;padding-top:3px;padding-bottom:3px;'>
            
            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;PF</div>
            <div style='width:50%;float:left;text-align:right;'>".$pf."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;ESI</div>
            <div style='width:50%;float:left;text-align:right;'>".$esi."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;TDS</div>
            <div style='width:50%;float:left;text-align:right;'>".$tds."&nbsp;</div>
            </div>

            <div style='width:100%'>
            <div style='width:50%;float:left;'>&nbsp;</div>
            <div style='width:50%;float:left;text-align:right;'>&nbsp;</div>
            </div>

            </div>
        
            </div>

            <div style='color:#00008B;'>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Total:</b></div>
            <div style='border:1px solid black;width:148.9px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;text-align:right;'><b>".$number_format_salary_total."&nbsp;</b></div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Gross Salary:</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;text-align:right;'><b>".$number_format_gross_salary."&nbsp;</b></div>
            <div style='border:1px solid black;width:100px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;'><b>&nbsp;Total Deduction:</b></div>
            <div style='border:1px solid black;width:146px;height:18px;float:left;font-family:verdana;font-size:10px;padding-top:3px;text-align:right;'><b>".$number_format_total_deduction."&nbsp;</b></div>
            </div>

            <div style='border:1px solid black;width:1200px;height:10px;font-family:verdana;font-size:10px;padding-top:3px;padding-bottom:3px;color:#00008B;'><b>&nbsp;Net Pay : ".$net_pay." (".$word_net_pay_value.")</b></div>
                
            <div style='border:1px solid black;background-color:#C0C0C0;width:1200px;height:10px;font-family:verdana;font-size:10px;padding-top:3px;padding-bottom:3px;color:#00008B;'>&nbsp;***Note :Since This is Computer Generated Payslip, Hence no Signature is Required
            </div>
               
           
            ";
            $text .= "</div>";

            $mpdf->setHeader();
            $mpdf->SetAutoFont();
            $mpdf->showImageErrors = true;

            $mpdf->AddPage('P','','','','',5,5,5,10,8,1);
            $mpdf->WriteHTML($text);

header("Content-type: application/pdf");
header("Content-disposition: attachment; filename=PaySlipMultimindCreations.pdf");
header('Cache-Control: max-age=0'); 
//  readfile($mohalName.".pdf");
$mpdf->Output('PaySlip.pdf', 'I');
exit;
?>
