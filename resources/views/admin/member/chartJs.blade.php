@extends("admin.app")
@section("title","會員數具")
@section("content")
    <div class="container my-4">
        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div class="card h-100">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var mychart;

        $(function() {
            const ctx = document.getElementById('myChart');
            mychart = new Chart(ctx, {
                type: 'bar',  // 或 'line'
                data: {
                    labels: [],
                    datasets: [{
                        label: '會員等級數據',
                        data: [],
                        borderWidth: 1,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            $.ajax({
                type: "get",
                url: "/admin/chartJs/getList", // 确保这里是正确的 URL
                success: function(data) {
                    showdata_chart_level(data);
                    
                },
                error: function() {
                    alert("Error fetching data from /admin/chartJs/getList");
                }
            });
        });

        function showdata_chart_level(data) {
            mychart.data.labels = [];
            mychart.data.datasets[0].data = [];

            data.forEach(function(item) {
                let mylevel = item.level == 10 ? "一般會員" : "金牌員";
                mychart.data.labels.push(mylevel);
                mychart.data.datasets[0].data.push(item.prmcount);
            });

            mychart.update();
        }
    </script>
@endsection
