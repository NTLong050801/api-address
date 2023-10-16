<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Address;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country_code');
            $table->longText('name');
            $table->integer('depth')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->timestamps();
        });

        $addressesVN = Storage::disk('addresses')->get('vn.json');
        $result = json_decode($addressesVN);

        foreach ($result as $item) {
            Address::create([
                'country_code' => $item->country_code,
                'name' => $item->name,
                'depth' => $item->depth,
                'parent_id' => $item->parent_id,
            ]);
        }

        $addressesJP = Storage::disk('addresses')->get('jp.json');
        $result = json_decode($addressesJP);

        foreach ($result as $item) {
            $prefecture = Address::firstOrCreate(
                [
                    'name' => $item->admin_name
                ],
                [
                    'country_code' => 'jp',
                    'depth' => 0,
                ]
            );
            Address::create([
                'country_code' => 'jp',
                'name' => $item->city,
                'depth' => 1,
                'parent_id' => $prefecture->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
