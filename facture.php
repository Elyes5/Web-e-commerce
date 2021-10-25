<!DOCTYPE html>
<html lang="en">

<head>
    <link href="print_style.css" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" href="paper.css">
    <link rel="stylesheet" href="normalize.css">
    <style>@page {
        size: A4 portrait;
        margin-top: 8px;
        margin-bottom: 10px;
        margin-left: 20px;
    }</style>
    <style>
        .column {
            float: left;
            padding: 5px;
        }
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        table tbody tr td {
            padding: 2px !important;
            line-height: 1.35 !important;
        }

        @media print {
            .box-body {
                margin-top: 10px !important;
                margin-bottom: 10px;
            }
        }
    </style>
    <style>
        .center-me {
            font-size: 15px;
            margin: auto;
            height: 10px;
            max-width: 500px;
            margin: 75px auto 40px auto;
            display: flex;
        }
        .impression{
        background-color:white;
        border:none;
        cursor:pointer;
        }
        #edit{
        display:inline-block;
        position:relative;
        top:-10px;
        font-weight:bold;
        }
    </style>
</head>
<body class="A4 portrait">
<?php 
session_start();
require_once'dbbcon.php';
$sql5="UPDATE `commande` SET `statut`='validee' WHERE idcommande='".$_GET['idc']."' ";
$result5 = mysqli_query($conn,$sql5);
$sql="SELECT c.mail,c.fullname,c.adr,co.date,co.prixtot FROM clients c,commande co WHERE co.idcommande='".$_GET['idc']."' and co.uss=c.uss ";
$result = mysqli_query($conn,$sql);
$data=mysqli_fetch_array($result);
$sql3="SELECT * FROM `facture` WHERE idcommande='".$_GET['idc']."' ";
$result3 = mysqli_query($conn,$sql3);

?>

<section class="sheet" id="content-print">
    <style>
        table {
        }
    </style>

    <div class="box-body" id="box_data" style="display: flex;padding: 5px 10px 0 10px;margin-bottom: -21px;">
        <div style="width: 100%;padding-right: 10px;" class="col-md-12">
            <div class="row">
                <div class="col-lg-4" style="width: 70%;padding-left: 20px;">
                    <h4>INVOICE</h4>
                </div>
                <div class="col-lg-8" style="width: 30%;">
                    <h5 style="font-size: 20px;margin-bottom: 15px;margin-top: 45px;">Info+Store </h5>
                     <img src="logo.png" width="120" height="120">

                    <p style="font-size: 12px;margin: 0;padding: 0;">Address:<br><?php print $data[2]; ?></p>
                    

                    <p style="font-size: 12px;margin: 0;padding-top: 5px;;">Email:<br><?php print $data[0]; ?></p>
                    <br>
                </div>
            </div>
            <div class="" style="display: flex;">
            <table border="1" style="width:30%">
                <tr class="" style="background: rgba(217,225,242,1.0)">
                    <td style="font-size: 14px;"  class="db text-center" width="100px">
                        DATE & TIME
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px;"><?php print $data[3] ?></td>
                </tr>
            </table>
            </div>
            <br>

            <table width="100%" border="1">
                <tr style="background: rgba(217,225,242,1.0)">
                    <th class="text-center" colspan="2" style="width: 25%;">Bill To</th>
                </tr>
                <tr>
                    <th style="width: 5%;font-size: 12px;background: rgba(217,225,242,1.0)">Consumer Name</th>
                    <th><?php print $data[1]; ?></th>
                </tr>
                <tr>
                    <th style="width: 5%;font-size: 12px;background: rgba(217,225,242,1.0)">Address</th>
                    <th><?php print $data[2]; ?></th>
                </tr>
                <tr>
                    <th style="width: 5%;font-size: 12px;background: rgba(217,225,242,1.0)">Email Address</th>
                    <th><?php print $data[0]; ?></th>
                </tr>
            </table>
            <br>
            <table width="100%" border="1px">
                <tr style="background: rgba(217,225,242,1.0);">
                    <th class="text-center" colspan="3">
                        Product 
                    </th>
                    <th class="text-center">
                        Price
                    </th>
                    <th class="text-center">
                        Quantity
                    </th>
                    <th class="text-center">
                        Amount
                    </th>
                </tr>
                <tbody>
                <?php
                for($i=0;$i<mysqli_num_rows($result3);$i++){ 
                    $data3=mysqli_fetch_assoc($result3);
                    $sql2="SELECT * from produit where idprod='".$data3['idprod']."'  ";
                    $result2 = mysqli_query($conn,$sql2);
                    $data2=mysqli_fetch_assoc($result2);
                    ?>
                <tr><td colspan="3"><a href="produit.php?nomprod=<?php print $data2['nomprod'];  ?>"><?php print $data2['nomprod']; ?></a></td><td><?php print $data2['prix']; ?> DT</td><td><?php print $data3['qte']; ?></td><td colspan='2'><?php print $data3['qte']*$data2['prix']; ?> DT</td></tr>
               <?php }?>
                </tbody>
                <tfoot>
                <tr style="background: rgba(217,225,242,1.0);">
                    <td colspan="4">Amount</td>
                    <td colspan="2"><?php print $data[4]; ?> DT</td>
                </tr>
                <tr style="background: rgba(217,225,242,1.0);">
                    <td colspan="4">Final Amount</td>
                    <td colspan='2'><?php if($data[4]>1000) { ?>Livrason gratuit  <?php print $data[4];}else{ ?>Livrason 7 DT <?php print $data[4]+7;} ?> DT</td>
                </tr>
                </tfoot>
            </table>
            <br>
            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="19%" rowspan="3" valign="top"><strong class="asd"> &nbsp;<br></strong></td>
                    <td width="65%" align="center" valign="top">
                        <h6>If you have any query about this invoice, please contact us at</h6>
                        <h6>Name info+store , Email infoplusstore.sup@gmail.com <a href="mailto:infoplusstore.sup@gmail.com">Send email</a>, Phone +216 710555500</h6></td>
                    <td width="16%" valign="top"><h6 style="margin-bottom: 0;">
                        <span style="text-decoration: dashed; padding-left: 100%;color: #000; border-bottom: 1px solid black;"></span>
                    </h6>
                        <h6 class="text-center"
                        style="margin-top: 5px;">Signature and Seal<img src="sig2.png" width="300" height="100" ></h6></td>
                        <button  class="impression" onclick="window.print();" ><img src="imprimer.jpg" width="40px" height="40px"><p id="edit">Imprimer</p></button>
                        </td>
                </tr>

            </table>
        </div>

    </div>

</section>
<?php

?>
</body>

</html>