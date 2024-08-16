<?php
namespace Engtuncay\Phputils\core;

/**
 * Class which wraps an array for utility
 */
class FiKeybean
{
    public array $arrParams = [];
    public function put($key,$value)
    {
        $this->arrParams[$key] = $value;
    }

    public function getArrParams(): array
    {
        return $this->arrParams;
    }

    public function setArrParams(array $arrParams): void
    {
        $this->arrParams = $arrParams;
    }


}