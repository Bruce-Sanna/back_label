<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creates first label schema (two columns with text)
        Label::create([
            'name' => 'Dymo30253',
            'width'=> 8.9,
            'height'=> 2.8,
            'label_elements' => "[
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":true,
                    \"x\":0.2,
                    \"y\":0.5,
                    \"font_size\":7,
                    \"text\":\"ID:\"
                },
                {
                    \"element_id\":\"id\",
                    \"name\":\"Product ID\",
                    \"type\":\"text\",
                    \"is_bold\":true,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":0.5,
                    \"font_size\":7
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":1,
                    \"font_size\":8,
                    \"text\":\"Qty:\"
                },
                {
                    \"element_id\":\"quantity\",
                    \"name\":\"Quantity\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Loc:\",
                    \"x\":0.2,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"location.slug\",
                    \"name\":\"Location\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Brand:\",
                    \"x\":0.2,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"brand.slug\",
                    \"name\":\"Brand\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Brand:\",
                    \"x\":4.2,\"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"brand.slug\",
                    \"name\":\"Brand\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":4.2,
                    \"y\":1.5,
                    \"font_size\":8,
                    \"text\":\"Stage:\"
                },
                {
                    \"element_id\":\"stage.slug\",
                    \"name\":\"Stage\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Strain:\",
                    \"x\":4.2,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"strain.slug\",
                    \"name\":\"Strain\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":2,
                    \"font_size\":8
                }]"
        ]);

        // Creates label schema with QR
        Label::create([
            'name' => 'Dymo30252',
            'width'=> 8.9,
            'height'=> 3.2,
            'label_elements' => "[
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":0.5,
                    \"font_size\":7,
                    \"text\":\"ID:\"
                },
                {
                    \"element_id\":\"id\",
                    \"name\":\"Product ID\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":0.5,
                    \"font_size\":7
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":1,
                    \"font_size\":8,
                    \"text\":\"Qty:\"
                },
                {
                    \"element_id\":\"quantity\",
                    \"name\":\"Quantity\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Loc:\",
                    \"x\":0.2,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"strain.slug\",
                    \"name\":\"Strain\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":2.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"qr_code\",
                    \"name\":\"QR Code\",
                    \"type\":\"qr\",
                    \"text\":null,
                    \"x\":6.5,
                    \"y\":0.8,
                    \"size\":1.8
                },
                {
                    \"element_id\":\"location.slug\",
                    \"name\":\"Location\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Strain:\",
                    \"x\":0.2,
                    \"y\":2.5,
                    \"font_size\":8
                }
            ]"
        ]);


        /**
         * 
         * FOR SUPPLIES
         * 
         */

        // Creates label schema with QR for supplies
        Label::create([
            'name' => 'DymoSupplies30252-QR',
            'width'=> 8.9,
            'height'=> 3.2,
            'label_elements' => "[
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":0.5,
                    \"font_size\":7,
                    \"text\":\"ID:\"
                },
                {
                    \"element_id\":\"id\",
                    \"name\":\"Product ID\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,\"y\":0.5,
                    \"font_size\":7
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":1,
                    \"font_size\":8,
                    \"text\":\"Qty:\"
                },
                {
                    \"element_id\":\"quantity\",
                    \"name\":\"Quantity\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Location:\",
                    \"x\":0.2,
                    \"y\":1.5,\"font_size\":8
                },
                {
                    \"element_id\":\"category.slug\",
                    \"name\":\"Category\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":2.5,\"font_size\":8
                },
                {
                    \"element_id\":\"qr_code\",
                    \"name\":\"QR Code\",
                    \"type\":\"qr\",
                    \"text\":null,
                    \"x\":6.5,
                    \"y\":0.5,
                    \"size\":1.8
                },
                {
                    \"element_id\":\"location.slug\",
                    \"name\":\"Location\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1.5,\"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Category:\",
                    \"x\":0.2,
                    \"y\":2.5,
                    \"font_size\":8
                }
            ]"
        ]);

        // Creates first label schema (two columns with text)
        Label::create([
            'name' => 'DymoSupplies30253',
            'width'=> 8.9,
            'height'=> 2.8,
            'label_elements' => "[
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":true,
                    \"x\":0.2,
                    \"y\":0.5,
                    \"font_size\":7,
                    \"text\":\"ID:\"
                },
                {
                    \"element_id\":\"id\",
                    \"name\":\"Product ID\",
                    \"type\":\"text\",
                    \"is_bold\":true,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":0.5,
                    \"font_size\":7
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":0.2,
                    \"y\":1,
                    \"font_size\":8,\"text\":\"Qty:\"
                },
                {
                    \"element_id\":\"quantity\",
                    \"name\":\"Quantity\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Loc:\",
                    \"x\":0.2,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"location.slug\",
                    \"name\":\"Location\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Name:\",
                    \"x\":0.2,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"name\",
                    \"name\":\"Name\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":1.6,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Created:\",
                    \"x\":4.2,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"created_at\",
                    \"name\":\"Created at\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":1,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"x\":4.2,
                    \"y\":1.5,
                    \"font_size\":8,
                    \"text\":\"Measure:\"
                },
                {
                    \"element_id\":\"measure.slug\",
                    \"name\":\"Unit of measure\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":1.5,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"free_text\",
                    \"name\":\"Free text\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":\"Category:\",
                    \"x\":4.2,
                    \"y\":2,
                    \"font_size\":8
                },
                {
                    \"element_id\":\"category.slug\",
                    \"name\":\"Category\",
                    \"type\":\"text\",
                    \"is_bold\":false,
                    \"text\":null,
                    \"x\":5.6,
                    \"y\":2,
                    \"font_size\":8
                }
            ]"
        ]);
    }
}
