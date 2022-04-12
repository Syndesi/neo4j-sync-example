<?php
namespace App\Service;

use App\Normalizer\RamseyUuidNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Syndesi\Neo4jSyncBundle\Contract\NormalizerProviderInterface;

class RamseyUuidNormalizerProvider implements NormalizerProviderInterface {

    public function getNormalizer(): NormalizerInterface
    {
        return new RamseyUuidNormalizer();
    }
}
