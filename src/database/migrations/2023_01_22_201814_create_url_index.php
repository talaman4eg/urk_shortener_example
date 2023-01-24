<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * We need to create this index separately because migrations don't support index length
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redirects', function (Blueprint $table) {
            $index_exists = collect(DB::select("SHOW INDEXES FROM redirects"))->pluck('Key_name')->contains('redirects_url_index');
            if (!$index_exists) {
                DB::statement('CREATE INDEX redirects_url_index ON redirects (url(256));');
            }
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redirects', function (Blueprint $table) {
            $index_exists = collect(DB::select("SHOW INDEXES FROM redirects"))->pluck('Key_name')->contains('redirects_url_index');
            if ($index_exists) {
                $table->dropIndex("redirects_url_index");
            }
        });        
    }
};
