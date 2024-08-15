<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rate Comparator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .currency-table th, .currency-table td {
            text-align: center;
        }
        .cheapest-rate {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Exchange Rates</h1>
    <table class="table table-bordered table-striped currency-table mt-4">
        <thead class="thead-dark">
        <tr>
            <th>Currency</th>
            <th>Rate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rates as $currency => $rate)
            <tr>
                <td>{{ $rate->currency }}</td>
                <td>{{ number_format($rate->rate, 3) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
