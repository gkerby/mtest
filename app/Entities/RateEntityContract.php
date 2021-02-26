<?php

namespace App\Entities;

interface RateEntityContract {
    public function getCurrency():string;
    public function setCurrency(string $id): void;
    public function get15m():float;
    public function set15m(float $_15m): void;
    public function getLast():float;
    public function setLast(float $last): void;
    public function getBuy():float;
    public function setBuy(float $buy): void;
    public function getSell():float;
    public function setSell(float $sell): void;
    public function getSymbol():string;
    public function setSymbol(string $symbol): void;
}
