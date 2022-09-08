<?php
    require('fpdf/fpdf.php');
    $pdf=new FPDF('L','mm','Legal');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(155);
    $pdf->Cell(30,10,'REPORTE DE CANDIDATOS',0,0,'C',0);
    $pdf->Ln(20);
    $pdf->Cell(2);
    $pdf->Cell(48,10,'Fotografia',1,0,'C',0);
    $pdf->Cell(40,10,'Tipo de Documento',1,0,'C',0);
    $pdf->Cell(45,10,'Numero de Documento',1,0,'C',0);
    $pdf->Cell(40,10,'Nombres',1,0,'C',0);
    $pdf->Cell(45,10,'Apellidos',1,0,'C',0);
    $pdf->Cell(40,10,'Formacion',1,0,'C',0);
    $pdf->Cell(35,10,'Sede',1,0,'C',0);
    $pdf->Cell(40,10,'Numero de Votos',1,1,'C',0);

    $sql="select registrar_votaciones.fotografia,tipo_documento.nombre,registrar_votaciones.numero_documento,registrar_votaciones.nombres,registrar_votaciones.apellidos,formacion.nombre,sede.nombre,registrar_votaciones.numero_votos
    from registrar_votaciones,tipo_documento,formacion,sede where registrar_votaciones.cod_tipo_documento=tipo_documento.codigo and registrar_votaciones.cod_formacion=formacion.codigo and registrar_votaciones.cod_sede=sede.codigo";
    if($conectar=mysqli_connect("localhost","root","","dbvotaciones"))
    {
        $tabla=mysqli_query($conectar,$sql);
        while($fila=mysqli_fetch_array($tabla))
        {
            
            $pdf->Cell(2);
            $pdf->Cell(40,10,"../GestionarCandidatos/fotos/$fila[0]",1,0,'C',0);
            $pdf->Cell(40,10,$fila[1],1,0,'C',0);
            $pdf->Cell(45,10,$fila[2],1,0,'C',0);
            $pdf->Cell(40,10,$fila[3],1,0,'C',0);
            $pdf->Cell(45,10,$fila[4],1,0,'C',0);
            $pdf->Cell(40,10,$fila[5],1,0,'C',0);
            $pdf->Cell(35,10,$fila[6],1,0,'C',0);
            $pdf->Cell(40,10,$fila[7],1,1,'C',0);
        }
    }
    else{
        $pdf->Cell(90,10,'Error al conectar a la base de datos',1,0,'C',0);
    }
    $pdf->OutPut();
?>