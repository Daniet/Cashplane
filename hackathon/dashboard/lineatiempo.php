<style type="text/css">
svg { border: 1px solid #dedede; }

.axis path, .axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.area { fill: #4ca3bd; }

</style>


<?php


$conn = mysqli_connect('localhost','andmarod_hackt','hackathon','andmarod_hackathon');
mysqli_query($conn, 'SET SQL_BIG_SELECTS=1');
//$query_status_atm = "SELECT A.GOM, CAST(A.DIAS AS SIGNED) DIA, A.Total, B.tiempo FROM `TOTAL_GOM_TV` as A LEFT JOIN (SELECT gom, max(fecha_server), DATEDIFF(CURDATE(),fecha_server)as tiempo from reg_actua_estados where estado_actualiza = '4' group by gom) as B on  A.GOM=B.gom where DESC_ESTADO = 'CERRADO' ORDER BY DIA DESC";
$query_status_atm = "SELECT * FROM ESTADO_ACTUAL_CAJERO";

$status_atm = mysqli_query($conn,$query_status_atm);

?>

<?php while($row = mysqli_fetch_array($status_atm)){ ?>

<?php } ?>

<svg id="area" />


<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

var margin = {top: 20, right: 20, bottom: 40, left: 50},
    width = 575 - margin.left - margin.right,
    height = 350 - margin.top - margin.bottom;

var data = [
    { x: 0, y: 10, },
    { x: 1, y: 15, },
    { x: 2, y: 35, },
    { x: 3, y: 20, },
];

var x = d3.scale.linear()
    .domain([0, d3.max(data, function(d) { return d.x; })])
    .range([0, width]);

var y = d3.scale.linear()
    .domain([0, d3.max(data, function(d) { return d.y; })])
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

    var area = d3.svg.area()
    .x(function(d) { return x(d.x); })
    .y0(height)
    .y1(function(d) { return y(d.y); });

    var svg = d3.select("svg#area")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

svg.append("path")
    .datum(data)
    .attr("class", "area")
    .attr("d", area);

svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")
    .call(xAxis);

svg.append("g")
    .attr("class", "y axis")
    .call(yAxis);

</script>
