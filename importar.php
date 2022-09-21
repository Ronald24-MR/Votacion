<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                importar
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <input type="file" id="txt_archivo" class="form-control">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" onclick="cargarExcel()">Importar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" i
    ntegrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="excel/jquery-3.6.1.min.js"></script>
</body>
</html>


<script>
    document.getElementById("txt_archivo").addEventListener("change",()=>{
        let fileName = document.getElementById("txt_archivo").value;
        let idxDot = fileName.lastIndexOf(".") + 1;
        let extFile = fileName.substr(idxDot,fileName.length).toLowerCase();
        
        if(extFile=="xlsx" || extFile=="xlsb" || extFile=="xlsm"){

        }
        else{
            Swal.fire("Solo archivos excel");
            document.getElementById("txt_archivo").value="";
        }
    });

    function cargarExcel(){
        let archivo = document.getElementById("txt_archivo").value;
        if(archivo.length==0){
            return Swal.fire("Seleccione un archivo");
        }

        let formData = new FormData();
        let excel = $("#txt_archivo")[0].files[0];
        formData.append('excel',excel)
        $.ajax({
            url: 'excel/leer.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(resp){
                document.write(resp+"<br>");
            }
        })
        return false;
    }
</script>