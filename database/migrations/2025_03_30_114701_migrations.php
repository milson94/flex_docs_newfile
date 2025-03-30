<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Note: Laravel automatically creates its own migrations table
// when you run `php artisan migrate` for the first time.
// You typically *don't* need to create this specific table manually
// in your own migration file unless you have a very specific, non-standard setup.
// This example shows *how* you would define it if you needed to.

return new class extends Migration
{
    /**
     * Run the migrations.
     * Defines the structure of the 'migrations' table.
     */
    public function up(): void
    {
        Schema::create('migrations', function (Blueprint $table) {
            // `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
            // Laravel's id() method creates an auto-incrementing unsigned big integer primary key.
            // While the SQL specified int(10), bigInteger is the modern standard in Laravel.
            // If you absolutely need int(10) unsigned, you'd use:
            // $table->increments('id'); // Creates unsigned INT auto-increment PK
            $table->id(); // Creates unsigned BIGINT auto-increment PK (Recommended)

            // `migration` varchar(255) NOT NULL
            // Laravel's string() method creates a VARCHAR column.
            // The default length is 255, so you don't strictly need to specify it.
            $table->string('migration'); // Equivalent to $table->string('migration', 255);

            // `batch` int(11) NOT NULL
            // Laravel's integer() method creates an INT column.
            $table->integer('batch');

            // ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            // These are typically handled by your database connection settings
            // in config/database.php and usually don't need to be specified
            // directly in the migration unless you need to override the defaults.
            // If needed:
            // $table->engine = 'InnoDB';
            // $table->charset = 'utf8mb4';
            // $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     * Drops the 'migrations' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('migrations');
    }
};