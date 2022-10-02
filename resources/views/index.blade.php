<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div style="padding: 20px">
    <h1 class="text-3xl font-bold underline">
        Grafik Lama Pengunjung Mengakses Fitur Kalkulator
    </h1>
</div>
<div style="max-width: 400px; max-height: auto; padding: 20px">
    <div style="height: 400px; margin-top: 20px">
        <canvas id="myChart" width="200" height="200"></canvas>
    </div>
</div>
<script>
    const tmp = {!! json_encode($fix) !!};

    const labels = []
    const data = []

    if (Array.isArray(tmp) && tmp.length) {
        tmp.forEach((dt) => {
            labels.push(dt.name)
            data.push(dt.login_duration)
        })
    }

    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: '# duration login of minutes',
                data,

                borderWidth: 1
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
</script>
</body>
</html>
