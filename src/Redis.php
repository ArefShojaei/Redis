<?php

namespace Redis;

use Redis\Command\{
    Command,
    CommandInvoker
};
use Redis\Contracts\Interfaces\Redis as IRedis;
use Redis\Exceptions\InvalidAction;


final class Redis implements IRedis {
    private string $host;

    private int $port;


    public function __construct(array $params) {
        $this->host = $params["host"];

        $this->port = $params["port"];
    }

    public function __call($action, $params) {
        $action = ucfirst($action);

        $class = "Redis\\Actions\\{$action}";

        echo !class_exists($class) 
            ? throw new InvalidAction("The \"{$action}\" action doen't exist!")
            : (new $class($params))->dispatch() . PHP_EOL;
    }

    /**
     * HTTP requests listener from the client
     */
    public function listen(): void {
        echo "Server is running on [http://{$this->host}:{$this->port}]" . PHP_EOL;
    
        shell_exec("php -S {$this->host}:{$this->port} "  . __DIR__ . "\\request.php");
    }

    /**
     * Launch at the Terminal
     */
    public function launch(): void {
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