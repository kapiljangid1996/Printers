<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('email1');
            $table->string('email2');
            $table->string('contact1');
            $table->string('contact2');
            $table->longtext('address1');
            $table->longtext('address2');
            $table->string('google');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
            $table->longtext('footer');
            $table->string('meta_name');
            $table->longtext('meta_keyword');
            $table->longtext('meta_description');
            $table->longtext('google_analyst')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert(
        array(
            'title' => 'Universal Printers',
            'logo' => '1.jpg',
            'email1' => 'name@domain.com',
            'email2' => 'name@domain.com',
            'contact1' => '789456123',
            'contact2' => '741852369',
            'address1' => 'Jaipur',
            'address2' => 'Jaipur',
            'google' => 'google@gmail.com',
            'facebook' => 'facebook@gmail.com',
            'linkedin' => 'linkedin@gmail.com',
            'twitter' => 'twitter@gmail.com',
            'footer' => 'copyright @',
            'meta_name' => 'Meta Name',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'google_analyst' => 'Google Analyst',
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
