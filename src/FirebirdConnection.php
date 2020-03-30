<?php

namespace Firebird;

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

    /**
     * Get a new query builder instance.
     *
     * @return FirebirdQueryBuilder
     */
    public function query()
    {
        return new FirebirdQueryBuilder(
            $this, $this->getQueryGrammar(), $this->getPostProcessor()
        );
    }
}
