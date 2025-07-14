<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>List of Artists</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .centrar{
            text-align: center;
        }
    </style>
</head>

<body>


    <h2 class="centrar">Listado de Plantas</h2>

    <table>
        <thead>
            <tr>
                <th>id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artist as $art)
                <tr>
                    <td>{{ $art->id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
