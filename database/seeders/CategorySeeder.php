<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryRelation;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Definir datos estáticos
        $data = [
            [
                'name' => 'Agentes de diagnóstico',
                'subcategories' => [
                    [
                        'name' => 'Medios de contraste'
                    ],
                    [
                        'name' => 'Pruebas ciagnósticas'
                    ],
                ],
            ],
            [
                'name' => 'Antigotosos y uricosuricos'
            ],
            [
                'name' => 'Antihistaminicos (anti-h1)'
            ],
            [
                'name' => 'Antiinfecciosos',
                'subcategories' => [
                    [
                        'name' => 'Antimicrobianos',
                        'subcategories' => [
                            [
                                'name' => 'Antibacterianos',
                                'subcategories' => [
                                    ['name' => 'Antibióticos'],
                                    ['name' => 'Antisépticos y acidificantes urinarios'],
                                    ['name' => 'Leprostáticos'],
                                    ['name' => 'Tuberculostáticos'],
                                ],
                            ],
                            [
                                'name' => 'Antimicóticos',
                                'subcategories' => [],
                            ],
                            [
                                'name' => 'Antivirales',
                                'subcategories' => [],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Antiparasitarios',
                        'subcategories' => [
                            [
                                'name' => 'Antiamibianos',
                                'subcategories' => [],
                            ],
                            [
                                'name' => 'Antihelmínticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antihelmínticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antipalúdicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antipalúdicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Tricomonicidas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Tricomonicidas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Medicamentos para tratamiento de toxoplasmosis',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Medicamentos para tratamiento de toxoplasmosis aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ]

                ],
            ],
            [
                'name' => 'Antiinflamatorios',
                'subcategories' => [
                    [
                        'name' => 'Esteroides',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Esteroides aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'No esteroides',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de No esteroides aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Antineoplásicos y tratamiento del cáncer',
                'subcategories' => [
                    [],
                ],
            ],
            [
                'name' => 'Cardiovascular',
                'subcategories' => [
                    [
                        'name' => 'Antianginosos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antianginosos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antiarritmicos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antiarritmicos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antihipertensores',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antihipertensores aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Inotropicos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Inotropicos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Diureticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Diureticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Vasodilatadores periféricos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Vasodilatadores periféricos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Vasopresores',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Vasopresores aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Alteraciones vasculares periféricas',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Alteraciones vasculares periféricas aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Gastrointestinal y Metabolismo',
                'subcategories' => [
                    [
                        'name' => 'Gastrointestinal',
                        'subcategories' => [
                            [
                                'name' => 'Antiacidos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiacidos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antidiarreicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antidiarreicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antieméticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antieméticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Procinéticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Procinéticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiespasmódicos y anticolinérgicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiespasmódicos y anticolinérgicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiflatulentos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiflatulentos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Coleréticos y colagogos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Coleréticos y colagogos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Eméticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Eméticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Enfermedad ácido péptica',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Enfermedad ácido péptica aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Enzimas digestivas y sales biliares',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Enzimas digestivas y sales biliares aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Laxantes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Laxantes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Litolíticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Litolíticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Metabolismo',
                        'subcategories' => [
                            [
                                'name' => 'Hiperglicemiantes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Hiperglicemiantes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antidiabéticos, hipoglicemiantes orales, parenterales e insulinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antidiabéticos, hipoglicemiantes orales, parenterales e insulinas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Hipolipemiantes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Hipolipemiantes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Medicamentos empleados en el tratamiento de la obesidad',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Medicamentos empleados en el tratamiento de la obesidad aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Metabolismo del calcio',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Metabolismo del calcio aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Hormonas y Reguladores Hormonales',
                'subcategories' => [
                    [
                        'name' => 'Hormonas',
                        'subcategories' => [
                            [
                                'name' => 'Andrógenos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Andrógenos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Anticonceptivos hormonales',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Anticonceptivos hormonales aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticosteroides sistémicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticosteroides sistémicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticosteroides tópicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticosteroides tópicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticotrofinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticotrofinas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Estimulantes de la ovulación',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Estimulantes de la ovulación aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Estrógenos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Estrógenos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Gonadotrofinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Gonadotrofinas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Hormona del crecimiento',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Hormona del crecimiento aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Insulinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Insulinas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Progestágenos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Progestágenos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Tiroides y antitiroides',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Tiroides y antitiroides aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Vasopresinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Vasopresinas aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Reguladores Hormonales',
                        'subcategories' => [
                            [
                                'name' => 'Antiandrógenos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiandrógenos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiestrógenos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiestrógenos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Líquidos y Electrolitos',
                'subcategories' => [
                    [
                        'name' => 'Agua estéril',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Agua estéril aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Dextrosa y otros azúcares',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Dextrosa y otros azúcares aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Electrolitos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Electrolitos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Resinas de intercambio iónico',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Resinas de intercambio iónico aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Soluciones para diálisis peritoneal',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Soluciones para diálisis peritoneal aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Órganos de los Sentidos',
                'subcategories' => [
                    [
                        'name' => 'Nariz',
                        'subcategories' => [
                            [
                                'name' => 'Anestésicos locales',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Anestésicos locales aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticosteroides',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticosteroides aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Vasoconstrictores',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Vasoconstrictores aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Oídos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Oídos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Ojos',
                        'subcategories' => [
                            [
                                'name' => 'Anestésicos de superficie',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Anestésicos de superficie aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiinflamatorios',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiinflamatorios aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiinfecciosos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiinfecciosos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antisépticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antisépticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antivirales',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antivirales aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiglaucomatosos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiglaucomatosos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticosteroides',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticosteroides aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Enzimas proteolíticas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Enzimas proteolíticas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Inhibidores de la anhidrasa carbónica',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Inhibidores de la anhidrasa carbónica aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Midriáticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Midriáticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Mióticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Mióticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Lágrimas artificiales y lubricantes oftálmicos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Lágrimas artificiales y lubricantes oftálmicos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Vasoconstrictores',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Vasoconstrictores aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Oxitócicos y Relajantes Uterinos',
                'subcategories' => [
                    [
                        'name' => 'Oxitócicos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Oxitócicos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Relajantes Uterinos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Relajantes Uterinos aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Piel y Mucosas',
                'subcategories' => [
                    [
                        'name' => 'Medicamentos dermatológicos',
                        'subcategories' => [
                            [
                                'name' => 'Anestésicos de superficie',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Anestésicos de superficie aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antibacterianos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antibacterianos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antimicóticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antimicóticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiparasitarios externos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiparasitarios externos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antipruriginosos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antipruriginosos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antisépticos y desinfectantes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antisépticos y desinfectantes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antivirales',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antivirales aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Astringentes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Astringentes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Contrairritantes y rubefacientes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Contrairritantes y rubefacientes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Corticosteroides',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Corticosteroides aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Emolientes, demulcentes y protectores',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Emolientes, demulcentes y protectores aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Enzimas proteolíticas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Enzimas proteolíticas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Modificadores de pigmentos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Modificadores de pigmentos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Queratolíticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Queratolíticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Queratoplásticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Queratoplásticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Varios',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Varios aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mucosa bucofaringea',
                        'subcategories' => [
                            [
                                'name' => 'Dentífricos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Dentífricos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Medicación tópica bucal',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Medicación tópica bucal aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Terapia vaginal',
                        'subcategories' => [
                            [
                                'name' => 'Antimicóticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antimicóticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antiparasitarios',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antiparasitarios aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antisépticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antisépticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Hormonas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Hormonas aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Otros',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Otros aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Radioisótopos',
                'subcategories' => [
                    // Puedes agregar más subcategorías de Radioisótopos aquí si es necesario
                ],
            ],
            [
                'name' => 'Relajantes Musculares',
                'subcategories' => [
                    [
                        'name' => 'De acción central',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Relajantes Musculares de acción central aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'De acción periférica',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Relajantes Musculares de acción periférica aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antagonistas de relajantes musculares de acción periférica',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antagonistas de relajantes musculares de acción periférica aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Respiratorio',
                'subcategories' => [
                    [
                        'name' => 'Antitusígenos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antitusígenos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Broncodilatadores',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Broncodilatadores aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Corticoides',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Corticoides aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Expectorantes',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Expectorantes aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Mucolíticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Mucolíticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Medicación sintomática del resfriado común',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Medicación sintomática del resfriado común aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Sangre',
                'subcategories' => [
                    [
                        'name' => 'Antiagregantes plaquetarios',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antiagregantes plaquetarios aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antianémicos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antianémicos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anticoagulantes y trombolíticos',
                        'subcategories' => [
                            [
                                'name' => 'Anticoagulantes',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Anticoagulantes aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Trombolíticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Trombolíticos aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Coagulantes y hemostáticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Coagulantes y hemostáticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Derivados de la sangre humana',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Derivados de la sangre humana aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Expansores de plasma',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Expansores de plasma aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Factores estimulantes del desarrollo de colonias de células sanguíneas',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Factores estimulantes aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anticoagulantes in-vitro',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Anticoagulantes in-vitro aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Sistema Inmune',
                'subcategories' => [
                    [
                        'name' => 'Vacunas y antitoxinas',
                        'subcategories' => [
                            [
                                'name' => 'Vacunas (antígenos) con capacidad inmunizante activa',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Vacunas con capacidad inmunizante activa aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Antitoxinas',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Antitoxinas aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Gammaglobulinas',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Gammaglobulinas aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Inmunoestimulantes',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Inmunoestimulantes aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Inmunosupresores',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Inmunosupresores aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Sistema Nervioso Central y Periférico',
                'subcategories' => [
                    [
                        'name' => 'Analépticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Analépticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Analgésicos narcóticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Analgésicos narcóticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Analgésicos moderadamente narcóticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Analgésicos moderadamente narcóticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Analgésicos no narcóticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Analgésicos no narcóticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anestésicos generales',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Anestésicos generales aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anestésicos locales',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Anestésicos locales aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antagonistas de los narcóticos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antagonistas de los narcóticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anticinetosicos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Anticinetosicos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Anticonvulsivantes',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Anticonvulsivantes aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antidepresivos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antidepresivos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antijaquecosos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antijaquecosos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antimaniacos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antimaniacos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Antiparkinsonianos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Antiparkinsonianos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Estimulantes',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Estimulantes aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Inhibidores de la colinesterasa',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Inhibidores de la colinesterasa aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Neurolépticos, antipsicóticos o tranquilizantes mayores',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Neurolépticos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Sedantes-hipnóticos y ansiolíticos',
                        'subcategories' => [
                            [
                                'name' => 'Sedantes-hipnóticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Sedantes-hipnóticos aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Ansiolíticos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Ansiolíticos aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Toxicología',
                'subcategories' => [
                    // Puedes agregar más subcategorías de Toxicología aquí si es necesario
                ],
            ],
            [
                'name' => 'Vitaminas y Nutrientes',
                'subcategories' => [
                    [
                        'name' => 'Vitaminas',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Vitaminas aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Minerales y Oligoelementos',
                        'subcategories' => [
                            [
                                'name' => 'Minerales',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Minerales aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Oligoelementos',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Oligoelementos aquí si es necesario
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Requerimientos',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Requerimientos aquí si es necesario
                        ],
                    ],
                    [
                        'name' => 'Definiciones',
                        'subcategories' => [
                            [
                                'name' => 'Suplemento dietético',
                                'subcategories' => [
                                    // Puedes agregar más subcategorías de Suplemento dietético aquí si es necesario
                                ],
                            ],
                            [
                                'name' => 'Preparados vitamínicos',
                                'subcategories' => [
                                    [
                                        'name' => 'Suplementos vitamínicos',
                                        'subcategories' => [
                                            // Puedes agregar más subcategorías de Suplementos vitamínicos aquí si es necesario
                                        ],
                                    ],
                                    [
                                        'name' => 'Suplementos multivitamínicos',
                                        'subcategories' => [
                                            // Puedes agregar más subcategorías de Suplementos multivitamínicos aquí si es necesario
                                        ],
                                    ],
                                    [
                                        'name' => 'Preparados vitamínicos y/o minerales terapéuticos',
                                        'subcategories' => [
                                            // Puedes agregar más subcategorías de Preparados vitamínicos y/o minerales terapéuticos aquí si es necesario
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Otros',
                        'subcategories' => [
                            // Puedes agregar más subcategorías de Otros aquí si es necesario
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Principios activos ventajosamente sustituidos',
                'subcategories' => [
                    // Puedes agregar más subcategorías de Toxicología aquí si es necesario
                ],
            ],
        ];

        // Llamar a la función recursiva para crear categorías y subcategorías
        foreach ($data as $categoryData) {
            $this->createCategoryRecursive(null, $categoryData);
        }
    }

    /**
     * Función recursiva para crear categorías y subcategorías.
     *
     * @param Category|null $parentCategory
     * @param array $data
     * @return void
     */
    private function createCategoryRecursive($parentCategory, $data)
    {
        // Verificar si la clave 'name' está presente en el array
        if (isset($data['name'])) {
            $existingCategory = Category::where('name', $data['name'])->first();

            if ($existingCategory) {
                $category = $existingCategory;
            } else {
                $category = new Category(['name' => $data['name']]);
                $category->save();
            }


            if ($parentCategory !== null) {
                CategoryRelation::create([
                    'parent_id' => $parentCategory->id,
                    'child_id' => $category->id,
                ]);
            }

            // Verificar si la clave 'subcategories' está presente y es un array
            if (isset($data['subcategories']) && is_array($data['subcategories'])) {
                foreach ($data['subcategories'] as $subcategoryData) {
                    $this->createCategoryRecursive($category, $subcategoryData);
                }
            }
        }
    }
}
