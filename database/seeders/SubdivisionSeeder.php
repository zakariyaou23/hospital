<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubdivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subdivisions = [
            //id = 1
            [
                'name' => 'Ngaoundal',
                'division_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 2
            [
                'name' => 'Tibati',
                'division_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 3
            [
                'name' => 'Galim-Tignère',
                'division_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 4
            [
                'name' => 'Mayo-Baléo',
                'division_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 5
            [
                'name' => 'Tignère',
                'division_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 6
            [
                'name' => 'Kontcha',
                'division_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 7
            [
                'name' => 'Bankim',
                'division_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 8
            [
                'name' => 'Banyo',
                'division_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 9
            [
                'name' => 'Mayo-Darlé',
                'division_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 10
            [
                'name' => 'Dir',
                'division_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 11
            [
                'name' => 'Djohong',
                'division_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 12
            [
                'name' => 'Meiganga',
                'division_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 13
            [
                'name' => 'Ngaoui',
                'division_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 14
            [
                'name' => 'Belel',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 15
            [
                'name' => 'Mbe',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 16
            [
                'name' => 'Nganha',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 17
            [
                'name' => 'Ngaoundéré (urban)',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 18
            [
                'name' => 'Ngaoundéré (rural)',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 19
            [
                'name' => 'Nyambaka',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 20
            [
                'name' => 'Martap',
                'division_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 21
            [
                'name' => 'Bibey',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 22
            [
                'name' => 'Lembe-Yezoum',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 23
            [
                'name' => 'Mbandjock',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 24
            [
                'name' => 'Minta',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 25
            [
                'name' => 'Nanga-Eboko',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 26
            [
                'name' => 'Nkoteng',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 27
            [
                'name' => 'Nsem',
                'division_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 28
            [
                'name' => 'Batchenga',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 29
            [
                'name' => 'Ebebda',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 30
            [
                'name' => 'Elig-Mfomo',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 31
            [
                'name' => 'Evodoula',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 32
            [
                'name' => 'Lobo',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 33
            [
                'name' => 'Monatélé',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 34
            [
                'name' => 'Obala',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 35
            [
                'name' => 'Okola',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 36
            [
                'name' => 'Sa\'a',
                'division_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 37
            [
                'name' => 'Bafia',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 38
            [
                'name' => 'Bokito',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 39
            [
                'name' => 'Deuk',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 40
            [
                'name' => 'Kiiki',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 41
            [
                'name' => 'Kon-Yambetta',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 42
            [
                'name' => 'Makénéné',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 43
            [
                'name' => 'Ndikiniméki',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 44
            [
                'name' => 'Nitoukou',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 45
            [
                'name' => 'Ombessa',
                'division_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 46
            [
                'name' => 'Mbangassina',
                'division_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 47
            [
                'name' => 'Ngambè-Tikar',
                'division_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 48
            [
                'name' => 'Ngoro',
                'division_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 49
            [
                'name' => 'Ntui',
                'division_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 50
            [
                'name' => 'Yoko',
                'division_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 51
            [
                'name' => 'Afanloum',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 52
            [
                'name' => 'Awaé',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 53
            [
                'name' => 'Edzendouan',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 54
            [
                'name' => 'Esse',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 55
            [
                'name' => 'Mfou',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 56
            [
                'name' => 'Nkolafamba',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 57
            [
                'name' => 'Olanguina',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 58
            [
                'name' => 'Soa',
                'division_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 59
            [
                'name' => 'Akono',
                'division_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 60
            [
                'name' => 'Bikok',
                'division_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 61
            [
                'name' => 'Mbankomo',
                'division_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 62
            [
                'name' => 'Ngoumou',
                'division_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 63
            [
                'name' => 'Yaoundé I',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 64
            [
                'name' => 'Yaoundé II',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 65
            [
                'name' => 'Yaoundé III',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 66
            [
                'name' => 'Yaoundé IV',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 67
            [
                'name' => 'Yaoundé V',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 68
            [
                'name' => 'Yaoundé VI',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 69
            [
                'name' => 'Yaoundé VII',
                'division_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 70
            [
                'name' => 'Biyouha',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 71
            [
                'name' => 'Bondjock',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 72
            [
                'name' => 'Bot-Makak',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 73
            [
                'name' => 'Dibang',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 74
            [
                'name' => 'Eséka',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 75
            [
                'name' => 'Makak',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 76
            [
                'name' => 'Matomb',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 77
            [
                'name' => 'Messondo',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 78
            [
                'name' => 'Ngog-Mapubi',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 79
            [
                'name' => 'Ngui-Bassal',
                'division_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 80
            [
                'name' => 'Akonolinga',
                'division_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 81
            [
                'name' => 'Ayos',
                'division_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 82
            [
                'name' => 'Endom',
                'division_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 83
            [
                'name' => 'Kobdombo',
                'division_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 84
            [
                'name' => 'Mengang',
                'division_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 85
            [
                'name' => 'Akoeman',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 86
            [
                'name' => 'Dzeng',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 87
            [
                'name' => 'Mbalmayo',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 88
            [
                'name' => 'Mengueme',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 89
            [
                'name' => 'Ngomedzap',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 90
            [
                'name' => 'Nkolmetet',
                'division_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 91
            [
                'name' => 'Gari-Gombo',
                'division_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 92
            [
                'name' => 'Moloundou',
                'division_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 93
            [
                'name' => 'Salapoumbé',
                'division_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 94
            [
                'name' => 'Yokadouma',
                'division_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 95
            [
                'name' => 'Abong-Mbang',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 96
            [
                'name' => 'Angossas',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 97
            [
                'name' => 'Atok',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 98
            [
                'name' => 'Dimako',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 99
            [
                'name' => 'Doumaintang',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 100
            [
                'name' => 'Doumé',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 101
            [
                'name' => 'Lomié',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 102
            [
                'name' => 'Mboma',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 103
            [
                'name' => 'Messamena',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 104
            [
                'name' => 'Messok',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 105
            [
                'name' => 'Mindourou',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 106
            [
                'name' => 'Ngoyla',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 107
            [
                'name' => 'Nguelemendouka',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 108
            [
                'name' => 'Somalomo',
                'division_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 109
            [
                'name' => 'Batouri',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 110
            [
                'name' => 'Kentzou',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 111
            [
                'name' => 'Kette',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 112
            [
                'name' => 'Mbang',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 113
            [
                'name' => 'Ndelele',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 114
            [
                'name' => 'Nguelebok',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 115
            [
                'name' => 'Ouli',
                'division_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 116
            [
                'name' => 'Bélabo',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 117
            [
                'name' => 'Bertoua',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 118
            [
                'name' => 'Bétaré-Oya',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 119
            [
                'name' => 'Diang',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 120
            [
                'name' => 'Garoua-Boulaï',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 121
            [
                'name' => 'Mandjou',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 122
            [
                'name' => 'Ngoura',
                'division_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 123
            [
                'name' => 'Bogo',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 124
            [
                'name' => 'Dargala',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 125
            [
                'name' => 'Gawaza',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 126
            [
                'name' => 'Maroua I',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 127
            [
                'name' => 'Maroua II',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 128
            [
                'name' => 'Maroua III',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 129
            [
                'name' => 'Meri',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 130
            [
                'name' => 'Ndoukoula',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 131
            [
                'name' => 'Petté',
                'division_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 132
            [
                'name' => 'Blangoua',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 133
            [
                'name' => 'Darak',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 134
            [
                'name' => 'Fotokol',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 135
            [
                'name' => 'Goulfey',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 136
            [
                'name' => 'Hile-Alifa',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 137
            [
                'name' => 'Kousséri',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 138
            [
                'name' => 'Logone-Birni',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 139
            [
                'name' => 'Makary',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 140
            [
                'name' => 'Waza',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 141
            [
                'name' => 'Zina',
                'division_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 142
            [
                'name' => 'Datcheka',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 143
            [
                'name' => 'Gobo',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 144
            [
                'name' => 'Gueme',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 145
            [
                'name' => 'Guere',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 146
            [
                'name' => 'Kai-Kai',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 147
            [
                'name' => 'Kalfou',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 148
            [
                'name' => 'Kay-Hay',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 149
            [
                'name' => 'Maga',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 150
            [
                'name' => 'Tchati-Bali',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 151
            [
                'name' => 'Wina',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 152
            [
                'name' => 'Yagoua',
                'division_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 153
            [
                'name' => 'Dziguilao',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 154
            [
                'name' => 'Guidiguis',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 155
            [
                'name' => 'Kaélé',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 156
            [
                'name' => 'Mindif',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 157
            [
                'name' => 'Moulvoudaye',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 158
            [
                'name' => 'Moutourwa',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 159
            [
                'name' => 'Touloum',
                'division_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 160
            [
                'name' => 'Kolofata',
                'division_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 161
            [
                'name' => 'Mora',
                'division_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 162
            [
                'name' => 'Tokombéré',
                'division_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 163
            [
                'name' => 'Bourrha',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 164
            [
                'name' => 'Hina',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 165
            [
                'name' => 'Koza',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 166
            [
                'name' => 'Mogodé',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 167
            [
                'name' => 'Mokolo',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 168
            [
                'name' => 'Mozogo',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 169
            [
                'name' => 'Souledé-Roua',
                'division_id' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 170
            [
                'name' => 'Baré',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 171
            [
                'name' => 'Bonaléa',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 172
            [
                'name' => 'Dibombari',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 173
            [
                'name' => 'Ebone',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 174
            [
                'name' => 'Loum',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 175
            [
                'name' => 'Manjo',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 176
            [
                'name' => 'Mbanga',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 177
            [
                'name' => 'Melong',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 178
            [
                'name' => 'Mombo',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 179
            [
                'name' => 'Nkongsamba I',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 180
            [
                'name' => 'Nkongsamba II',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 181
            [
                'name' => 'Nkongsamba III',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 182
            [
                'name' => 'Penja',
                'division_id' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 183
            [
                'name' => 'Ndobian',
                'division_id' => 27,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 184
            [
                'name' => 'Nkondjock',
                'division_id' => 27,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 185
            [
                'name' => 'Yabassi',
                'division_id' => 27,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 186
            [
                'name' => 'Yingui',
                'division_id' => 27,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 187
            [
                'name' => 'Dizangué',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 188
            [
                'name' => 'Dibamba',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 189
            [
                'name' => 'Édéa (urban)',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 190
            [
                'name' => 'Édéa (rural)',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 191
            [
                'name' => 'Massock',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 192
            [
                'name' => 'Mouanko',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 193
            [
                'name' => 'Ndom',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 194
            [
                'name' => 'Ngambe',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 195
            [
                'name' => 'Ngwei',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 196
            [
                'name' => 'Nyanon',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 197
            [
                'name' => 'Pouma',
                'division_id' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 198
            [
                'name' => 'Douala I',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 199
            [
                'name' => 'Douala II',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 200
            [
                'name' => 'Douala III',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 201
            [
                'name' => 'Douala IV',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 202
            [
                'name' => 'Douala V',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 203
            [
                'name' => 'Douala VI',
                'division_id' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 204
            [
                'name' => 'Barndaké',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 205
            [
                'name' => 'Bashéo ',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 206
            [
                'name' => 'Bibemi',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 207
            [
                'name' => 'Dembo',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 208
            [
                'name' => 'Garoua (urban)',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 209
            [
                'name' => 'Garoua (rural)',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 210
            [
                'name' => 'Gashiga',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 211
            [
                'name' => 'Lagdo',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 212
            [
                'name' => 'Ngong',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 213
            [
                'name' => 'Pitoa',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 214
            [
                'name' => 'Touroua',
                'division_id' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 215
            [
                'name' => 'Beka',
                'division_id' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 216
            [
                'name' => 'Poli (urban)',
                'division_id' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 217
            [
                'name' => 'Poli (rural)',
                'division_id' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 218
            [
                'name' => 'Figuil',
                'division_id' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 219
            [
                'name' => 'Guider',
                'division_id' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 220
            [
                'name' => 'Mayo-Oulo',
                'division_id' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 221
            [
                'name' => 'Mandingring',
                'division_id' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 222
            [
                'name' => 'Tcholliré',
                'division_id' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 223
            [
                'name' => 'Touboro',
                'division_id' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 224
            [
                'name' => 'Rey Bouba',
                'division_id' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 225
            [
                'name' => 'Belo',
                'division_id' => 34,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 226
            [
                'name' => 'Bum',
                'division_id' => 34,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 227
            [
                'name' => 'Fundong',
                'division_id' => 34,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 228
            [
                'name' => 'Njinikom',
                'division_id' => 34,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 229
            [
                'name' => 'Jakiri',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 230
            [
                'name' => 'Kumbo',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 231
            [
                'name' => 'Mbven',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 232
            [
                'name' => 'Nkum',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 233
            [
                'name' => 'Noni',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 234
            [
                'name' => 'Oku',
                'division_id' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 235
            [
                'name' => 'Ako',
                'division_id' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 236
            [
                'name' => 'Misaje',
                'division_id' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 237
            [
                'name' => 'Ndu',
                'division_id' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 238
            [
                'name' => 'Nkambe',
                'division_id' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 239
            [
                'name' => 'Nwa',
                'division_id' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 240
            [
                'name' => 'Fungom',
                'division_id' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 241
            [
                'name' => 'Furu-Awa',
                'division_id' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 242
            [
                'name' => 'Menchum Valley',
                'division_id' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 243
            [
                'name' => 'Wum',
                'division_id' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 244
            [
                'name' => 'Bali',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 245
            [
                'name' => 'Bafut',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 246
            [
                'name' => 'Bamenda I',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 247
            [
                'name' => 'Bamenda II',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 248
            [
                'name' => 'Bamenda III',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 249
            [
                'name' => 'Santa',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 250
            [
                'name' => 'Tubah',
                'division_id' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 251
            [
                'name' => 'Batibo',
                'division_id' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 252
            [
                'name' => 'Mbengwi',
                'division_id' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 253
            [
                'name' => 'Ngie',
                'division_id' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 254
            [
                'name' => 'Njikwa',
                'division_id' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 255
            [
                'name' => 'Widikum',
                'division_id' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 256
            [
                'name' => 'Babessi',
                'division_id' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 257
            [
                'name' => 'Balikumbat',
                'division_id' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 258
            [
                'name' => 'Ndop',
                'division_id' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 259
            [
                'name' => 'Bengbis',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 260
            [
                'name' => 'Djoum',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 261
            [
                'name' => 'Meyomessala',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 262
            [
                'name' => 'Meyomessi',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 263
            [
                'name' => 'Mintom',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 264
            [
                'name' => 'Oveng',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 265
            [
                'name' => 'Sangmélima (urban)',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 266
            [
                'name' => 'Sangmélima (rural)',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 267
            [
                'name' => 'Zoétélé',
                'division_id' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 268
            [
                'name' => 'Biwong-Bane',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 269
            [
                'name' => 'Biwong-Bulu',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 270
            [
                'name' => 'Ebolowa (urban)',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 271
            [
                'name' => 'Ebolowa (rural)',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 272
            [
                'name' => 'Efoulan',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 273
            [
                'name' => 'Mengong',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 274
            [
                'name' => 'Mvangane',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 275
            [
                'name' => 'Ngoulemakong',
                'division_id' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 276
            [
                'name' => 'Akom II',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 277
            [
                'name' => 'Bipindi',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 278
            [
                'name' => 'Campo',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 279
            [
                'name' => 'Kribi (urban)',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 280
            [
                'name' => 'Kribi (rural)',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 281
            [
                'name' => 'Lokundje',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 282
            [
                'name' => 'Lolodorf',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 283
            [
                'name' => 'Mvengue',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 284
            [
                'name' => 'Niete',
                'division_id' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 285
            [
                'name' => 'Ambam',
                'division_id' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 286
            [
                'name' => 'Ma\'an',
                'division_id' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 287
            [
                'name' => 'Olamze',
                'division_id' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 288
            [
                'name' => 'Kyé-Ossi',
                'division_id' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 289
            [
                'name' => 'Buea',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 290
            [
                'name' => 'Limbé I',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 291
            [
                'name' => 'Limbé II',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 292
            [
                'name' => 'Limbé III',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 293
            [
                'name' => 'Muyuka',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 294
            [
                'name' => 'Tiko',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 295
            [
                'name' => 'West Coast',
                'division_id' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 296
            [
                'name' => 'Bangem',
                'division_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 297
            [
                'name' => 'Tombel',
                'division_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 298
            [
                'name' => 'Nguti',
                'division_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 299
            [
                'name' => 'Alou',
                'division_id' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 300
            [
                'name' => 'Menji',
                'division_id' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 301
            [
                'name' => 'Wabane',
                'division_id' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 302
            [
                'name' => 'Akwaya',
                'division_id' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 303
            [
                'name' => 'Eyumojock',
                'division_id' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 304
            [
                'name' => 'Upper Bayang',
                'division_id' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 305
            [
                'name' => 'Mamfe Central',
                'division_id' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 306
            [
                'name' => 'Konye',
                'division_id' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 307
            [
                'name' => 'Kumba I',
                'division_id' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 308
            [
                'name' => 'Kumba II',
                'division_id' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 309
            [
                'name' => 'Kumba III',
                'division_id' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 310
            [
                'name' => 'Mbongue',
                'division_id' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 311
            [
                'name' => 'Bamusso',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 312
            [
                'name' => 'Dikome-Balue',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 313
            [
                'name' => 'Ekondo-Titi',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 314
            [
                'name' => 'Idabato',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 315
            [
                'name' => 'Isanguele',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 316
            [
                'name' => 'Kombo-Abedimo',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 317
            [
                'name' => 'Kombo-Itindi',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 318
            [
                'name' => 'Mundemba',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 319
            [
                'name' => 'Toko',
                'division_id' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 320
            [
                'name' => 'Babadjou',
                'division_id' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 321
            [
                'name' => 'Batcham',
                'division_id' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 322
            [
                'name' => 'Galim',
                'division_id' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 323
            [
                'name' => 'Mbouda',
                'division_id' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 324
            [
                'name' => 'Bana',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 325
            [
                'name' => 'Bafang (urban)',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 326
            [
                'name' => 'Bafang (rural)',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 327
            [
                'name' => 'Bakou',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 328
            [
                'name' => 'Bandja',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 329
            [
                'name' => 'Banka',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 330
            [
                'name' => 'Batcheu',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 331
            [
                'name' => 'Kékem',
                'division_id' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 332
            [
                'name' => 'Baham',
                'division_id' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 333
            [
                'name' => 'Bamendjou',
                'division_id' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 334
            [
                'name' => 'Bangou',
                'division_id' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 335
            [
                'name' => 'Batié',
                'division_id' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 336
            [
                'name' => 'Bayangam',
                'division_id' => 54,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 337
            [
                'name' => 'Bandjoun',
                'division_id' => 54,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 338
            [
                'name' => 'Demding',
                'division_id' => 54,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 339
            [
                'name' => 'Dschang (urban)',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 340
            [
                'name' => 'Dschang (rural)',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 341
            [
                'name' => 'Fokoué',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 342
            [
                'name' => 'Fongo-Tongo',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 343
            [
                'name' => 'Nkong-Zem',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 344
            [
                'name' => 'Penka-Michel',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 345
            [
                'name' => 'Santchou',
                'division_id' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 346
            [
                'name' => 'Bafoussam (urban)',
                'division_id' => 56,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 347
            [
                'name' => 'Bafoussam (rural)',
                'division_id' => 56,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 348
            [
                'name' => 'Bamougoum',
                'division_id' => 56,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 349
            [
                'name' => 'Lafé-Baleng',
                'division_id' => 56,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 350
            [
                'name' => 'Bangangté',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 351
            [
                'name' => 'Bassamba',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 352
            [
                'name' => 'Bazou',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 353
            [
                'name' => 'Tonga',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 354
            [
                'name' => 'Balengou',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 355
            [
                'name' => 'Bamena',
                'division_id' => 57,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 356
            [
                'name' => 'Bangourain',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 357
            [
                'name' => 'Foumban',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 358
            [
                'name' => 'Foumbot',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 359
            [
                'name' => 'Kouoptamo',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 360
            [
                'name' => 'Koutaba',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 361
            [
                'name' => 'Magba',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 362
            [
                'name' => 'Malentouen',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 363
            [
                'name' => 'Massangam',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 364
            [
                'name' => 'Njimom',
                'division_id' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];
        DB::table('subdivisions')->insert($subdivisions);
    }
}
