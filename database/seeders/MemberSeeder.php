<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Ahmad Fauzan',
                'nim' => '21010001',
                'prodi' => 'Teknik Mesin',
                'departemen' => 'Kaderisasi',
                'foto' => 'https://ui-avatars.com/api/?name=Ahmad+Fauzan&background=0D8ABC&color=fff',
            ],
            [
                'name' => 'Siti Rahmawati',
                'nim' => '21010002',
                'prodi' => 'Teknik Kimia',
                'departemen' => 'Humas',
                'foto' => 'https://ui-avatars.com/api/?name=Siti+Rahmawati&background=F59E42&color=fff',
            ],
            [
                'name' => 'Budi Santoso',
                'nim' => '21010003',
                'prodi' => 'Teknik Sipil',
                'departemen' => 'Keuangan',
                'foto' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=10B981&color=fff',
            ],
            [
                'name' => 'Dewi Lestari',
                'nim' => '21010004',
                'prodi' => 'Teknik Elektro',
                'departemen' => 'Media & Informasi',
                'foto' => 'https://ui-avatars.com/api/?name=Dewi+Lestari&background=6366F1&color=fff',
            ],
            [
                'name' => 'Rizky Pratama',
                'nim' => '21010005',
                'prodi' => 'Teknik Industri',
                'departemen' => 'PSDM',
                'foto' => 'https://ui-avatars.com/api/?name=Rizky+Pratama&background=F43F5E&color=fff',
            ],
        ];
        foreach ($data as $member) {
            Member::create($member);
        }
    }
}