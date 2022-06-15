<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Html\Tag as Element;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\TagWithExtensionSpec;
/**
 * Tag class ScriptCustomElementAmpCarouselAmp4email.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read array<string> $attrLists
 * @property-read array<string> $htmlFormat
 * @property-read string $extensionSpec
 */
final class ScriptCustomElementAmpCarouselAmp4email extends TagWithExtensionSpec implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'SCRIPT[custom-element=amp-carousel] (AMP4EMAIL)';
    /**
     * Array of extension spec rules.
     *
     * @var array
     */
    const EXTENSION_SPEC = [SpecRule::NAME => 'amp-carousel', SpecRule::VERSION => ['0.1']];
    /**
     * Latest version of the extension.
     *
     * @var string
     */
    const LATEST_VERSION = '0.1';
    /**
     * Meta data about the specific versions.
     *
     * @var array
     */
    const VERSIONS_META = ['0.1' => ['hasCss' => \true, 'hasBento' => \false]];
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::SCRIPT, SpecRule::SPEC_NAME => 'SCRIPT[custom-element=amp-carousel] (AMP4EMAIL)', SpecRule::ATTR_LISTS => [AttributeList\CommonExtensionAttrs::ID], SpecRule::HTML_FORMAT => [Format::AMP4EMAIL], SpecRule::EXTENSION_SPEC => self::EXTENSION_SPEC];
}
