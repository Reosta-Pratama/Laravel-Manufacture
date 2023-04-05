<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Joni',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        DB::table('products')->insert([
            [
                'foto' => 'assets/img/products/productImage-1.png',
                'nama' => 'NC Total Tooling System',
                'kategori' => 'NIKKEN',
                'deskripsi' => 'Nikken has been developing and manufacturing Tooling Systems for over 50 years. Nikken offers a wide lineup of high-rigidity and high-accuracy products that can handle all kinds of machining applications, including a milling chuck series, a collet chuck series, a tool holder series with dampening mechanisms, and boring systems. You can also use streamline tooling equipment, such as angular heads and high speed spindle speeders, to maximize the capacity of your existing machine tools.',
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            
            [
                'foto' => 'assets/img/products/productImage-2.png',
                'nama' => 'CNC Rotary Table Series',
                'kategori' => 'NIKKEN',
                'deskripsi' => 'CNC type series (φ100-φ1600) and 5AX type series (φ100-φ1200) rotary tables are available.
                A special alloy steel worm screw with excellent shock resistance is adopted for small-size rotary tables to extend their service life and realize high cost effectiveness.
                On the other hand, the extremely rigid and high-speed rotation-capable carbide worm screw is adopted for large-size rotary tables to withstand severe usage and maintain its accuracy almost permanently.
                Nikken Carbide Worm Screw Systems have world-class durability, accuracy, and rigidity.'
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            
            [
                'foto' => 'assets/img/products/productImage-3.png',
                'nama' => 'Reamer Series',
                'kategori' => 'NIKKEN',
                'deskripsi' => 'Nikken offers PF (press fit type) Radical Reamers; DLC (diamond-like-carbon) Coated Reamers; Carbide Reamer Series products such as Carbide Mill Reamers and Carbide Broach Reamers; and HSS Reamer Series products such as NC Sensor Reamers, Tough-cut Skill Reamers, and Broach Reamers. In addition to the above lineups, Nikken has standardized reamers used for difficult-to-cut materials and those dedicated for cutting aluminum and non-ferrous metals.Nikken Reamer Series can be used for all types of machining materials, and achieve a long life and a highly accurate finish.'
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            
            [
                'foto' => 'assets/img/products/productImage-4.png',
                'nama' => 'Conventional Tooling System',
                'kategori' => 'NIKKEN',
                'deskripsi' => 'Nikken offers a wide lineup of highly accurate Conventional Tooling Systems that can fit with all kinds of cutting tools used for milling to drilling and tapping.', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-5.png',
                'nama' => 'Tool Presetter',
                'kategori' => 'NIKKEN',
                'deskripsi' => '"elbo NIKKEN" tool presetters with rich lineup for choice of applications.', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-6.png',
                'nama' => 'Files',
                'kategori' => 'PFERD',
                'deskripsi' => 'Files for the workshop', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-7.webp',
                'nama' => 'Milling Tools',
                'kategori' => 'PFERD',
                'deskripsi' => 'Milling Tools for the workshop', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-8.webp',
                'nama' => 'Fine grinding and polishing tools',
                'kategori' => 'PFERD',
                'deskripsi' => 'Fine grinding and polishing tools for the workshop', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-9.png',
                'nama' => 'Mounted points',
                'kategori' => 'PFERD',
                'deskripsi' => 'Mounted points for the workshop', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-10.png',
                'nama' => 'Diamond and CBN tools',
                'kategori' => 'PFERD',
                'deskripsi' => 'Diamond and CBN tools for the workshop', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-11.png',
                'nama' => 'Cut-off wheels, flap discs and grinding wheels',
                'kategori' => 'PFERD',
                'deskripsi' => 'Cut-off wheels, flap discs and grinding wheels', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-12.jpg',
                'nama' => 'DRIVERS',
                'kategori' => 'SHINANO',
                'deskripsi' => 'DRIVERS', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-13.jpg',
                'nama' => 'RATCHET WRENCHES ',
                'kategori' => 'SHINANO',
                'deskripsi' => 'RATCHET WRENCHES ', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-14.jpg',
                'nama' => 'IMPACT WRENCHES ',
                'kategori' => 'SHINANO',
                'deskripsi' => 'IMPACT WRENCHES ', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-15.jpg',
                'nama' => 'GRINDERS ',
                'kategori' => 'SHINANO',
                'deskripsi' => 'GRINDERS ', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-16.jpg',
                'nama' => 'POLISHERS ',
                'kategori' => 'SHINANO',
                'deskripsi' => 'POLISHERS ', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],

            [
                'foto' => 'assets/img/products/productImage-17.jpg',
                'nama' => 'SANDERS ',
                'kategori' => 'SHINANO',
                'deskripsi' => 'SANDERS ', 
                // 'dekripsiTambahan' => '',
                // 'berat' => '',
                // 'ukuran' => '',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
        ]);

        DB::table('project_contructions')->insert([
            [
                'foto' => 'assets/img/project/project-1.webp',
                'nama' => 'DIESEL TANK 4000 KL',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-2.webp',
                'nama' => 'MAINTENANCE TRAINING',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-3.webp',
                'nama' => 'MAINTENANCE TRAINING',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-4.webp',
                'nama' => 'DIESEL TANK 4000 KL',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-5.webp',
                'nama' => 'DIESEL TANK 4000 KL',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-6.webp',
                'nama' => 'JACK SCREW',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-7.webp',
                'nama' => 'PARAFET CONCRETE',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-8.webp',
                'nama' => 'PARAFET CONCRETE',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-9.webp',
                'nama' => 'CORRUGATED DUCTING',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
            [
                'foto' => 'assets/img/project/project-10.webp',
                'nama' => 'CASTING PRODUCT',
                'kategori' => 'Belom Ada',
                'deskripsi' => 'Belom Ada',
                // 'fotoTambahan1' => '',
                // 'fotoTambahan2' => '',
                // 'fotoTambahan3' => ''
            ],
        ]);
    }
}
