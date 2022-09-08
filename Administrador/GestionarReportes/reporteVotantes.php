<?php
    require('fpdf/fpdf.php');
    $pdf=new FPDF('L','mm','Legal');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(155);
    $pdf->Cell(30,10,'REPORTE DE VOTANTES',0,0,'C',0);
    $pdf->Ln(20);
    $pdf->Cell(20);
    $pdf->Cell(48,10,'Numero de Documento',1,0,'C',0);
    $pdf->Cell(40,10,'Tipo de Documento',1,0,'C',0);
    $pdf->Cell(40,10,'Nombres',1,0,'C',0);
    $pdf->Cell(40,10,'Apellidos',1,0,'C',0);
    $pdf->Cell(45,10,'Formacion',1,0,'C',0);
    $pdf->Cell(40,10,'Sede',1,0,'C',0);
    $pdf->Cell(40,10,'Estado',1,1,'C',0);

    $sql="select gestionar_votantes.numero_documento,tipo_documento.nombre,gestionar_votantes.nombres,gestionar_votantes.apellidos,
    formacion.nombre,sede.nombre, usuario.estado from gestionar_votantes,tipo_documento,formacion,sede, usuario
    where gestionar_votantes.cod_tipo_documento=tipo_documento.codigo and gestionar_votantes.cod_formacion=formacion.codigo 
    and gestionar_votantes.cod_sede=sede.codigo and gestionar_votantes.numero_documento=usuario.usuario order by usuario.estado ";
    if($conectar=mysqli_connect("localhost","root","","dbvotaciones"))
    {
        $tabla=mysqli_query($conectar,$sql);
        while($fila=mysqli_fetch_array($tabla))
        {
            $pdf->Cell(20);
            $pdf->Cell(48,10,$fila[0],1,0,'C',0);
            $pdf->Cell(40,10,$fila[1],1,0,'C',0);
            $pdf->Cell(40,10,$fila[2],1,0,'C',0);
            $pdf->Cell(40,10,$fila[3],1,0,'C',0);
            $pdf->Cell(45,10,$fila[4],1,0,'C',0);
            $pdf->Cell(40,10,$fila[5],1,0,'C',0);
            if($fila[6]==1){
                $pdf->Cell(40,10,'Ya voto',1,1,'C',0);
            }
            else{
                $pdf->Cell(40,10,'No ha votado',1,1,'C',0);
            }
            
        }
    }
    else{
        $pdf->Cell(90,10,'Error al conectar a la base de datos',1,0,'C',0);
    }
    $pdf->OutPut();
?>
