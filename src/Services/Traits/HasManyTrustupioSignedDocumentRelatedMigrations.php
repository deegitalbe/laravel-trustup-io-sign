<?php

namespace Deegitalbe\TrustupIoSign\Services\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

trait TrustupioSignedDocumentRelatedMigrations
{
    public function addSignedDocumentColumn(string $model, string  $column = 'trustup_io_signed_document_uuids'): void
    {
        Schema::table($model, function (Blueprint $table) use ($column) {
            $table->json($column)->nullable();
        });
    }

    public function removeSignedDocumentColumn(string $table, string  $column = 'trustup_io_signed_document_uuids'): void
    {
        Schema::table($table, function (Blueprint $table) use ($column) {
            $table->dropColumn($column);
        });
    }
}
