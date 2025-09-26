<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');        // e.g., Union Bank of India
            $table->string('branch');           // e.g., Andheri East
            $table->string('address')->nullable();  // e.g., Mumbai - 400 096
            $table->string('account_number');   // e.g., 103513001006059
            $table->string('ifsc_code')->nullable(); // optional
            $table->timestamps();
        });

        // Insert default data
        DB::table('bank_details')->insert([
            [
                'bank_name'      => 'Union Bank of India',
                'branch'         => 'Andheri East',
                'address'        => 'Mumbai - 400 096',
                'account_number' => '103513001006059',
                'ifsc_code'      => null, // if you have IFSC, put it here
                'created_at'     => now(),
                'updated_at'     => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
