<?php

namespace App\Normalizer;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @see https://github.com/jeromegamez/ramsey-uuid-normalizer/blob/master/src/Normalizer/UuidNormalizer.php
 */
class RamseyUuidNormalizer implements NormalizerInterface
{
    public function normalize($object, $format = null, array $context = [])
    {
        return $object->toString();
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof UuidInterface;
    }
}
