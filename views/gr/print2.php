<html>
    <head>
        <title>GOODS RECEIVE</title>
        <style>
            <!--
            /*@page { margin: 0px; }
            body { margin: 5px; }
            table{ font-family:"Arial"; font-size:10pt; }*/

            @page { 
                size: 9.5in 11in;
                size: portrait;
                margin: 10px;
            }
            body { margin: 5px; font-family:"dejavu sans";}
            table{ font-size:14px;}
            table thead th{
                font-size:15px;font-weight: bolder;
            }

            -->
        </style>
    </head>
    <body>
        <div style="width: 100%;border: 0px solid #000000;min-height: 300px;">
            <table width="100%" style="border: none">
                <tr>
                    <td style="border: none">
                        <?php
                        echo $company->name . "<br/><span style='font-size:9pt'>" . nl2br($company->address) . "</span>";
                        ?>                    
                    </td>
                </tr>
                <tr>
                    <td style="border: none;text-align: center;"><span style="font-size: 18px;"><b>GOODS RECEIVE</b></span></td>
                </tr>
            </table>
            <br/>
            <table width="99%" border="0" style="border: none">
                <tr valign="top">
                    <td width="50%" style="border: none;">
                        <table width="100%" style="border:none;"> 
                            <tr>
                                <td style="border: none;" width="32%"><strong>GR No.</strong></td>
                                <td style="border: none;" width="2%"><strong>:</strong></td>
                                <td style="border: none;" width="58%"><?php echo $gr->grnumber; ?></td>
                            </tr>
                            <tr>
                                <td style="border: none;" width="32%"><strong>Receive date</strong></td>
                                <td style="border: none;" width="2%"><strong>:</strong></td>
                                <td style="border: none;" width="58%"><?php echo (empty($gr->receivedate)) ? "" : date('d/m/Y', strtotime($gr->receivedate)) ?></td>
                            </tr>
                            <tr>
                                <td style="border: none;"><strong>DO Number / SJ</strong></td>
                                <td style="border: none;"><strong>:</strong></td>
                                <td style="border: none;"><?php echo $gr->letternumber ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50%" style="border: none;">
                        <table width="100%" style="border:none;">                            
                            <tr>
                                <td style="border: none;" width='40%'><strong>SUPPLIER</strong></td>
                                <td style="border: none;" width='1%'><strong>:</strong></td>
                                <td style="border: none;" width='59%'><?php echo $gr->vendorname ?></td>
                            </tr>
                        </table>                    
                    </td>            
                </tr>
            </table>
            <table border='0' width='99%' cellpadding='0' cellspacing='0'>
                <thead>
                    <tr>
                        <th style='padding: 5px;border-width:1px 1px 1px 1px;border-color: #000000;border-style: solid;' width="2%">No</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="10%">PO</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="10%">MR</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="13%">Item Code</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="30%">Item Description</th> 
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="10%">Unit</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="10%">Qty</th>
                        <th style='padding: 5px;border-width:1px 1px 1px 0px;border-color: #000000;border-style: solid;' width="15%">Remark</th>
                    </tr>
                </thead>
                <?php
                $count_row = 10;
                if (!empty($gritem)) {
                    $counter = 1;

                    foreach ($gritem as $result) {
                        ?>
                        <tr valign="top">
                            <td style='border-width:0px 1px 0px 1px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center"><?php echo $counter++; ?></td>  
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'><?php echo $result->ponumber; ?></td>  
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align='center'><?php echo $result->mat_req_number; ?></td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'><?php echo $result->itempartnumber; ?></td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'><?php echo $result->itemdescription; ?></td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center"><?php echo $result->unitcode; ?></td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align='center'><?php echo $result->qty; ?></td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align='center'>
                                <?php
                                echo $result->note;
                                if ($result->rejectqty != 0) {
                                    echo "<br/>Reject : " . $result->rejectqty;
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $count_row--;
                    }
                }
                if ($count_row > 0) {
                    for ($i = $count_row; $i > 0; $i--) {
                        ?>
                        <tr>
                            <td style='border-width:0px 1px 0px 1px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center">&nbsp;</td>  
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'>&nbsp;</td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'>&nbsp;</td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center">&nbsp;</td>                            
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align='center'>&nbsp;</td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' align="center">&nbsp;</td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' align="center">&nbsp;</td>
                            <td style='border-width:0px 1px 0px 0px;border-color: #000000;border-style: solid;padding: 2px;' align="center">&nbsp;</td>

                        </tr>
                        <?php
                    }
                }
                ?>    
                <tr>
                    <td style='border-width:0px 1px 1px 1px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center">&nbsp;</td>  
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'>&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top'>&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align="center">&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' valign='top' align='center'>&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' align="center">&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;' align="center">&nbsp;</td>
                    <td style='border-width:0px 1px 1px 0px;border-color: #000000;border-style: solid;padding: 2px;'>&nbsp;</td>
                </tr>
            </table>
            <br/>     
            <table width="100%">
                <tr>
                    <td width="30%" align="center">
                        Pengirim
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        (................................)
                    </td>
                    <td width="40%" align="center">
                        Diterima Oleh
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <?php echo $this->model_employee->getNameById($this->session->userdata('id')); ?>
                        <hr style="width: 60%"/>
                    </td>
                    <td width="30%" align="center">
                        Mengetahui
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        (................................)
                    </td>
                </tr>
            </table><br/>
            <span style="font-size: 9px;float: left" >Print on <?php echo date('d/m/Y H:i:s') ?></span>
        </div>
    </body>
</html>