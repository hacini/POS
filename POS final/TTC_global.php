<?php
(string)$date2=$_POST['date2'];
(string)$date1=$_POST['date1'];

$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 = "SELECT
  Sum(cartecredit.MONTANTCC) As Sum_MONTANTCC
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth1 = $con->query($sql1);

while($r = $sth1->fetch_assoc()){
    echo('<div id="idsql1" hidden="hidden">'.$r['Sum_MONTANTCC'].'</div>');
}

$sql2 = "SELECT
  Sum(cadeau.MONTANTCADEAU) As Sum_MONTANTCADEAU
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth2 = $con->query($sql2);

while($rr = $sth2->fetch_assoc()){
    echo('<div id="idsql2" hidden="hidden">'.$rr['Sum_MONTANTCADEAU'].'</div>');
}

$sql3 = "SELECT
  Sum(espece.MONTANTESPECE) As Sum_MONTANTESPECE
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth3 = $con->query($sql3);

while($rrr = $sth3->fetch_assoc()){
    echo('<div id="idsql3" hidden="hidden">'.$rrr['Sum_MONTANTESPECE'].'</div>');
}

$sql4 = "SELECT
  Sum(cheque.MONTANTCHEQUE) As Sum_MONTANTCHEQUE
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth4 = $con->query($sql4);

while($rrrr = $sth4->fetch_assoc()){
    echo('<div id="idsql4" hidden="hidden">'.$rrrr['Sum_MONTANTCHEQUE'].'</div>');
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       

        
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {

    Highcharts.chart('container', {

        chart: {
            type: 'solidgauge',
            marginTop: 50
        },

        credits: {
            enabled: false
        },

        title: {
            text: '',
            style: {
                fontSize: '24px'
            }
        },

        tooltip: {
            borderWidth: 0,
            backgroundColor: 'none',
            shadow: false,
            style: {
                fontSize: '16px'
            },
            pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
            positioner: function (labelWidth, labelHeight) {
                return {
                    x: 200 - labelWidth / 2,
                    y: 180
                };
            }
        },

        pane: {
            startAngle: 0,
            endAngle: 360,
            background: [{ // Track for Move
                outerRadius: '112%',
                innerRadius: '88%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
                borderWidth: 0
            }, { // Track for Exercise
                outerRadius: '87%',
                innerRadius: '63%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0.3).get(),
                borderWidth: 0
            }, { // Track for Stand
                outerRadius: '62%',
                innerRadius: '38%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2]).setOpacity(0.3).get(),
                borderWidth: 0
            }]
        },

        yAxis: {
            min: 0,
            max: 100,
            lineWidth: 0,
            tickPositions: []
        },

        plotOptions: {
            solidgauge: {
                borderWidth: '34px',
                dataLabels: {
                    enabled: false
                },
                linecap: 'round',
                stickyTracking: false
            }
        },

        series: [{
            name: 'Carte credit',
            borderColor: Highcharts.getOptions().colors[0],
            data: [{
                color: Highcharts.getOptions().colors[0],
                radius: '100%',
                innerRadius: '100%',
                y: (($('#idsql1').text()/1)/(($('#idsql1').text()/1)+($('#idsql2').text()/1)+($('#idsql3').text()/1)+($('#idsql4').text()/1))).toFixed(2)*100
            }]
        }, {
            name: 'Cadeau',
            borderColor: Highcharts.getOptions().colors[1],
            data: [{
                color: Highcharts.getOptions().colors[1],
                radius: '75%',
                innerRadius: '75%',
               y: (($('#idsql2').text()/1)/(($('#idsql1').text()/1)+($('#idsql2').text()/1)+($('#idsql3').text()/1)+($('#idsql4').text()/1))).toFixed(2)*100
            }]
        }, {
            name: 'Espece',
            borderColor: Highcharts.getOptions().colors[2],
            data: [{
                color: Highcharts.getOptions().colors[2],
                radius: '50%',
                innerRadius: '50%',
               y: (($('#idsql3').text()/1)/(($('#idsql1').text()/1)+($('#idsql2').text()/1)+($('#idsql3').text()/1)+($('#idsql4').text()/1))).toFixed(2)*100
            }]
        },{
            name: 'cheque',
            borderColor: Highcharts.getOptions().colors[3],
            data: [{
                color: Highcharts.getOptions().colors[3],
                radius: '25%',
                innerRadius: '25%',
                y: (($('#idsql4').text()/1)/(($('#idsql1').text()/1)+($('#idsql2').text()/1)+($('#idsql3').text()/1)+($('#idsql4').text()/1))).toFixed(2)*100
            }]
        }]
    });
});
        </script>
    </head>
    <body>


<h1>Montant TTC global  </h1>
<h2>Entre le <?php echo $date1;?> et <?php echo $date2;?></h2>
<div id="container" style="width: 400px; height: 400px; margin: 0 auto">
</div>

    </body>
</html>









