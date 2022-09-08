<?php
   session_start();
   if(isset($_SESSION['usuario']))
    {
        // recuperando la session
        $usuario=$_SESSION['usuario'];
        // print("Bienvenido: ".$usuario[1]." ".$usuario[2]);
    }
    else
    {   
        // redireccionar para el login
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votaciones</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="princip.css">
</head>
<body>
        <header class="hero">
            <div class="textos-hero">
                <h1>Bienvenido</h1>
                <p>Aprendiz, te invitamos a explorar la pagina, aqui encontraras a los candidatos postulados. </p>
            </div>
            <div class="svg-hero" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
          
        </header>
        <section class="wave-contenedor website">
            <img src="imagenes/img2.png" alt="">
            <div class="contenedor-textos-main">
            <h2 class="titulo left">Title of section</h2>
            <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis inventore excepturi ullam facere facilis quae minima minus pariatur sapiente repellat?</p>
        </div>
        </section>

        <section class="info">
            <div class="contenedor">
                <h2 class="titulo left">Juntos podemos mejorar</h2>
                <p>Apoyemonos entre todos para tener un mejor futuro.</p>
            </div>
            
        </section>

        <section class="cards contenedor">
        <h2 class="titulo">Candidatos</h2>
        
        <div class="content-cards">
        <?php
                        if(include('Administrador/conectar.php'))
                        {
                            $sql="select registrar_votaciones.numero_documento,tipo_documento.nombre,registrar_votaciones.nombres,registrar_votaciones.apellidos,formacion.nombre,sede.nombre,registrar_votaciones.fotografia,registrar_votaciones.propuesta_campaña 
                            from tipo_documento,sede,formacion,registrar_votaciones
                            where registrar_votaciones.cod_tipo_documento=tipo_documento.codigo and registrar_votaciones.cod_formacion=formacion.codigo 
                            and registrar_votaciones.cod_sede=sede.codigo ";
                            $tabla=mysqli_query($conectar,$sql);
                            while($fila=mysqli_fetch_array($tabla))
                            {
                               ?>
                                <form action="guardado.php" method="post">
                                    <article class="card">
                                        <img src="./Administrador/GestionarCandidatos/fotos/<?php print($fila[6]); ?>" alt="">
                                        <div class="tooltip">
                                            <h2>Propuestas</h2>
                                            <span class="tooltiptext">
                                                <h2>Propuestas</h2>
                                                <p><?php print($fila[7]); ?></p>
                                            </span>
                                        </div>
                                        <h3> <?php print($fila[2]." ".$fila[3]); ?></h3>
                                        <p><?php print($fila[0]." - ".$fila[1]); ?></p>
                                        <input type="hidden" name="cedula" value="<?php echo $fila[0]; ?>">
                                        
                                        <p><?php print($fila[4]); ?></p>
                                        <p><?php print($fila[5]); ?></p>
                                        
                                        <button type="submit">VOTAR</button>
                                        
                                    </article>
                                </form>
                            

                               <?php
                            }
                        }
                        else
                        {
                            print("error al conectarse a la base de datos");
                        }
                    ?>
                        </div>
               </section>
        <section class="info-last">
            <div class="contenedor last-section">
                <div class="contenedor-textos-main">
                    <h2 class="titulo left">Title of section</h2>
                <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad odit laboriosam ipsam vel vitae blanditiis non, modi natus voluptas a?</p>
               
                </div>
                <img src="imagenes/img3.png" alt="">
            </div>
           
            <div class="svg-wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #f97d25;"></path></svg></div>
        </section>
        <footer id="contacto">
            <div class="contenedor">
                <p>© Copyright 2022 - SENA</p>
                <p>PROGRAMMERS - Ronald Millan e Isaac Canchano</p>
            </div>
        </footer>
        
        <script>
            const open = document.getElementById('open');
            const modal_cont = document.getElementById('modal_cont');
            const close = document.getElementById('close');

            open.addEventListener('click', () => {
            modal_cont.classList.add('show');  
            });

            close.addEventListener('click', () => {
            modal_cont.classList.remove('show');
            });
        </script>
        <script src="https://kit.fontawesome.com/ad7b810064.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

