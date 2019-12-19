<?php
namespace nrhrhysd616\LaravelJsonCamelCaseConverter;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Routing\ResponseFactory as BaseResponseFactory;
use Illuminate\Support\Str;

/**
 * Convert response JSON key to camelCase
 */
class CamelCaseJsonResponseFactory extends BaseResponseFactory
{
    public function __construct($arg1, $arg2)
    {
        parent::__construct($arg1, $arg2);
    }

    public function json($data = array(), $status = 200, array $headers = array(), $options = 0)
    {
        $json = $this->encodeJson($data);
        return parent::json($json, $status, $headers, $options);
    }

    /**
     * Encode a value to camelCase JSON
     */
    private function encodeJson($value)
    {
        if ($value instanceof Arrayable) {
            return $this->encodeArrayable($value);
        } else if (is_array($value)) {
            return $this->encodeArray($value);
        } else if (is_object($value)) {
            return $this->encodeArray((array) $value);
        } else {
            return $value;
        }
    }

    /**
     * Encode a arrayable
     */
    private function encodeArrayable(Arrayable $arrayable)
    {
        $array = $arrayable->toArray();
        return $this->encodeJson($array);
    }

    /**
     * Encode an array
     */
    private function encodeArray($array)
    {
        $newArray = [];
        foreach ($array as $key => $val) {
            $newArray[Str::camel($key)] = $this->encodeJson($val);
        }
        return $newArray;
    }

}
