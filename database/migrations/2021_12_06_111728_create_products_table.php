<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['simple', 'group', 'external', 'variable'])->default('simple');
            $table->boolean('status')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('catalog_visibility')->default(true);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();


            $table->string('sku')->nullable();
            $table->decimal('regular_price')->nullable();
            $table->decimal('sale_price')->nullable();
            $table->timestamp('date_on_sale_from')->nullable();
            $table->timestamp('date_on_sale_to')->nullable();
            $table->unsignedBigInteger('total_sales')->default(0);
            $table->boolean('tax_status')->default(false);
            $table->string('tax_class')->nullable();
            $table->boolean('manage_stock')->default(false);
            $table->unsignedBigInteger('stock_quantity')->nullable();
            $table->boolean('stock_status')->default(true);
            $table->boolean('backorders')->default(false);
            $table->unsignedBigInteger('low_stock_amount')->nullable();
            $table->boolean('sold_individually')->default(false);
            $table->decimal('weight')->nullable();
            $table->decimal('length')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('height')->nullable();
            $table->json('upsell_ids')->nullable();
            $table->json('cross_sell_ids')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('reviews_allowed')->default(true);
            $table->string('purchase_note')->nullable();
            $table->string('password')->nullable();
            $table->boolean('virtual')->default(false);
            $table->boolean('downloadable')->default(false);
            $table->json('downloads')->nullable();
            $table->integer('download_limit')->nullable();
            $table->string('download_expiry')->nullable();
            $table->unsignedBigInteger('shipping_class_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
