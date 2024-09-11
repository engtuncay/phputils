<?php
namespace Engtuncay\Phputils\core;

/**
 * Class which wraps an array for utility
 */
class FiKeybean
{
    /**
     * fkb is used as array, so it initialized.
     *
     * @var array
     */
    public array $params = [];

    public function put($key,$value)
    {
        $this->params[$key] = $value;
    }

    public function getArr(): array
    {
        return $this->params;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }


}