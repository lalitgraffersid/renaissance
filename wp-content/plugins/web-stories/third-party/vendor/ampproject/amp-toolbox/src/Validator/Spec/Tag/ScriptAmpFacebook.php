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
 * Tag class ScriptAmpFacebook.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read array<string> $attrLists
 * @property-read array<string> $htmlFormat
 * @property-read array<string> $satisfies
 * @property-read string $extensionSpec
 * @property-read array<string> $excludes
 */
final class ScriptAmpFacebook extends TagWithExtensionSpec implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'SCRIPT [amp-facebook]';
    /**
     * Array of extension spec rules.
     *
     * @var array
     */
    const EXTENSION_SPEC = [SpecRule::NAME => 'amp-facebook', SpecRule::VERSION => ['0.1', 'latest'], SpecRule::DEPRECATED_ALLOW_DUPLICATES => \true, SpecRule::REQUIRES_USAGE => 'EXEMPTED', SpecRule::VERSION_NAME => 'v0.1'];
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
    const VERSIONS_META = ['0.1' => ['hasCss' => \false, 'hasBento' => \false]];
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::SCRIPT, SpecRule::ATTR_LISTS => [AttributeList\CommonExtensionAttrs::ID], SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::SATISFIES => ['amp-facebook 0.1'], SpecRule::EXTENSION_SPEC => self::EXTENSION_SPEC, SpecRule::EXCLUDES => ['amp-facebook 1.0']];
}
