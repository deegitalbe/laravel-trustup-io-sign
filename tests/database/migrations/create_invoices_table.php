<?php

namespace Deegitalbe\TrustupIoSign\Tests\database\migrations;


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Deegitalbe\TrustupIoSign\Services\Traits\TrustupioSignedDocumentRelatedMigrations;

class CreateInvoicesTable extends Migration
{
    use TrustupioSignedDocumentRelatedMigrations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        $this->addSignedDocumentColumn('invoices', 'trustup_io_signed_document_uuid');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
