<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF</title>
        <!-- Bootstrap Css -->
        <script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <link href="{{ URL::asset('build/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            @font-face {
                font-family: 'Maven Pro';
                src: url('{{ public_path('fonts/MavenProRegular.ttf') }}') format('truetype');
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
                margin-top: 20%;
                width: 100%;
                height: 32em;
            }
            .student_name {
                font-family: 'Maven Pro', sans-serif;
                font-size: 40px;
                margin-top: 37px;
                text-align: center;
            }
            .culminate {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
            }
            .forum {
                font-family: 'Maven Pro', sans-serif;
                font-size: 23.5px;
                margin-top: 4.3%;
            }
            .activity {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
                width: 80%;
                margin-top: -13%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: justify;
            }
            .date {
                display: block;
                text-align: right !important;
            }
            .blank {
                width: 25%;
            }
            .signatures {
                font-family: 'Viga', sans-serif;
                margin-top: 12.5%;
                width: 75%;
                top: 50%;
                left: 50%;
                transform: translate(18%, -20%);
                text-align: center;
            }
            .line_signature {
                border-bottom: 1px solid black;
            }
            .name_signature {
                font-family: 'Maven Pro', sans-serif;
                padding-top: 1.5%;
            }
            .position_signature {
                font-family: 'Maven Pro', sans-serif;
                font-size: 14px;
                padding-top: 0.5%;
            }
            .company_signature {
                font-family: 'Maven Pro', sans-serif;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="background">
            <img class="image-bg" src="{{ asset('storage/forums_certificates/templates/background.png') }}" alt="background" width="100%" height="100%">
        </div>
        <div class="content">
            <p class="student_name">{{ $student->name }}</p>
            <p class="activity">Por su participación en la cuarta edición del <b>"{{ $forum->name }}" ({{ $forum->hours }} horas)</b>, actividad organizada por el Centro Paraguayo de
                de Productividad y Calidad - CEPROCAL y la Unión Industrial Paraguaya - UIP.
                <br><br>
                <span class="date">Asunción, {{ Carbon\Carbon::now()->translatedFormat('d \d\e F \d\e\l Y') }}</span>
            </p>
            <table class="signatures">
                <tbody>
                    <tr>
                        <td class="line_signature" style="width: 35%"><img style="height: 90px" src="{{ asset('storage/forums_certificates/templates/signature_1.png') }}" alt="signature_1"></td>
                        <td class="blank"></td>
                        <td class="line_signature" style="width: 35%"><img style="height: 90px" src="{{ asset('storage/forums_certificates/templates/signature_2.png') }}" alt="signature_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 16px; font-weight: bold;">ING. ENRIQUE DUARTE</td>
                        <td class="blank"></td>
                        <td style="font-size: 16px; font-weight: bold;">SR. OSVALDO ACHÓN</td>
                    </tr>
                    <tr>
                        <td class="position_signature">Presidente</td>
                        <td class="blank"></td>
                        <td class="position_signature">Presidente</td>
                    </tr>
                    <tr>
                        <td class="company_signature">UNIÓN INDUSTRIAL PARAGUAYA</td>
                        <td class="blank"></td>
                        <td class="company_signature">CEPROCAL</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>