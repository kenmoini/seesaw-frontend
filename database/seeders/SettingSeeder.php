<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->string('friendly_name');
            $table->string('description');
            $table->string('type');
            $table->string('options');
            $table->string('group');
            $table->string('order');
            $table->string('validation');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
      */
      
      DB::table('settings')->insert([
        'key' => 'site-visibility',
        'value' => 'public',
        'friendly_name' => 'Site Visibility',
        'description' => 'Set the visibility of the site, primarily the Dashboard, Threads, and Status.',
        'type' => 'select',
        'options' => 'public, private',
        'group' => 'General',
        'order' => '1',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);

      DB::table('settings')->insert([
        'key' => 'site-name',
        'value' => config('app.name'),
        'friendly_name' => 'Site Name',
        'description' => 'Set the name of the site.',
        'type' => 'text',
        'options' => '',
        'group' => 'General',
        'order' => '2',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);

      DB::table('settings')->insert([
        'key' => 'site-url',
        'value' => config('app.url'),
        'friendly_name' => 'Site URL',
        'description' => 'Set the URL of the site - include the protocol (http:// or https://).',
        'type' => 'text',
        'options' => '',
        'group' => 'General',
        'order' => '3',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);

      DB::table('settings')->insert([
        'key' => 'site-logo',
        'value' => '',
        'friendly_name' => 'Site Logo',
        'description' => 'Set the logo of the site.',
        'type' => 'text',
        'options' => '',
        'group' => 'General',
        'order' => '4',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);

      DB::table('settings')->insert([
        'key' => 'site-favicon',
        'value' => '',
        'friendly_name' => 'Site Favicon',
        'description' => 'Set the favicon of the site.',
        'type' => 'text',
        'options' => '',
        'group' => 'General',
        'order' => '5',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);

      DB::table('settings')->insert([
        'key' => 'site-timezone',
        'value' => config('app.timezone'),
        'friendly_name' => 'Site Timezone',
        'description' => 'Set the timezone of the site - see https://www.php.net/manual/en/timezones.php.',
        'type' => 'text',
        'options' => '',
        'group' => 'General',
        'order' => '6',
        'validation' => 'required|string',
        'created_at' => now(),
      ]);


    }
}
