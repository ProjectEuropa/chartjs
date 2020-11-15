<canvas id="myChart"></canvas>
<script>

var date_legend =<?php echo $js_date_legend ?>;
var xs = Object.keys(date_legend);

var js_user_count =<?php echo $treated_datas[0] ?>;
var js_user_family_count =<?php echo $treated_datas[1] ?>;
var js_staff_count =<?php echo $treated_datas[2] ?>;
var js_staff_family_count =<?php echo $treated_datas[3] ?>;
var user_count = Object.values(js_user_count);
var user_family_count = Object.values(js_user_family_count);
var staff_count = Object.values(js_staff_count);
var staff_family_count = Object.values(js_staff_family_count);

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: xs,
        datasets: [{
            label: '入居者',
            data: user_count,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            fill: false,
            lineTension: 0,
        },{
            label: '入居者同居人',
            data: user_family_count,
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1,
            fill: false,
            lineTension: 0
        },{
            label: 'スタッフ',
            data: staff_count,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false,
            lineTension: 0
        },{
            label: 'スタッフ同居人',
            data: staff_family_count,
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            fill: false,
            lineTension: 0
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    suggestedMax: 1
                }
            }]
        }
    }
});
</script>