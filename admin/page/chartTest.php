<div id="chart-container">
    <canvas id="graphCanvas">

    </canvas>
</div>
halo

<script src="../assets/js/jquery.js"></script>
<script>
    $(document).ready(function() {
        showGraph();
    });

    function showGraph() {
        {
            $.post("bar_encode.php",
                (data) => {
                    console.log(data);
                    var id = [];
                    var jual = [];
                    for (var i in data) {
                        id.push(data[i].tgl_berangkat);
                        jual.push(data[i].jmltransaksi);

                    }
                    // var chartdata = {
                    //     labels: id,
                    //     datasets: [{
                    //         label: 'Id User',
                    //         backgroundColor: '#49e2ff',
                    //         borderColor: '#46d5f1',
                    //         hoverBackgroundColor: '#CCC',
                    //         hoverBorderColor: '#666',
                    //         data: jual
                    //     }]


                    // };

                    // const labels = Utils.months({
                    //     count: 7
                    // });
                    const linedata = {
                        labels: id,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: jual,
                            fill: true,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    };
                    // </block:setup>

                    // <block:config:0>

                    // </block:config>


                    var graphTarget = $("#graphCanvas");
                    const config = new Chart(graphTarget, {
                        type: 'line',
                        data: linedata,
                    });
                    // var barGraph = new Chart(graphTarget, {
                    //     type: 'bar',
                    //     data: chartdata
                    // });

                });
        }
    }
</script>