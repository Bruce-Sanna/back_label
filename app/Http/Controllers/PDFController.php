<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class PDFController extends Controller
{
    public function pdf() 
    {
        // Label information
        $pdf_name = 'Test-pdf';   
        $extension = '.pdf';
        $width = 30;
        $height = 30;


        $pages = array([
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ]);

        $html = view('label')->with([
            'width' => centimetersToPixels($width),
            'height' => centimetersToPixels($height),
            'pages' => $pages
        ])->render();

        // Creating the local label folder
        if(!Storage::exists('labels')) {
            Storage::makeDirectory('labels'); 
        }

        $save_to_file = storage_path('app/labels/'.$pdf_name.$extension);



        // Creating the public label folder
        /*         if(!Storage::exists('public/labels')) {
            Storage::makeDirectory('public/labels'); 
        }
        */
        // To save in public directory
        // $save_to_file = storage_path('app/public/labels/'.$pdf_name.$extension);

        Browsershot::html($html)
            ->showBackground()
            ->paperSize($width, $height, 'cm')
            ->save($save_to_file);

        // Retrieves file from local folder
        return $this->download_local(($pdf_name.$extension));

        // Retrieves file from pubic folder
        // return $this->download_public(($pdf_name.$extension));

        return 'no';
    }

    public function label()
    {
        $width = 30;
        $height = 30;

        $pages = array([
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ],
        [
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ],
        [
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ],
        [
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ],
        [
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 0,
                'content' => 'Hola, este es un QR!'
                ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 10,
                'y' => 10,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 0,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'qr',
                'size' => 10,
                'x' => 20,
                'y' => 20,
                'content' => 'Make me into a QrCode!'
            ],
            (object) [
                'type' => 'text',
                'x' => 0,
                'y' => 10,
                'is_bold' => false,
                'content' => 'Este es un texto de pruebaaaaaaaaAa',
                'size' => 15
            ],
            (object) [
                'type' => 'text',
                'x' => 20,
                'y' => 15.5,
                'content' => 'Holaa!!',
                'is_bold' => true,
                'size' => 15
            ],
            
        ]);
        
        return view('label', [
            'width' => centimetersToPixels($width),
            'height' => centimetersToPixels($height),
            'pages' => $pages
        ]);
    }

    public function schema_example()
    {
        $pages = array(
            (object) [
                'quantity' => 1,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai1'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai2'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai3'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 5,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 3,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai9'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
                        ],
                                    (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 40,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba40'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'Holaa'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'Ultimo'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
        ); 

        return $pages;
    }

    public function schema() 
    {
        // Label information
        $pdf_name = 'Dymo30252';   
        $extension = '.pdf';
        $width = 8.9;
        $height = 2.8;

        /* 
        | Label elements
        */
        // This array contains 128 pages of 5 diferents products
        $pages = array(
            (object) [
                'quantity' => 1,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai1'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai2'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai3'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 5,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 3,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...bai9'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
                        ],
                                    (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 40,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba40'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'Holaa'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 2,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 0.5,
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'size' => 7,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 0.5,
                        'content' => 'Ultimo'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1,
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1,
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 1.5,
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 1.5,
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 0.2,
                        'y' => 2.0,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 1.6,
                        'y' => 2.0,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1,
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1,
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 1.5,
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 1.5,
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 4.2,
                        'y' => 2.0,
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'size' => 8,
                        'is_bold' => false,
                        'x' => 5.6,
                        'y' => 2.0,
                        'content' => 'Skunk'
                    ]
                ]
            ],
        ); 

        $full_pages = [];

        foreach($pages as $page) {
            for($i = 0;$i < $page->quantity; $i++) {
                array_push($full_pages, $page->page);
            }
        }


        $html = view('label')->with([
            'width' => $this->centimetersToMillimeters($width),
            'height' => $this->centimetersToMillimeters($height)+0.5,
            'pages' => $full_pages
        ])->render();

        // Creating the local label folder
        if(!Storage::exists('labels')) {
            Storage::makeDirectory('labels'); 
        }

        // To save in local directory
        $save_to_file = storage_path('app/labels/'.$pdf_name.$extension);

        Browsershot::html($html)
            ->showBackground()
            ->paperSize($this->centimetersToMillimeters($width), $this->centimetersToMillimeters($height))
            ->pages($this->setPagesToPrint(count($full_pages)))
            ->save($save_to_file);

        // Retrieves file from local folder
        return $this->download_local(($pdf_name.$extension));

        // Retrieves file from pubic folder
        // return $this->download_public(($pdf_name.$extension));

        return 'no';
    }

    public function schema_two()
    {
        {
            // Label information
            $pdf_name = 'Dymo30252';   
            $extension = '.pdf';
            $width = 8.9;
            $height = 3.2;
                        
            /* 
            | Label elements
            */
            $pages = array(
                (object) [
                    'quantity' => 10,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'b4z3...bai8'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest'
                        ],
                        (object) [ // QR
                            'type' => 'qr',
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ], 
                (object) [
                    'quantity' => 15,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'b4z3...bai8'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest II'
                        ],
                        (object) [ // Free text
                            'type' => 'qr',
                            'size' => 8,
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ],
                (object) [
                    'quantity' => 30,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'b4z3...bad30'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest'
                        ],
                        (object) [ // Free text
                            'type' => 'qr',
                            'size' => 8,
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ],
                (object) [
                    'quantity' => 40,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'b4z3...bai8'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest'
                        ],
                        (object) [ // Free text
                            'type' => 'qr',
                            'size' => 8,
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ],
                (object) [
                    'quantity' => 20,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'b4z3...bai8'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest'
                        ],
                        (object) [ // Free text
                            'type' => 'qr',
                            'size' => 8,
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ],
                (object) [
                    'quantity' => 6,
                    'page' => (object) [
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 0.5,
                            'content' => 'ID:'
                        ],(object) [ // Product ID
                            'type' => 'text',
                            'size' => 7,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 0.5,
                            'content' => 'Ultimos6'
                        ],(object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1,
                            'content' => 'Qty:'
                        ],
                        (object) [ // Quantity
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1,
                            'content' => '55'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 1.5,
                            'content' => 'Loc:'
                        ],
                        (object) [ // Location
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 2.5,
                            'content' => 'Post Harvest'
                        ],
                        (object) [ // Free text
                            'type' => 'qr',
                            'size' => 8,
                            'is_bold' => false,
                            'size' => 1.8,
                            'x' => 6.5,
                            'y' => 0.8,
                            'content' => 'http://localhost:5174/inventory/action/618ef535-3bf3-405c-9079-d6d7e216b860'
                        ],
                        (object) [ // Brand
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 1.6,
                            'y' => 1.5,
                            'content' => 'Location'
                        ],
                        (object) [ // Free text
                            'type' => 'text',
                            'size' => 8,
                            'is_bold' => false,
                            'x' => 0.2,
                            'y' => 2.5,
                            'content' => 'Strain'
                        ]
                    ]
                ],
            ); 
    
            $full_pages = [];
    
            foreach($pages as $page) {
                for($i = 0; $i < $page->quantity; $i++) {
                    array_push($full_pages, $page->page);
                }
            }
            
            
            $html = view('label_two')->with([
                'width' => $this->centimetersToMillimeters($width),
                'height' => $this->centimetersToMillimeters($height)+0.5,
                'pages' => $full_pages
            ])->render();

            return $html;

            // Creating the local label folder
            if(!Storage::exists('labels')) {
                Storage::makeDirectory('labels'); 
            }
    
            // To save in local directory
            $save_to_file = storage_path('app/labels/'.$pdf_name.$extension);
    
            Browsershot::html($html)
                ->showBackground()
                ->paperSize(centimetersToPixels($width), centimetersToPixels($height), 'px')
                ->pages($this->setPagesToPrint(count($full_pages)))
                ->save($save_to_file);
    
            // Retrieves file from local folder
            return $this->download_local(($pdf_name.$extension));
    
            // Retrieves file from pubic folder
            // return $this->download_public(($pdf_name.$extension));
    
        }
    }

    private function setPagesToPrint($number)
    {
        $numbers = [];

        for($i = 1;$i <= $number*2; $i++) {
            if($i%2 !== 0) {
                array_push($numbers, $i);
            }
        }

        return implode(', ',$numbers);
    }

    private function centimetersToMillimeters($centimeter)
    {
        return $centimeter * 10;
    }

    private function centimetersToInches($centimeters)
    {
        return bcdiv($centimeters * 0.3937,1,2);
    }

    private function inchesToPixels($inches)
    {
        return (int)($inches * 96);
    }

    private function download_local($pdf) 
    {
        if(Storage::disk('local')->exists('labels/'.$pdf)){
            return Storage::disk('local')->download('labels/'.$pdf);
        }
    }

    private function download_public($pdf) {
        if(Storage::disk('public')->exists('labels/'.$pdf)){
            return Storage::disk('public')->download('labels/'.$pdf);
        }
    }
}