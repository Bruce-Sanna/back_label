<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .pagebreak {
            break-after: page
        }

        .notPrintableArea {
            display: none !important;
        }
    </style>
</head>

<body class="!p-0 !m-0">
    {!! $data !!}
</body>
</html>