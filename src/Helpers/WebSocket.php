<?php

namespace Laraquick\Helpers;

use SplObjectStorage;
use Ratchet\ConnectionInterface;

class WebSocket {
    
    private static $callbacks = [];
    private static $clients;
    private static $currentClient;

    private static function init () {
        if (!self::$clients) {
            self::$clients = new SplObjectStorage;
        }
    }

    public static function addClient(ConnectionInterface $client)
    {
        self::init();
        self::$clients->attach($client);
    }

    public static function removeClient(ConnectionInterface $client)
    {
        self::init();
        self::$clients->detach($client);
    }

    public static function setCurrentClient(ConnectionInterface $client)
    {
        self::$currentClient = $client;
    }

    public static function emit($event, $data = null, $toSelf = false)
    {
        foreach (self::$clients as $client) {
            if (!$toSelf && $client == self::$currentClient) {
                continue;
            }

            $client->send(json_encode([
                'event' => trim($event),
                'data' => $data
            ]));
        }
    }

    public static function resolve($event, $data = null)
    {
        if (!array_key_exists($event, self::$callbacks)) {
            return;
        }
        foreach (self::$callbacks[$event] as $callback) {
            $callback($data);
        }
    }
}