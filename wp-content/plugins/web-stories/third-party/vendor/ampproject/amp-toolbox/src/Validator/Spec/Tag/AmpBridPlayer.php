<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Extension;
use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Html\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Layout;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class AmpBridPlayer.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read array $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array<array<string>> $ampLayout
 * @property-read array<string> $htmlFormat
 * @property-read array<string> $requiresExtension
 */
final class AmpBridPlayer extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'AMP-BRID-PLAYER';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Extension::BRID_PLAYER, SpecRule::ATTRS => [Attribute::AUTOPLAY => [], Attribute::DATA_DYNAMIC => [SpecRule::VALUE_REGEX => '[a-z]+'], Attribute::DATA_OUTSTREAM => [SpecRule::MANDATORY_ONEOF => [Attribute::DATA_CAROUSEL, Attribute::DATA_OUTSTREAM, Attribute::DATA_PLAYLIST, Attribute::DATA_VIDEO], SpecRule::VALUE_REGEX => '[0-9]+'], Attribute::DATA_PARTNER => [SpecRule::MANDATORY => \true, SpecRule::VALUE_REGEX => '[0-9]+'], Attribute::DATA_PLAYER => [SpecRule::MANDATORY => \true, SpecRule::VALUE_REGEX => '[0-9]+'], Attribute::DATA_PLAYLIST => [SpecRule::MANDATORY_ONEOF => [Attribute::DATA_CAROUSEL, Attribute::DATA_OUTSTREAM, Attribute::DATA_PLAYLIST, Attribute::DATA_VIDEO], SpecRule::VALUE_REGEX => '.+'], Attribute::DATA_VIDEO => [SpecRule::MANDATORY_ONEOF => [Attribute::DATA_CAROUSEL, Attribute::DATA_OUTSTREAM, Attribute::DATA_PLAYLIST, Attribute::DATA_VIDEO], SpecRule::VALUE_REGEX => '[0-9]+'], Attribute::DATA_CAROUSEL => [SpecRule::MANDATORY_ONEOF => [Attribute::DATA_CAROUSEL, Attribute::DATA_OUTSTREAM, Attribute::DATA_PLAYLIST, Attribute::DATA_VIDEO], SpecRule::VALUE_REGEX => '[0-9]+'], Attribute::DOCK => [SpecRule::REQUIRES_EXTENSION => [Extension::VIDEO_DOCKING]]], SpecRule::ATTR_LISTS => [AttributeList\ExtendedAmpGlobal::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-brid-player/', SpecRule::AMP_LAYOUT => [SpecRule::SUPPORTED_LAYOUTS => [Layout::FILL, Layout::FIXED, Layout::FIXED_HEIGHT, Layout::FLEX_ITEM, Layout::NODISPLAY, Layout::RESPONSIVE]], SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::REQUIRES_EXTENSION => [Extension::BRID_PLAYER]];
}
