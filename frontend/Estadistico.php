<!DOCTYPE html>
<html>
<head>
<script src="js/morris/raphael-min.js"></script>
<script src="js/morris/jquery-1.8.2.min.js"></script>
  <script src="js/morris/morris-0.4.1.min.js"></script>
<meta charset=utf-8 />
<title>Morris.js Line Chart Example</title>
</head>

<script type="text/javascript">

$(document).ready(function(){
  
  Morris.Bar  ({
  element: 'line-example',
  data: [
    { y: 'ENE', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'FEB', a: 75,  b: 65, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'MAR', a: 50,  b: 40, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'ABR', a: 75,  b: 65, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'MAY', a: 50,  b: 40, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'JUN', a: 75,  b: 65, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'JUL', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'AGO', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'SEP', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'OCT', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'NOV', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 },
    { y: 'DIC', a: 100, b: 90, c:30,d : 55,e : 63, f : 21 , g :10 }
  ],
  xkey: 'y',
  ykeys: ['a','b','c', 'd','e','f','g'],
  labels: ['Guantes Dielectricos', 'Mantas Dielectricos', 'Calzado Dielectricos', 'Pusta Tierra', 'Escaleras Dielectricos', 'Linears', 'Pertigas' ]
});

 /* Morris.Donut({
  element: 'donut-example',
  data: [
    {label: "Despacho", value: 12},
    {label: "Despacho Norte", value: 30},
    {label: "Servicio Retenido", value: 20},
    {label: "Servicio Cancelado", value: 10},
    {label: "Retenido Norte", value: 5},
    {label: "Servicio Pendiente", value: 7}
  ]
});*/



/*Morris.Area({
  element: 'area-example',
  data: [
    { y: '2006', a: 100, b: 90 },
    { y: '2007', a: 75,  b: 65 },
    { y: '2008', a: 50,  b: 40 },
    { y: '2009', a: 75,  b: 65 },
    { y: '2010', a: 50,  b: 40 },
    { y: '2011', a: 75,  b: 65 },
    { y: '2012', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});*/

    });

</script>

<body>
  <div id="line-example"></div>
  <div id="area-example"></div>
</body>
</html>
