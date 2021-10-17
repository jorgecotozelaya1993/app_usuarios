<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //$profesiones = DB:: select('SELECT id FROM profession WHERE title = "Desarrollador Front-end"');
        //dd($profesiones[0]->id);

        //UTILIZANDO EL CONSTRUCTOR DE LARAVEL
        $profesiones = DB::table('professions')->select('id')->take(1)->get();
        //dd($profesiones);

        DB::table('Users')->insert(
        [
            'name' => 'Jorge Coto',
            'email' => 'jorgealberto.cotozelaya@gmail.com',
            'password' => bcrypt('Jorge123'),
            'profession_id' => $profesiones[0]->id
        ]
        );

        User::create(
            [
                'name' => 'Luis',
                'email' => 'luis@gmail.com',
                'password' => bcrypt('luis'),
                'profession_id' => '1'
            ]
            );

            factory(User::class, 48)->create();

    }
}
