<?php

namespace Firebird;

use Exception;
use Illuminate\Database\Connectors\Connector;
use Illuminate\Database\Connectors\ConnectorInterface;
use PDO;

class FirebirdConnector extends Connector implements ConnectorInterface
{
    /**
     * Establish a database connection.
     *
     * @param array $config
     * @return PDO
     * @throws Exception
     */
    public function connect(array $config)
    {
        $options = $this->getOptions($config);
        $path = $config['database'];
        $charset = $config['charset'];
        $uri = $config['host'];
        $port = $config['port'] ?? null;

        if($port) {
            $uri .= '/' . $port;
        }

        return $this->createConnection("firebird:dbname=$uri:$path;charSet=$charset", $config, $options);
    }
}
