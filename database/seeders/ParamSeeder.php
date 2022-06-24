<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Param::create([
            'id' => '3b6070f2-5152-4047-b505-0ea6d187fb41',
            'category' => 'mail_type',
            'param' => 'Permohonan TTD',
        ]);

        Param::create([
            'id' => '414d44e2-01ea-4cd2-83ee-af3ec97afb7a',
            'category' => 'mail_type',
            'param' => 'Laporan & Hal Lainnya',
        ]);

        Param::create([
            'id' => '9a6bec33-9147-4ade-bac8-1e3cde65dd7e',
            'category' => 'mail_nature',
            'param' => 'Segera',
        ]);

        Param::create([
            'id' => '0303d1ac-3dfe-4d28-b855-6e3d6985c76b',
            'category' => 'mail_nature',
            'param' => 'Biasa',
        ]);

        Param::create([
            'id' => 'e252aa18-7b26-4ab8-bb98-fd0ffdb3db3d',
            'category' => 'instruction',
            'param' => 'Untuk diketahui/Dokumentasikan',
        ]);

        Param::create([
            'id' => '47c87050-5e73-43ef-947a-9fac74bb2e24',
            'category' => 'instruction',
            'param' => 'Siapkan Bahan/Data/Sambutan',
        ]);

        Param::create([
            'id' => 'deb82c4f-8218-4e1b-86c3-248ce99ddf5b',
            'category' => 'instruction',
            'param' => 'Mewakili',
        ]);

        Param::create([
            'id' => '918fa273-dfee-4f71-9404-f51462d057b7',
            'category' => 'instruction',
            'param' => 'Telaah/Analisa',
        ]);

        Param::create([
            'id' => '66c9e239-8320-40e7-b6ab-be6811bc4e07',
            'category' => 'instruction',
            'param' => 'Atur',
        ]);

        Param::create([
            'id' => 'da120a00-b4be-4316-846d-13d48e569624',
            'category' => 'instruction',
            'param' => 'Agendakan',
        ]);

        Param::create([
            'id' => '72fbe241-7c8a-4020-9f04-0ead77228fff',
            'category' => 'instruction',
            'param' => 'Laporkan',
        ]);

        Param::create([
            'id' => 'c4d8ce63-664f-439f-8e09-3910ce486c97',
            'category' => 'instruction',
            'param' => 'Pendapat/Saran',
        ]);

        Param::create([
            'id' => '0c23c2c7-690b-48f0-b2f2-2fa4cb38beff',
            'category' => 'instruction',
            'param' => 'Tindak Lanjuti',
        ]);

        Param::create([
            'id' => '114968fa-8bc0-4e7c-985e-3a3ec3072d37',
            'category' => 'instruction',
            'param' => 'Silahkan/Laksanakan',
        ]);

        Param::create([
            'id' => '7d991f9d-fce0-40d4-87a0-153a7461ee8f',
            'category' => 'instruction',
            'param' => 'Pedomani/Ikut Perkembangan',
        ]);

        Param::create([
            'id' => 'f006a716-3094-4809-ba26-9f6efbf07202',
            'category' => 'instruction',
            'param' => 'Koordinasi',
        ]);

        Param::create([
            'id' => '1763fa06-7a28-43ca-862d-539a476f3d2f',
            'category' => 'mail_security',
            'param' => 'Biasa',
        ]);

        Param::create([
            'id' => '30e22ea6-e6bd-454b-88b4-f555f00f1737',
            'category' => 'mail_security',
            'param' => 'Rahasia',
        ]);

        Param::create([
            'id' => '3780ca68-ff4b-4c8f-a300-08bc63ed69bc',
            'category' => 'mail_security',
            'param' => 'Terbatas',
        ]);
    }
}
