<?php

namespace App\Models;

/**
 * Class BaseModel
 * @package App\Models
 */
class BaseModel
{
    /**
     * BaseModel constructor.
     *
     * @param array $attributes
     *
     * @throws \Exception
     */
    public function __construct(array $attributes)
    {
        foreach ($attributes as $key => $attribute) {
            if (!property_exists($this, $key)) {
                throw new \Exception('Bad attribute passed');
            }

            $this->$key = $attribute;
        }
    }

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        $className = get_called_class();

        if (isset($className::$table)) {
            return $className::$table;
        }

        return strtolower(substr(strrchr($className, "\\"), 1));
    }
}