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
    </style>
</head>

<body class="!p-0 !m-0">
    @foreach ($pages as $page)
        <div style="width: {{$width}}px; height: {{$height}}px" class="relative border !p-0 !m-0 ">
            @foreach ($page as $element)
                @if ($element['type'] === 'qr')
                    <div class="absolute top-[{{ centimetersToPixels($element['y'])  }}px] left-[{{ centimetersToPixels($element['x']) }}px]">
                        {!! QrCode::size(centimetersToPixels($element['size']))->generate(isset($element['content']) ? $element['content'] : ''); !!}
                    </div>
                @endif
    
                @if ($element['type'] === 'text')
                    <div 
                        class="absolute !p-0 !m-0 top-[{{ centimetersToPixels($element['y']) }}px] left-[{{ centimetersToPixels($element['x']) }}px] {{ isset($element['is_bold']) && $element['is_bold'] ? 'font-bold' : '' }}" 
                        style="font-size: {{ $element['size'] }}pt">
                        {{ isset($element['content']) ? $element['content'] : '-' }}
                    </div>
                @endif
            @endforeach
        </div>

        <div class="pagebreak"> </div>
    @endforeach
</body>
</html>