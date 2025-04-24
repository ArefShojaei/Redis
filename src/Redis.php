<?php

namespace Redis;

use Redis\Command\{
    Command,
    CommandInvoker
};


final class Redis {
    private string $host;

    private int $port;


    public function __construct(string $host, int $port) {
        $this->host = $host;
        
        $this->port = $port;
    }

    public function connect(): void {
        echo "Server is running on [http://{$this->host}:{$this->port}]" . PHP_EOL;
    
        $this->listen();
    }

    private function listen(): void {
        do {
            echo "{$this->host}:{$this->port}> ";
            
            $input = fgets(STDIN);

            $command = new Command($input);

            $invoker = new CommandInvoker;

            $invoker->setCommand($command);

            $invoker->executeCommand();
        } while (true);
    }
}