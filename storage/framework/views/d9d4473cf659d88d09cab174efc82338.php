<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF</title>
        <!-- Bootstrap Css -->
        <script src="<?php echo e(URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <link href="<?php echo e(URL::asset('build/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <style>
            @font-face {
                font-family: 'Maven Pro';
                src: local('Maven Pro'), local('Maven-Pro'), url('<?php echo e(storage_path('fonts/MavenProRegular.ttf')); ?>') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            @page {
                size: A4 landscape;
                margin: 0;
            }
            body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                overflow: hidden;
                display: flex;
            }
            .background {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                position: absolute;
            }
            .image-bg {
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: -1;
            }
            .content {
                position: relative;
                margin-top: 22%;
                margin-left: 10.6%;
                width: 70%;
                height: 32em;
            }
            .student_name {
                font-family: 'Maven Pro', sans-serif;
                font-size: 40px;
                margin-top: 37px;
            }
            .culminate {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
                /* margin-top: -2.8%; */
            }
            .course {
                font-family: 'Maven Pro', sans-serif;
                font-size: 23.5px;
                margin-top: 4.3%;
            }
            .activity {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
                margin-top: -1.1%;
            }
            .asociate {
                font-family: 'Maven Pro', sans-serif;
                font-size: 17px;
                margin-top: 2.6%;
            }
            .asociates-logos {
                position: relative;
                margin-top: -3.7%;
                width: 51%;
                height: 35px;
                margin-left: 18%;
            }
            .asociate-image {
                width: 135px;
                height: 100%;
                margin-right: 5%;
            }
            .blank {
                width: 25%;
            }
            .signature {
                height: 90px;
            }
            .line_signature {
                width: 35%;
                border-bottom: 1px solid black;
            }
            .name_signature {
                font-family: 'Maven Pro', sans-serif;
                font-size: 20px;
                padding-top: 1.5%;
            }
            .position_signature {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
                padding-top: 0.5%;
            }
            .company_signature {
                font-family: 'Maven Pro', sans-serif;
                font-size: 8.5px;
            }
            .qr {
                margin-top: 22%;
                position: relative;
                width: 20%;
                height: 32em;
            }
            .qr_content {
                margin-top: 9.2em;
                margin-left: 2.25em;
                width: 64%;
                height: 8.95em;
            }
            .qr_content_text {
                font-family: 'Maven Pro', sans-serif;
                margin-top: -10px;
                margin-left: 4.5em;
                width: 64%;
                height: 1em;
                font-size: 8px;
            }
            .qr_verify {
                margin-top: 2em;
                margin-left: 2.25em;
                width: 64%;
                height: 8.95em;
            }
            .qr_verify_text {
                font-family: 'Maven Pro', sans-serif;
                margin-top: -10px;
                margin-left: 4.5em;
                width: 64%;
                height: 1em;
                font-size: 8px;
                display: block;
                word-wrap: break-word;
            }
            /* .qr_verify_text span {
                display: block;
                margin-bottom: 5px;
            } */
        </style>
    </head>
    <body>
        <div class="background">
            <img class="image-bg" src="<?php echo e(asset('storage/certificates/templates/background.png')); ?>" alt="background" width="100%" height="100%">
        </div>
        <div class="content">
            <p class="student_name">Nombre y Apellido</p>
            <p class="culminate">Por haber culminado el curso</p>
            <p class="course"> Nombre Curso (Curso_Horas HS)" </p>
            <p class="activity">Actividad organizada por el Centro Paraguayo de Productividad y Calidad - CEPROCAL y la
                <br>
                Unión Industrial Paraguaya - UIP en fecha 09/01/2025
            </p>
            
            <table class="signatures"
                
                style="
                    margin-top: 9%;
                    margin-left: 0.5%;
                    width: 85%;
                    font-family: 'Viga', sans-serif;
                    text-align: center;
                ">
                <tbody>
                    <tr>
                        <td class="line_signature"><img class="signature" src="<?php echo e(asset('storage/certificates/templates/signature_1.png')); ?>" alt="signature_1"></td>
                        <td class="blank"></td>
                        <td class="line_signature"><img class="signature" src="<?php echo e(asset('storage/certificates/templates/signature_2.png')); ?>" alt="signature_2"></td>
                    </tr>
                    <tr>
                        <td class="name_signature">ING. ENRIQUE DUARTE</td>
                        <td class="blank"></td>
                        <td class="name_signature">SR. OSVALDO ACHÓN</td>
                    </tr>
                    <tr>
                        <td class="position_signature">Presidente</td>
                        <td class="blank"></td>
                        <td class="position_signature">Presidente</td>
                    </tr>
                    <tr>
                        <td class="company_signature">UNIDÓN INDUSTRIAL PARAGUAYA</td>
                        <td class="blank"></td>
                        <td class="company_signature">CEPROCAL</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="qr">
            <div class="qr_content">
                <?php
                    $link_content = route('show_course', 24);
                ?>
                <?php echo QrCode::size(130)->generate($link_content); ?>

            </div>
            <div class="qr_content_text">
                <span>CONTENIDO PROGRAMÁTICO</span>
            </div>
            <div class="qr_verify">
                
            </div>
            <div class="qr_verify_text">
                <span>VERIFICACIÓN DE AUTENTICIDAD</span>
                <br>
                <span><?php echo e(Hash::make('24iGPx7G96ZXdg2PgZd9')); ?></span>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/pdf_test.blade.php ENDPATH**/ ?>