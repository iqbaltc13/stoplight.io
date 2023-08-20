<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Models\Rekening;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('disabling foreignkeys check');
        Schema::disableForeignKeyConstraints();
        $this->command->info('truncating rekenings...');
        DB::table('rekenings')->truncate();
        Schema::enableForeignKeyConstraints();
        $users =  User::with([])->where('name','LIKE','%nasabah%')->get();
        foreach ($users as $key => $value) {
            $createRekening =  Rekening::create([
                 'user_id'=>$value->id,
                 'amount'=>5000000,
                 'created_by_id'=>0,
            ]);
        }

    }
}
