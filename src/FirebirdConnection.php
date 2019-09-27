<?php

namespace Firebird;

use Firebird\Query\FirebirdQueryGrammar;
use Illuminate\Database\Connection;
use Illuminate\Database\Grammar;

class FirebirdConnection extends Connection
{
    /**
     * Get the default query grammar instance
     *
     * @return FirebirdQueryGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return new FirebirdQueryGrammar();
    }

    /**
     * Get the default schema grammar instance.
     *
     * @return Grammar|FirebirdSchemaGrammar
     */
    protected function getDefaultSchemaGrammar() {
        return $this->withTablePrefix(new FirebirdSchemaGrammar());
    }
}
