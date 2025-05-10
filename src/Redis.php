<?php

namespace Redis;

use Redis\Command\{
    Command,
    CommandInvoker
};


class Redis implements RedisInterface {
    private string $host;

    private int $port;


    public function __construct(array $params) {
        $this->host = $params["host"];

        $this->port = $params["port"];
    }

    public function __call($action, $params) {
        $action = ucfirst($action);

        $class = "Redis\\Actions\\{$action}\\{$action}";

        echo !class_exists($class) 
            ? "The class is not exists!" . PHP_EOL
            : (new $class($params))->dispatch() . PHP_EOL;
    }

    public function connect(): self {
        echo "Server is running on [http://{$this->host}:{$this->port}]" . PHP_EOL;
    
        shell_exec("php -S {$this->host}:{$this->port} " . __FILE__);

        return $this;
    }

    final public function launch(): void {
        do {
            echo "{$this->host}:{$this->port}> ";
            
            $input = trim(fgets(STDIN));

            $command = new Command($input);

            $invoker = new CommandInvoker;

            $invoker->setCommand($command);

            $invoker->executeCommand();
        } while (true);
    }
}