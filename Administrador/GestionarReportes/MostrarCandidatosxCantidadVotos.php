<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Candidatos</title>
    <link rel="stylesheet" href="listarr3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
        include('../menu.php');
      ?>
    <main class="contenedor" style="background: url(../imagenes/img1.jpg); background-repeat:no-repeat; background-size: cover;">
    <div class="cont">
        <table>
            <caption>Listado de Candidatos</caption>
            <thead>
                <tr>
                    <th>Fotografia</th>
                    <th>Tipo de documento</th>
                    <th>Numero de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Formacion</th>
                    <th>Sede</th>
                    <th>Numero de Votos</th>
                </tr>
            </thead>
            <?php
                $sql="select registrar_votaciones.fotografia,tipo_documento.nombre,registrar_votaciones.numero_documento,registrar_votaciones.nombres,registrar_votaciones.apellidos,formacion.nombre,sede.nombre,registrar_votaciones.numero_votos
                from registrar_votaciones,tipo_documento,formacion,sede where registrar_votaciones.cod_tipo_documento=tipo_documento.codigo and registrar_votaciones.cod_formacion=formacion.codigo and registrar_votaciones.cod_sede=sede.codigo";
                if($conectar=mysqli_connect("localhost","root","","dbvotaciones"))
                {
                    // consulta la tabla
                    $tabla=mysqli_query($conectar,$sql);
                    while($fila=mysqli_fetch_array($tabla))
                    {
                        print("<tbody>");
                        print("<tr>");
                        print("<td data-label='Fotografia'><img src='../GestionarCandidatos/fotos/$fila[0]'></td>");
                        print("<td data-label='Tipo de documento'>$fila[1]</td>");
                        print("<td data-label='Numero de Documento'>$fila[2]</td>");
                        print("<td data-label='Nombres'>$fila[3]</td>");
                        print("<td data-label='Apellidos'>$fila[4]</td>");
                        print("<td data-label='Formacion'>$fila[5]</td>");
                        print("<td data-label='Sede'>$fila[6]</td>");
                        print("<td data-label='Numero de Votos'>$fila[7]</td>");
                        print("</tr>");
                        print("</tbody>");
                    }
                }
                else
                {
                    print("error al conectar");
                }
            ?> 
           
        </table>
    <a href="reporteCandidatos.php" target="_blank" class="a">Ver PDF</a>
    </div>
    
    </main>

    <footer id="contacto">
            <div>
                <p>© Copyright 2022 - SENA</p>
                <p>PROGRAMMERS - Ronald Millan e Isaac Canchano</p>
            </div>
        </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>