<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('status')->nullable(NULL);
            $table->string('user_type')->nullable(NULL);
            $table->string('iqama')->nullable(NULL);
            $table->string('national_id')->nullable(NULL);
            $table->boolean('certified')->nullable(NULL);
            $table->string('nationality')->nullable(NULL);
            $table->date('reg_date')->nullable('2000-12-12');
            $table->string('rate_ph')->nullable(NULL);
            $table->string('no_projects')->nullable(NULL);
            $table->string('revenue')->nullable(NULL);
            $table->string('comments')->nullable(NULL);
            $table->string('professions')->nullable(NULL);
            $table->longText('bio')->nullable(NULL);
            $table->longText('skills')->nullable(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'status',
                'user_type',
                'iqama',
                'national_id',
                'certified',
                'nationality',
                'reg_date',
                'rate_ph',
                'no_projects',
                'revenue',
                'comments',
                'professions',
                'bio',
                'skills'
           ]);
        });
    }
}
