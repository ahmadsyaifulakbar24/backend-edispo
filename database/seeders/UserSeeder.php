<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = 12345678;
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'position_name' => 'admin',
            'role' => 'admin',
            'active' => '1',
            'password' => Hash::make($password),
        ]);

        User::create( [
            'id'=>'0060a66c-ebb2-4fa2-9317-548229394ad7',
            'name'=>'Staff Khusus Asdep Pembiayaan dan Penjaminan Perkoperasian',
            'username'=>'stafsus_asdep12',
            'position_name'=>'Staff Khusus Asdep 1.2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'0112b0ea-81d7-46da-875f-89666d7293ce',
            'name'=>'Staff Khusus Sesdep Deputi Kewirausahaan',
            'username'=>'stafsus_sesdep4',
            'position_name'=>'Staff Khusus Sesdep. 4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'023d7af1-399b-48d1-ac89-ea4e4f8bc734',
            'name'=>'Sutarmo',
            'username'=>'user_sutarmo',
            'position_name'=>'Asdep Pengembangan Rantai Pasok Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'04689c75-a8f7-4d2f-979b-bdee3682a529',
            'name'=>'Staff Khusus Sesdep Usaha Kecil dan Menengah',
            'username'=>'stafsus_sesdep3',
            'position_name'=>'Staff Khusus Sesdep. 3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'04746798-88ae-495d-8cdf-1fd32fad47de',
            'name'=>'Fiki C. Satari',
            'username'=>'user_skm_fiki',
            'position_name'=>'Staf Khusus Menteri (Fiki  C. Satari)',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'0755a970-af75-4a85-9c10-0f48d5d6e866',
            'name'=>'Rulli Nuryanto',
            'username'=>'user_rullinur',
            'position_name'=>'Staf Ahli Bidang Ekonomi Makro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'083187b4-98cd-4151-b468-1fb87d1976e4',
            'name'=>'Staff Khusus Biro Hukum & Kerja Sama',
            'username'=>'stafsus_sm2',
            'position_name'=>'Staff Khusus SM. 2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'0ad255d4-2445-4f16-b7f7-38cf681691c6',
            'name'=>'Staff Khusus Asdep Pengembangan Rantai Pasok Usaha Mikro',
            'username'=>'stafsus_asdep23',
            'position_name'=>'Staff Khusus Asdep 2.3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'12c261cb-bdd8-45b4-bfd8-b54432d7b630',
            'name'=>'Destri Anna Sari',
            'username'=>'user_destrian',
            'position_name'=>'Asdep Konsultasi Bisnis dan Pendampingan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'1411b932-bd6d-4054-9897-191b7fdad926',
            'name'=>'Cristina Agustin',
            'username'=>'user_cristina',
            'position_name'=>'Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'198ab359-7933-4d17-9952-5b031a5a6ae4',
            'name'=>'Staff Khusus Asdep Pengembangan dan Pembaruan Perkoperasian',
            'username'=>'stafsus_asdep11',
            'position_name'=>'Staff Khusus Asdep 1.1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'20f36e29-0d1e-462e-b5b0-7f50fd71ddb9',
            'name'=>'Ahmad Zabadi',
            'username'=>'user_zabadi',
            'position_name'=>'Deputi Bidang Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'233c4f6a-15d4-48cc-bac1-5a8f6654092c',
            'name'=>'Staff Khusus Asdep Konsultasi Bisnis dan Pendampingan',
            'username'=>'stafsus_asdep41',
            'position_name'=>'Staff Khusus Asdep 4.1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'347ad211-5073-4b84-836b-3c1767a9afa4',
            'name'=>'Staff Khusus Asdep Pembiayaan Usaha Mikro',
            'username'=>'stafsus_asdep21',
            'position_name'=>'Staff Khusus Asdep 2.1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'3920a47e-54a1-409f-8324-4c361619e1bc',
            'name'=>'Staff Menteri',
            'username'=>'staff_menteri',
            'position_name'=>'Staff Menteri',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'3f09b8f4-7ba7-4480-b1c5-bd2d7fb6f8e0',
            'name'=>'Ir. Siti Azizah',
            'username'=>'user_sitiazizah',
            'position_name'=>'Deputi Bidang Kewirausahaan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'4047461e-d4cb-4c4d-acdc-feb5c50e81cf',
            'name'=>'Staff Khusus Sekretaris Menteri',
            'username'=>'staff_sm',
            'position_name'=>'Staff Khusus SM',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'443dca98-f074-4950-b076-4ee6446a6fcb',
            'name'=>'Staff Khusus Asdep Fasilitasi Hukum dan Konsultasi Usaha',
            'username'=>'stafsus_asdep25',
            'position_name'=>'Staff Khusus Asdep 2.5',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'4758febb-0f9f-4825-8706-f3303c9c1163',
            'name'=>'Tata Usaha Dep. Perkoperasian',
            'username'=>'user_tu_dep1',
            'position_name'=>'TU Deputi Bidang Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'4840cd58-39cf-4d61-a046-3b70fe159c6c',
            'name'=>'Kabag Umum Dep. Kewirausahaan',
            'username'=>'user_kabum_dep4',
            'position_name'=>'Kabag Umum Deputi Bidang Kewirausahaan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'48cc47fd-5b8c-434b-b286-cef0542fcc3a',
            'name'=>'Ir. Irene Swa Suryani',
            'username'=>'user_ireneswa',
            'position_name'=>'Asdep Pembiayaan Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'48ff0dbc-fd54-4703-9e64-5c4fc25781f2',
            'name'=>'Kabag Umum Dep. Usaha Mikro',
            'username'=>'user_kabum_dep2',
            'position_name'=>'Kabag Umum Deputi Bidang Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'492d6451-c4d7-4006-99c6-895e6817ec3d',
            'name'=>'Ari Anindya Hartika',
            'username'=>'user_arianin',
            'position_name'=>'Asdep Pengembangan Kawasan dan Rantai Pasok',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'4b8b3d1b-47b7-470c-83e6-3ede7acb1173',
            'name'=>'Staff Khusus Asdep Pengembangan Kapasitas Usaha Mikro',
            'username'=>'stafsus_asdep24',
            'position_name'=>'Staff Khusus Asdep 2.4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'4f3ccce6-dfbf-432f-a7bd-882249507c71',
            'name'=>'Drs. Supomo Ak',
            'username'=>'user_supomo',
            'position_name'=>'Dirut LPDB KUMKM',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'55e327e8-a20c-405a-be22-e4bf50970b05',
            'name'=>'Tata Usaha Dep. Kewirausahaan',
            'username'=>'user_tu_dep4',
            'position_name'=>'TU Deputi Bidang Kewirausahaan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'5c5e5b4f-e4bd-4ca7-bdc4-fc135ea96a18',
            'name'=>'Kabag Perencanaan Dep. Usaha Kecil dan Menengah',
            'username'=>'user_kabperen_dep3',
            'position_name'=>'Kabag Perencanaan Deputi Bidang Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'5de0f2fd-9f5a-4de2-b35c-b6db0be47251',
            'name'=>'Elly Muchtoria',
            'username'=>'user_ellymu',
            'position_name'=>'Kepala Biro Umum dan Keuangan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'5f906e6a-9ddc-4e28-911d-81273d158225',
            'name'=>'Staff Khusus Asdep Pengembangan SDM',
            'username'=>'stafsus_asdep14',
            'position_name'=>'Staff Khusus Asdep 1.4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'6269885a-757a-4e54-b5be-1d2ec9b704fb',
            'name'=>'Staff Khusus Inspektur',
            'username'=>'stafsus_ins',
            'position_name'=>'Staff Khusus Inspektur',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'646f1ab3-81c3-49d6-b854-250aa8005249',
            'name'=>'Ir. Bastian',
            'username'=>'user_bastian',
            'position_name'=>'Kepala Biro Manajemen Kinerja, Organisasi, dan SDM Aparatur',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'648c69cf-1419-4176-baa9-a9d829f2ab1b',
            'name'=>'Ir. Devi Rimayanti',
            'username'=>'user_devirima',
            'position_name'=>'Sekretaris Deputi Bidang Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'64ed874f-3494-4b95-82c0-a73280834b07',
            'name'=>'Eviyanti',
            'username'=>'user_eviyanti',
            'position_name'=>'Asdep Fasilitasi Hukum dan Konsultasi Usaha',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'65a189b9-b2d1-4a30-b146-4c4831a4e46d',
            'name'=>'Bagus Rachman',
            'username'=>'user_bagusrach',
            'position_name'=>'Asdep Pengembangan dan Pembaruan Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'67c1da31-19f4-4b6f-83c0-7e7acfc3701b',
            'name'=>'Staff Khusus Asdep Pengembangan SDM Usaha Kecil dan Menengah',
            'username'=>'stafsus_asdep32',
            'position_name'=>'Staff Khusus Asdep 3.2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'6c344e10-59b0-41e1-a312-8cac3aefcfb0',
            'name'=>'Rahmadi',
            'username'=>'user_rahmadi',
            'position_name'=>'Asdep Perlindungan dan Kemudahan Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'6ee0ece7-a3b1-4c0e-bf93-5862f52ff9d7',
            'name'=>'Tata Usaha Menteri',
            'username'=>'user_tu_menteri',
            'position_name'=>'TU Menteri',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'6f0a68cf-b1a5-4ccd-95ce-92e652acc170',
            'name'=>'Suparyono',
            'username'=>'user_suparyono',
            'position_name'=>'Asdep Pengawasan Koperasi',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'720271a8-e01d-43cd-a8af-56b4d9b84f9d',
            'name'=>'Tata Usaha Dep. Usaha Kecil dan Menengah',
            'username'=>'user_tu_dep3',
            'position_name'=>'TU Deputi Bidang Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'72db4d70-dfe1-451e-b911-27bf6ed7dcf3',
            'name'=>'Dr. Yulius',
            'username'=>'user_yulius',
            'position_name'=>'Staf Ahli Bidang Produktivitas & Daya Saing',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'77006e60-b71f-4b55-9264-4fd2f731260b',
            'name'=>'Staff Khusus Asdep Perlindungan dan Kemudahan Usaha Mikro',
            'username'=>'stafsus_asdep22',
            'position_name'=>'Staff Khusus Asdep 2.2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'7eb5a1cf-a824-47d7-8974-e44745461b21',
            'name'=>'Staff Khusus Sesdep Usaha Mikro',
            'username'=>'stafsus_sesdep2',
            'position_name'=>'Staff Khusus Sesdep. 2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'8168339f-3d6f-47da-8ca2-fce73024a96c',
            'name'=>'Staff Khusus Biro KTI',
            'username'=>'stafsus_sm3',
            'position_name'=>'Staff Khusus SM. 3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'83125ad2-ed3e-432b-ae32-a75182768bd2',
            'name'=>'Staff Khusus Biro Umum & Keu',
            'username'=>'stafsus_sm4',
            'position_name'=>'Staff Khusus SM. 4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'869cfbc4-105e-4c58-8b46-98d138968a94',
            'name'=>'Ir. Arif Rahman Hakim',
            'username'=>'user_arifrahman',
            'position_name'=>'Sekretaris Menteri',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'8791563b-7afe-4a3c-8926-7fbc42892900',
            'name'=>'Kabag Umum Dep. Perkoperasian',
            'username'=>'user_kabum_dep1',
            'position_name'=>'Kabag Umum Deputi Bidang Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'8e1f1468-e040-4859-8038-5e7ac50956c7',
            'name'=>'Agus Santoso',
            'username'=>'user_skm_agus',
            'position_name'=>'Staf Khusus Menteri (Agus Santoso)',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'8ef56cb7-a20e-49dd-9c72-2fbada0ac733',
            'name'=>'M. IE Aufrida Herni Novieta',
            'username'=>'user_aufrida',
            'position_name'=>'Sekretaris Deputi Bidang Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'8fcd7767-fc25-42fb-8867-1286928669d9',
            'name'=>'Drs. Budi Mustopo',
            'username'=>'user_budimusto',
            'position_name'=>'Kepala Biro Komunikasi dan Teknologi Informasi',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'97524e52-bf1c-46ce-b940-21efe98858d1',
            'name'=>'Teten Masduki',
            'username'=>'user_tetenmasduki',
            'position_name'=>'Menteri',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'98b26fec-5588-400a-9551-6516d04fdc11',
            'name'=>'Riza Damanik',
            'username'=>'user_skm_riza',
            'position_name'=>'Staf Khusus Menteri (Riza Damanik)',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'9aec8ddd-fe7c-456d-bb1b-8983a1728663',
            'name'=>'Kabag Perencanaan Dep. Perkoperasian',
            'username'=>'user_kabperen_dep1',
            'position_name'=>'Kabag Perencanaan Deputi Bidang Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'9b29f824-3bf9-4d48-9475-896daab8eea4',
            'name'=>'Henra Saragih',
            'username'=>'user_henrasaragih',
            'position_name'=>'Kepala Biro Hukum dan Kerja Sama',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'9cdd08cf-b06f-49a9-9c48-0b61008d4b18',
            'name'=>'Staff Khusus Asdep Pembiayaan Wirausaha',
            'username'=>'stafsus_asdep44',
            'position_name'=>'Staff Khusus Asdep 4.4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'9ceeb9c0-03b2-44a9-ae07-0060eaa4bb52',
            'name'=>'Kabag Perencanaan Dep. Kewirausahaan',
            'username'=>'user_kabperen_dep4',
            'position_name'=>'Kabag Perencanaan Deputi Bidang Kewirausahaan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'9d976d40-960d-41e8-8bc6-f76b2417dba6',
            'name'=>'Staff Khusus Asdep Kemitraan dan Perluasan Pasar',
            'username'=>'stafsus_asdep34',
            'position_name'=>'Staff Khusus Asdep 3.4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'a010faed-7505-4c0f-8730-9dcc02a64cbf',
            'name'=>'Staff Khusus Biro MKOS',
            'username'=>'stafsus_sm1',
            'position_name'=>'Staff Khusus SM. 1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'a238b07d-65dd-4493-a850-35e9b4b3184d',
            'name'=>'Staff Khusus Dep. Kewirausahaan',
            'username'=>'staff_dep4',
            'position_name'=>'Staff Khusus Dep. 4',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'a681ddb9-7588-4a25-8e75-2c1c92211594',
            'name'=>'Staff Khusus Asdep Pembiayaan dan Investasi Usaha Kecil dan Menengah',
            'username'=>'stafsus_asdep31',
            'position_name'=>'Staff Khusus Asdep 3.1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'aa53f3f2-32d5-4cd1-ac58-e972286280aa',
            'name'=>'Ir. Luhur Pradjarto',
            'username'=>'user_luhurprad',
            'position_name'=>'Staf Ahli Bidang Hubungan Antar Lembaga',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ab23e6eb-5e46-439e-8e39-a31e387fbcde',
            'name'=>'Staff Khusus Dep. Usaha Kecil dan Menengah',
            'username'=>'staff_dep3',
            'position_name'=>'Staff Khusus Dep. 3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ada6d665-b58e-4342-985b-0bb107255664',
            'name'=>'Santoso',
            'username'=>'user_santoso',
            'position_name'=>'Sekretaris Deputi Bidang Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'adc0576d-93da-4f2f-977a-919d71ac9307',
            'name'=>'Staff Khusus Dep. Usaha Mikro',
            'username'=>'staff_dep2',
            'position_name'=>'Staff Khusus Dep. 2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'aeac56d9-6fd1-4d98-92b9-c54405caf204',
            'name'=>'Drs. Talkah Badrus',
            'username'=>'user_talkahbdrs',
            'position_name'=>'Sekretaris Deputi Bidang Kewirausahaan',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'b1ce172d-733f-455a-b49a-a66aad382b4c',
            'name'=>'Dra. Dwi Andriani',
            'username'=>'user_dwiandri',
            'position_name'=>'Asdep Pengembangan SDM Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'b229f93a-b567-4ccd-b484-f588f7d85a88',
            'name'=>'Ir. Eddy Satriya',
            'username'=>'user_eddysat',
            'position_name'=>'Deputi Bidang Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'b95073df-a148-4fa5-b8ca-bf3f60f54e21',
            'name'=>'Kabag Perencanaan Dep. Usaha Mikro',
            'username'=>'user_kabperen_dep2',
            'position_name'=>'Kabag Perencanaan Deputi Bidang Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'bace9a15-ab41-4131-887b-aa147385cd9f',
            'name'=>'Hariyanto',
            'username'=>'user_hariyanto',
            'position_name'=>'Asdep Pengembangan Kapasitas Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'bd23a996-ad14-4946-87ab-c51dc9767274',
            'name'=>'Staff Khusus Asdep Pengawasan Koperasi',
            'username'=>'stafsus_asdep13',
            'position_name'=>'Staff Khusus Asdep 1.3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'be9121b9-8033-4d88-8d54-e44cf8e0272a',
            'name'=>'Ir. R.S Hanung Harimba',
            'username'=>'user_hanungharim',
            'position_name'=>'Deputi Bidang Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'c046e4bc-f7d7-4718-8ea4-898c74f8c88d',
            'name'=>'Staff Khusus Dep. Perkoperasian',
            'username'=>'staff_dep1',
            'position_name'=>'Staff Khusus Dep. 1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'c5d198c6-fb7a-474f-87b2-c39aad73b9b0',
            'name'=>'Tata Usaha Sekretaris Menteri',
            'username'=>'user_tu_sesmen',
            'position_name'=>'TU Sekretaris Menteri',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'c8259357-0fa5-4e5b-9a85-4f239d5dbb4a',
            'name'=>'Irwansyah Putra, S.STP, M.Si',
            'username'=>'user_irwansyah',
            'position_name'=>'Asdep Pengembangan Ekosistem Bisnis',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'cc5c704e-9476-4f07-ab09-7efd58a91550',
            'name'=>'Staff Khusus Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
            'username'=>'stafsus_asdep42',
            'position_name'=>'Staff Khusus Asdep 4.2',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ce59b402-09b1-4ae4-92f3-20bfd85ddbc3',
            'name'=>'Staff Khusus Sesdep Perkoperasian',
            'username'=>'stafsus_sesdep1',
            'position_name'=>'Staff Khusus Sesdep. 1',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'d497c821-104f-4793-9fa9-e497ec2e6499',
            'name'=>'Ir. Adi Trisnojuwono',
            'username'=>'user_aditrisno',
            'position_name'=>'Asdep Pemetaan Data, Analis, dan Pengkajian Usaha',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'dcc36771-5f32-41ad-a567-844427a74705',
            'name'=>'Ari Gunawan',
            'username'=>'user_arigun',
            'position_name'=>'Asdep Pembiayaan dan Penjaminan Perkoperasian',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'dceb3aba-0640-40e3-b026-c808f9d88592',
            'name'=>'Fixy',
            'username'=>'user_fixy',
            'position_name'=>'Asdep Kemitraan dan Perluasan Pasar',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'de466c6c-da7b-407f-b097-8a59e880fb67',
            'name'=>'Tata Usaha Dep. Usaha Mikro',
            'username'=>'user_tu_dep2',
            'position_name'=>'TU Deputi Bidang Usaha Mikro',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'e3b882f4-6f18-425d-8002-d93d3ceea5eb',
            'name'=>'Leonard Theosabrata',
            'username'=>'user_leonard',
            'position_name'=>'Dirut LLP KUKM',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'e4cc797e-3e13-4d0a-8fd8-ffcc8d33dcb3',
            'name'=>'Nasrun',
            'username'=>'user_nasrun',
            'position_name'=>'Asdep Pengembangan SDM',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'e5348fd6-d24f-4d04-abbe-45dfb95b9fb9',
            'name'=>'Heru Berdikariyanto',
            'username'=>'user_heruberd',
            'position_name'=>'Inspektur',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ec6c41cb-f1a4-4f60-8a21-7093b6e67993',
            'name'=>'Drs. Edy Kusdiyarwoko',
            'username'=>'user_edykus',
            'position_name'=>'Asdep Pembiayaan Wirausaha',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ed3391ec-fc9d-4530-836c-0cc6c7703655',
            'name'=>'Staff Khusus Asdep Pemetaan Data, Analis, dan Pengkajian Usaha',
            'username'=>'stafsus_asdep45',
            'position_name'=>'Staff Khusus Asdep 4.5',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'ef7f0799-258d-453e-b6cb-6b1129668ee0',
            'name'=>'Staff Khusus Asdep Pengembangan Kawasan dan Rantai Pasok',
            'username'=>'stafsus_asdep33',
            'position_name'=>'Staff Khusus Asdep 3.3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'f125e436-bdbc-4537-b2e9-2285077c9929',
            'name'=>'Kabag Umum Dep. Usaha Kecil dan Menengah',
            'username'=>'user_kabum_dep3',
            'position_name'=>'Kabag Umum Deputi Bidang Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'f133d601-09ba-4608-aa5d-aa8741a06a81',
            'name'=>'Staff Khusus Asdep Pengembangan Ekosistem Bisnis',
            'username'=>'stafsus_asdep43',
            'position_name'=>'Staff Khusus Asdep 4.3',
            'role'=>'assistant',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'f351eb69-d8dd-439d-a806-f1b95962de09',
            'name'=>'Ses Korpri',
            'username'=>'user_seskorpri',
            'position_name'=>'Sekretaris Korpri',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
                 
        User::create( [
            'id'=>'f4b81805-94da-4762-9c8e-0f57935d3a19',
            'name'=>'Temmy Setya Permana',
            'username'=>'user_temmyset',
            'position_name'=>'Asdep Pembiayaan dan Investasi Usaha Kecil dan Menengah',
            'role'=>'general',
            'active'=>1,
            'password'=>'$2y$10$rdHxNPiRxfU..GeYA7lMyO.BYQoQVlS/n58IRGH32DtxJNfB4ScQe',
        ] );
    }
}
