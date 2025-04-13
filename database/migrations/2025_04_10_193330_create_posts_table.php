<?php

use App\Models\Ad;
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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id')->nullable(false)->after('id');
            $table->string('title', 255)->nullable(false);
            $table->text('body')->nullable();
            $table->enum('status', Post::AD_STATUSES);
            $table->string('url')->nullable(false);
            $table->integer('impressions_quantity')->nullable(false);
            $table->float('cost_per_mille', 10, 3)->nullable(false);
            $table->float('ad_budget', 8, 2)->nullable(false);
            $table->enum('cta_text', Post::CTA_TYPES)->nullable(false); // пришлось сократить, работал с такими стандартами, логичнее назвать call_to_action_text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
