<?php
require 'vendor/autoload.php';
$conectar=mysqli_connect("localhost","root","","dbvotaciones");
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

    public function readCell($columnAddress, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        if ($row>1) {
            return true;
        }
        return false;
    }
}


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = $_FILES['excel']['tmp_name'];

$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

$reader->setReadFilter( new MyReadFilter() );

$spredsheet = $reader->load($inputFileName);
$cantidad = $spredsheet->getActiveSheet()->toArray();

$table = "<table border='1'>";

foreach($cantidad as $row){
    if($row[0] != ''){
        $consulta = "INSERT INTO tipo_documento (codigo,nombre) VALUES ('$row[0]', '$row[1]')";
        if($result = $conectar->query($consulta)){
           $table =  $table.'<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>correcto</td></tr>';
        }
        else{
            $table =  $table.'<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>incorrecto</td></tr>';

        }


    }
    

}
$table = $table."</table>";
print($table);
?>