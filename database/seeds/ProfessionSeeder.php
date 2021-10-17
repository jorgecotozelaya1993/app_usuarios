<?php
use App\Profession;
use Illuminate\Database\Seeder;
//COLOCO
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //DB::delete('DELETE FROM profession WHERE id=1');

        //DB::insert('INSERT INTO profession (title) VALUES ("Desarrollador Back-end")');
        DB::insert('INSERT INTO professions (title) VALUES (?)', ['Desarrollador Back-end']);

        //DB::table('profession')->insert([
          //  'title'=> 'Desarrollador Back-end',
        //]);

        Profession::create([
            'title'=> 'Desarrollador Front-end',
        ]);
        
       Profession::create([
        'title'=> 'Full Developer',
        ]);

        factory(Profession::class, 17)->create();
    }
}
