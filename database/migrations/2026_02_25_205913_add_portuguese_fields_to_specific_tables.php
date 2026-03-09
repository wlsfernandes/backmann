<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | BANNERS
        |--------------------------------------------------------------------------
        */
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->string('subtitle_pt')->nullable()->after('subtitle_es');
        });

        /*
        |--------------------------------------------------------------------------
        | ABOUTS
        |--------------------------------------------------------------------------
        */
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->string('subtitle_pt')->nullable()->after('subtitle_es');
            $table->text('content_pt')->nullable()->after('content_es');
        });

        /*
        |--------------------------------------------------------------------------
        | PROJECTS
        |--------------------------------------------------------------------------
        */
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->text('description_pt')->nullable()->after('description_es');
        });

        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */
        Schema::table('services', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->text('description_pt')->nullable()->after('description_es');
        });

        /*
        |--------------------------------------------------------------------------
        | PAGES
        |--------------------------------------------------------------------------
        */
        Schema::table('pages', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->text('content_pt')->nullable()->after('content_es');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->text('content_pt')->nullable()->after('content_es');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_pt')->nullable()->after('title_es');
            $table->text('content_pt')->nullable()->after('content_es');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'subtitle_pt']);
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'subtitle_pt', 'content_pt']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'description_pt']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'description_pt']);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'content_pt']);
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'content_pt']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title_pt', 'content_pt']);
        });
    }
};
