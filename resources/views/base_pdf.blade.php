<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* Defines the family and the default font size of the PDF */
        body {  
            font-family: 'Inter', sans-serif;
            font-size: 11px;
        }

        h2 {
            font-size: 14px !important;
        }

        .text-sm {
            font-size: 10px !important;
        }

        .custom-text-size {
            font-size: 14px !important;
        }

        .pagebreak {
            break-after: page
        }

        .notPrintableArea {
            display: none !important;
        }

        .mt-4 {
            margin-top: 0 !important;
        }

        .mt-2 {
            margin-top: 0 !important;
        }

        .mt-3 {
            margin-top: 0 !important;
        }

        .p-4 {
            padding: 2px !important;
        }

        .py-6 {
            padding: 0 !important;
        }

        .py-4 {
            padding: 0 !important;
        }

        /* Used in width of Icon Product */
        .w-10 {
            width: 20px !important;
        }

        /* Used in logo */
        .logo-class {
            width: 25px !important;
            height: 25px !important;
        }

        .leading-6 {
            line-height: 13px !important; /* 20px */
        }
    </style>
</head>

<body class="!p-0 !m-0">
    {!! $data !!}
</body>
</html>