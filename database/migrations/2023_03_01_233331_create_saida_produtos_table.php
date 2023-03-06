<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saida_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->string('transacao');
            $table->string('observacao');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('qtd');
            $table->decimal('preco', 12, 2)->default(0);
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
        Schema::dropIfExists('saida_produtos');
    }
};
