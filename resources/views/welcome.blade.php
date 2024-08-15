<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rate Comparator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Exchange Rates</h1>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>Currency</th>
            <th>Rate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rates as $rate)
            <tr>
                <td>{{ $rate->currency }}</td>
                <td>{{ $rate->rate }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">Cheapest Rate</h2>
    @foreach($cheapestRates as $rate)
        <p>{{ $rate->currency }}: {{ $rate->rate }}</p>
    @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
