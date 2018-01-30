<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Normalizer;


use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class OmitNullObjectNormalizer extends ObjectNormalizer
{
    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = parent::normalize($object, $format, $context);

        # Credit to https://stackoverflow.com/questions/40789385/do-not-show-null-element-with-symfony-serializer
        return array_filter($data, function ($value) {
            return null !== $value;
        });
    }


}