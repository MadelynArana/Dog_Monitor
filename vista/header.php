<?php session_start();  ?>

<html>
    <head>
        <meta charset = "UTF-8">
        <title>Ingreso</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src = "../../recurso/js/jquery-3.3.1.min.js"></script>
        <script src="../../recurso/js/misFunciones.js"></script>
        <link rel="shortcut icon" href="https://media.flaticon.com/dist/min/img/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <style>



            body{
                margin:0;
                padding:0;
                font-size: 17px;
            }
            .Menu li {
                display: inline-block;
                width: 135px;
                padding: 14px;
                background: #00CAFA;
                text-align: center;
                font-weight: bold;
                border: 2px solid black;
            }
            .Menu img{         
                width: 41px;
            }
            .form-control {
                border: 5px solid #3EABC2;
            }
            .logo img{
                width: 221px;
            }
            a {
                color: #000;
                text-decoration: none;
            }
            .form-group {
                margin-bottom: 0; 
            }
            label {
                display: inline-block;
                margin-bottom: 0; 
            }
            .btn-danger{
                background-color:#FF448A !important;
            }
            a:hover {
                color: #0000;
                text-decoration: underline;
            }

            .menuRegistro li{
                display: inline-block;
                width: 250px;
                background: red;
                padding: 20px;
                text-align: center;
                font-weight: bold;
            }
            .tituloMapa{
                font-size: 21px;
                font-weight: bold;
                padding: 17px;
            }
            .menuRegistro{
                width:100%;
            }
            .tituloBienvenida{
                font-size: 27px;
            }
            .tituloListadoMascotas  h3, h3 {
                font-size: 21px;
                font-weight: bolder;

            }
            .mascotaLista,
            .mascotaRegistro{
                border: 5px solid #17a2b8;
                padding: 18px;
                margin: 5px;
                border-radius: 20px;
            }
            table td, .table th ,
            .table thead th {

                border-top: 5px solid #17a2b8 !important;
            }
            .mapaMascota {
                text-align: center;
                color: black;
                border: 5px solid #50a3b9;
                margin: 20px 0;
                width: 100%;
            }
            .nombreMascota,.codigoMascota{
                text-align: center;
                font-size: 24px;
                font-weight: bold;
            }
            .cabeceraMonitor{
                padding: 20px;
            }
            .pulso, .temperatura, .humedad {
                font-weight: bold;
                font-size: 24px;
                padding: 6px;
                color: #101010;
            }
            .btn-info a:hover{
                color:#ffff;
            }
            .btn-info a{
                font-weight: bold;
                color: #ffff;
            }
            @media (max-width: 600px) {

                .container{
                    width: 88%;
                }
                .formIngreso {
                    padding: 25px 0;
                    margin: 0 auto;
                }
                .logo img{
                    padding: 24px 0 0 24px;
                }
            }

        </style>    


    </head>


    <body>

