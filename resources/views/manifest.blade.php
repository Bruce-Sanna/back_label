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

        .pagebreak {
            break-after: page !important;
        }

        .notPrintableArea {
            display: none !important;
        }

        .text-xs {
            font-size: 6px !important;
            line-height: 10px !important;
        }

        .text-sm {
            font-size: 7px !important;
            line-height: 12x !important;
        }

        .text-base {
            font-size: 8px !important;
            line-height: 14px !important;
        }

        .text-lg {
            font-size: 9px !important;
            line-height: 15px !important;
        }

        .text-xl {
            font-size: 10px !important;
            line-height: 16px !important;
        }

        .text-2xl {
            font-size: 14px !important;
            line-height: 16px !important;
        }

        .text-3xl {
            font-size: 18px !important;
            line-height: 16px !important;
        }

        /* Table */
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding-inline: 8px;
        }

        /* Custom classes */
        .custom-leading {
            line-height: .75rem /* 12px */ !important;
        }
    </style>
</head>

<body class="!p-0 !m-0">
    {!! $data !!}
<script>
    window.onload = function() {
      // adjustTextSie();
      adjustFontSize();
    };

    function adjustTextSie() {
        const addressContainer = document.querySelector('.addressContainer')
        const addressText = document.getElementById('addressText')

        addressText.style.fontSize = '1rem !important'

        while (addressText.scrollHeight > addressContainer.clientHeight && parseFloat(getComputedStyle(addressText).fontSize) > 0.2) {
            addressText.style.fontSize = (parseFloat(getComputedStyle(addressText).fontSize) - 0.1) + 'px'
        }
    }

    const adjustFontSize = () => {
        const dynamicTextContainer = document.querySelectorAll('.dynamicTextContainer')

        dynamicTextContainer.forEach(function (container) {
            const text = container.querySelector('.dynamicText')

            text.style.fontSize = '10px'

            while (text.scrollHeight > container.clientHeight && parseFloat(getComputedStyle(text).fontSize) > 0.1) {
                text.style.fontSize = (parseFloat(getComputedStyle(text).fontSize) - 0.1) + 'px'
            }
        })
    }
</script>
</body>
</html>