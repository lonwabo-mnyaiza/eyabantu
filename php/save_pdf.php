<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'fpdf17/fpdf.php';

class PDF extends FPDF
{
// Load data
function LoadData()
{ 
    
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(50,7,$col,1, "C");
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(50,6,$col,1, "C");        
        $this->Ln();
    }
}
}
    
    require_once 'connect.php';
    //    $file_location = 'files/schedules/technician schedule.pdf';
    //    $query = "INSERT INTO schedule_file (ScheduleFile) "
    //            . "VALUES ('$file_location')";
    //  $result = mysqli_query($db_conn, $query);
    
    $query = "SELECT ScheduleID, Day, City, TechnicianEmail, TechnicianName, Task FROM schedules";
    $result = mysqli_query($db_conn, $query);
    $schedule_results = mysqli_fetch_all($result, MYSQLI_NUM);   
   
    mysqli_close($db_conn);
    
$pdf = new PDF();
// Column headings
$header = array('No', 'Day', 'City', 'Technician Email', 'Technician Name', 'Task');
// Data loading
//$data = $pdf->LoadData();
$pdf->SetFont('Arial','B',30);
$author = 'eyabantu engineerring services';  
$pdf->SetAuthor($author);
$pdf->AddPage("Landscape");
$pdf->Cell(0, 30, "Technician Schedule", 0, 1, "C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',15);
$pdf->BasicTable($header, $schedule_results);
$pdf->Output("../files/schedules/technician schedule.pdf");

//var_dump(get_class_methods($pdf));
header('Location: ../administrator-schedules-page.php');
?>