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
 * Tag class AmpBaseCarouselLightbox.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read array<array<bool>> $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array<array<string>> $ampLayout
 * @property-read array<array<string>> $referencePoints
 * @property-read array<string> $htmlFormat
 * @property-read array<string> $requiresExtension
 */
final class AmpBaseCarouselLightbox extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'AMP-BASE-CAROUSEL [lightbox]';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Extension::BASE_CAROUSEL, SpecRule::SPEC_NAME => 'AMP-BASE-CAROUSEL [lightbox]', SpecRule::ATTRS => [Attribute::LIGHTBOX => [SpecRule::MANDATORY => \true]], SpecRule::ATTR_LISTS => [AttributeList\AmpBaseCarouselCommon::ID, AttributeList\ExtendedAmpGlobal::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-base-carousel/', SpecRule::AMP_LAYOUT => [SpecRule::SUPPORTED_LAYOUTS => [Layout::FILL, Layout::FIXED, Layout::FIXED_HEIGHT, Layout::FLEX_ITEM, Layout::INTRINSIC, Layout::NODISPLAY, Layout::RESPONSIVE]], SpecRule::REFERENCE_POINTS => [[SpecRule::TAG_SPEC_NAME => 'AMP-BASE-CAROUSEL lightbox [lightbox-exclude]'], [SpecRule::TAG_SPEC_NAME => 'AMP-BASE-CAROUSEL lightbox [child]']], SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::REQUIRES_EXTENSION => [Extension::BASE_CAROUSEL, Extension::LIGHTBOX_GALLERY]];
}
