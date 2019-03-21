<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $me = factory(\App\User::class)->create([
            'name' => 'Razvan Aurariu',
            'email' => 'razvan@rzv.me',
            'password' => bcrypt('razvan'),
            'api_token' => 'idiesa3ogh1zuy9shahz5quoo6ruqueit9ieX6eghoo0Guf0OhJez1phah6c'
        ]);

        $data = [
            [
                'name' => 'Real Madrid',
                'players' => [
                    ['first_name' => 'Kiko', 'last_name' => 'Casilia'],
                    ['first_name' => 'Moha', 'last_name' => 'Ramos'],
                    ['first_name' => 'Keylor', 'last_name' => 'Navas'],
                    ['first_name' => 'Luca', 'last_name' => 'Zidane'],
                    ['first_name' => 'Sergio', 'last_name' => 'Ramos'],
                    ['first_name' => 'Karim', 'last_name' => 'Benzema'],
                    ['first_name' => 'Cristiano', 'last_name' => 'Ronaldo'],
                ]
            ],
            [
                'name' => 'FC Barcelona',
                'players' => [
                    ['first_name' => 'Adrià', 'last_name' => 'Ortolà'],
                    ['first_name' => 'David', 'last_name' => 'Costas'],
                    ['first_name' => 'Thomas', 'last_name' => 'Vermaelen'],
                    ['first_name' => 'Denis', 'last_name' => 'Suárez'],
                    ['first_name' => 'Lionel', 'last_name' => 'Messi'],
                    ['first_name' => 'Luis', 'last_name' => 'Suárez'],
                ]
            ],
            [
                'name' => 'Liverpool FC',
                'players' => [
                    ['first_name' => 'Simon', 'last_name' => 'Mignolet'],
                    ['first_name' => 'Dejan', 'last_name' => 'Lovren'],
                    ['first_name' => 'Georginio', 'last_name' => 'Wijnaldum'],
                    ['first_name' => 'Roberto', 'last_name' => 'Firmino'],
                    ['first_name' => 'Dominic', 'last_name' => 'Solanke'],
                ]
            ],
            [
                'name' => 'Manchester United FC',
                'players' => [
                    ['first_name' => 'Sergio', 'last_name' => 'Romero'],
                    ['first_name' => 'Eric', 'last_name' => 'Bailly'],
                    ['first_name' => 'Victor', 'last_name' => 'Lindelöf'],
                    ['first_name' => 'Paul', 'last_name' => 'Pogba'],
                    ['first_name' => 'Romelu', 'last_name' => 'Lukaku'],
                    ['first_name' => 'Alexis', 'last_name' => 'Sánchez'],
                ]
            ],
        ];
        collect($data)->each(function($teamData) {
            $team = \App\Team::create(['name' => $teamData['name']]);
            collect($teamData['players'])->each(function($playerData) use ($team) {
                $team->players()->create($playerData);
            });
        });
    }
}
