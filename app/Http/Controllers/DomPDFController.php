<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DomPDFController extends Controller
{
    public function index()
    {
        // Label information
        $pdf_name = 'Dymo30252';   
        $extension = '.pdf';
        $width = 8.9;
        $height = 3.2;

        $pages = array(
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 5,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...bai8'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 3,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...bai9'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
                        ],
                                    (object) [
                'quantity' => 10,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba10'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 40,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba40'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'b4z3...ba50'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Skunk'
                    ]
                ]
            ],
            (object) [
                'quantity' => 50,
                'page' => (object) [
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'ID:'
                    ],(object) [ // Product ID
                        'type' => 'text',
                        'font_size' => 7,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(0.5),
                        'content' => 'Holaa'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Qty:'
                    ],
                    (object) [ // Quantity
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => '55'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Loc:'
                    ],
                    (object) [ // Location
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Post Harvest:'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(0.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(1.6),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Brand:'
                    ],
                    (object) [ // Brand
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1),
                        'content' => 'Diamond'
                    ],
                    (object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Stage:'
                    ],
                    (object) [ // stage
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(1.5),
                        'content' => 'Consumer Product'
                    ],(object) [ // Free text
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(4.2),
                        'y' => $this->centimetersToPixels(2.0),
                        'content' => 'Strain:'
                    ],
                        (object) [ // Strain
                        'type' => 'text',
                        'font_size' => 8,
                        'is_bold' => false,
                        'x' => $this->centimetersToPixels(5.6),
                        'y' => $this->centimetersToPixels(2.0),
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
            'width' => $this->centimetersToPixels($width),
            'height' => $this->centimetersToPixels($height),
            'pages' => $full_pages
        ])->render();


        pdf::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

/*         $pdf = Pdf::loadView('label', [
            'width' => $this->centimetersToPixels($width),
            'height' => $this->centimetersToPixels($height),
            'pages' => $full_pages
        ]);

        return $pdf->download('invoice.pdf'); */
    }

    private function centimetersToPixels($centimeters) 
    {
        return round($centimeters * 37.7952755906, 2);
    }
}
