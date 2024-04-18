<?php

/**
 * A helper file for Kirby, to provide autocomplete information to your IDE.
 * This file was automatically generated with the Kirby Types plugin.
 *
 * @see https://github.com/lukaskleinschmidt/kirby-types
 */

namespace Kirby\Cms
{
    class Page
    {
        /**
         * Returns the layout field.
         *
         * Uses a `layout` field in the `pages/about` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/layout
         */
        public function layout(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->layout();
        }
        /**
         * Returns the address field.
         *
         * Uses a `writer` field in the `pages/about` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/writer
         */
        public function address(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->address();
        }
        /**
         * Returns the email field.
         *
         * Uses a `email` field in the `pages/about` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/email
         */
        public function email(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->email();
        }
        /**
         * Returns the phone field.
         *
         * Uses a `tel` field in the `pages/about` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/tel
         */
        public function phone(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->phone();
        }
        /**
         * Returns the social field.
         *
         * Uses a `structure` field in the `pages/about` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/structure
         */
        public function social(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->social();
        }
        /**
         * Returns the cover field.
         *
         * Uses a `files` field in the `pages/album` blueprint.\
         * Uses a `files` field in the `pages/note` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/files
         */
        public function cover(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->cover();
        }
        /**
         * Returns the headline field.
         *
         * Uses a `text` field in the `pages/album` blueprint.\
         * Uses a `text` field in the `pages/home` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/text
         */
        public function headline(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->headline();
        }
        /**
         * Returns the subheadline field.
         *
         * Uses a `text` field in the `pages/album` blueprint.\
         * Uses a `text` field in the `pages/home` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/text
         */
        public function subheadline(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->subheadline();
        }
        /**
         * Returns the text field.
         *
         * Uses a `writer` field in the `pages/album` blueprint.\
         * Uses a `textarea` field in the `pages/default` blueprint.\
         * Uses a `blocks` field in the `pages/note` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/writer
         * @see https://getkirby.com/docs/reference/panel/fields/textarea
         * @see https://getkirby.com/docs/reference/panel/fields/blocks
         */
        public function text(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->text();
        }
        /**
         * Returns the tags field.
         *
         * Uses a `tags` field in the `pages/album` blueprint.\
         * Uses a `tags` field in the `pages/note` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/tags
         */
        public function tags(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->tags();
        }
        /**
         * Returns the gap field.
         *
         * Uses a `gap` field in the `pages/home` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/gap
         */
        public function gap(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->gap();
        }
        /**
         * Returns the date field.
         *
         * Uses a `date` field in the `pages/note` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/date
         */
        public function date(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->date();
        }
        /**
         * Returns the author field.
         *
         * Uses a `users` field in the `pages/note` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/users
         */
        public function author(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->author();
        }
        public function log()
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->log();
        }
        public function env($value, $default = '')
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->env($value, $default);
        }
        public function schema($type)
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->schema($type);
        }
        public function schemas()
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->schemas();
        }
        public function metadata(?string $lang = null)
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->metadata($lang);
        }
        public function robots(?string $lang = null)
        {
            /** @var \Kirby\Cms\Page $instance */
            return $instance->robots($lang);
        }
    }
    class StructureObject
    {
        /**
         * Returns the platform field.
         *
         * Uses a `text` field in the `pages/about.social` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/text
         */
        public function platform(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\StructureObject $instance */
            return $instance->platform();
        }
        /**
         * Returns the url field.
         *
         * Uses a `url` field in the `pages/about.social` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/url
         */
        public function url(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\StructureObject $instance */
            return $instance->url();
        }
    }
    class File
    {
        /**
         * Returns the caption field.
         *
         * Uses a `textarea` field in the `files/image` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/textarea
         */
        public function caption(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->caption();
        }
        /**
         * Returns the alt field.
         *
         * Uses a `text` field in the `files/image` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/text
         */
        public function alt(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->alt();
        }
        /**
         * Returns the photographer field.
         *
         * Uses a `text` field in the `files/image` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/text
         */
        public function photographer(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->photographer();
        }
        /**
         * Returns the license field.
         *
         * Uses a `select` field in the `files/image` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/select
         */
        public function license(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->license();
        }
        /**
         * Returns the link field.
         *
         * Uses a `url` field in the `files/image` blueprint.
         *
         * @see https://getkirby.com/docs/reference/panel/fields/url
         */
        public function link(): \Kirby\Content\Field
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->link();
        }
        public function log()
        {
            /** @var \Kirby\Cms\File $instance */
            return $instance->log();
        }
    }
    class Collection
    {
        public function log()
        {
            /** @var \Kirby\Cms\Collection $instance */
            return $instance->log();
        }
    }
    class Files
    {
        public function log()
        {
            /** @var \Kirby\Cms\Files $instance */
            return $instance->log();
        }
    }
    class Pages
    {
        public function log()
        {
            /** @var \Kirby\Cms\Pages $instance */
            return $instance->log();
        }
    }
    class Site
    {
        public function logger()
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->logger();
        }
        public function log()
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->log();
        }
        public function schema($type)
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->schema($type);
        }
        public function schemas()
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->schemas();
        }
        public function lang()
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->lang();
        }
        public function canonicalFor(string $url)
        {
            /** @var \Kirby\Cms\Site $instance */
            return $instance->canonicalFor($url);
        }
    }
    class User
    {
        public function log()
        {
            /** @var \Kirby\Cms\User $instance */
            return $instance->log();
        }
    }
    class Users
    {
        public function log()
        {
            /** @var \Kirby\Cms\Users $instance */
            return $instance->log();
        }
    }
    class Layout
    {
        /**
         * Returns the columns in this layout
         *
         * @return \Kirby\Cms\LayoutColumns|\Kirby\Cms\LayoutColumn[]
         */
        public function columns(): \Kirby\Cms\LayoutColumns
        {
            /** @var \Kirby\Cms\Layout $instance */
            return $instance->columns();
        }
    }
    class LayoutColumn
    {
        /**
         * Returns the blocks collection
         *
         * @param bool $includeHidden Sets whether to include hidden blocks
         * @return \Kirby\Cms\Blocks|\Kirby\Cms\Block[]
         */
        public function blocks(bool $includeHidden = false): \Kirby\Cms\Blocks
        {
            /** @var \Kirby\Cms\LayoutColumn $instance */
            return $instance->blocks($includeHidden);
        }
    }
}

namespace Kirby\Content
{
    class Field
    {
        /**
         * Converts the field value into a proper boolean and inverts it
         */
        public function isFalse(): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->isFalse();
        }
        /**
         * Converts the field value into a proper boolean
         */
        public function isTrue(): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->isTrue();
        }
        /**
         * Validates the field content with the given validator and parameters
         *
         * @param mixed ...$arguments A list of optional validator arguments
         */
        public function isValid(string $validator, ...$arguments): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->isValid($validator, ...$arguments);
        }
        /**
         * Converts a yaml or json field to a Blocks object
         *
         * @return \Kirby\Cms\Blocks|\Kirby\Cms\Block[]
         */
        public function toBlocks(): \Kirby\Cms\Blocks
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toBlocks();
        }
        /**
         * Converts the field value into a proper boolean
         *
         * @param bool $default Default value if the field is empty
         */
        public function toBool(bool $default = false): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toBool($default);
        }
        /**
         * Parses the field value with the given method
         *
         * @param string $method [',', 'yaml', 'json']
         */
        public function toData(string $method = ','): array
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toData($method);
        }
        /**
         * Converts the field value to a timestamp or a formatted date
         *
         * @param string|\IntlDateFormatter|null $format PHP date formatting string
         * @param string|null $fallback Fallback string for `strtotime`
         */
        public function toDate(\IntlDateFormatter|string|null $format = null, ?string $fallback = null): string|int|null
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toDate($format, $fallback);
        }
        /**
         * Returns a file object from a filename in the field
         */
        public function toFile(): ?\Kirby\Cms\File
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toFile();
        }
        /**
         * Returns a file collection from a yaml list of filenames in the field
         *
         * @return \Kirby\Cms\Files|\Kirby\Cms\File[]
         */
        public function toFiles(string $separator = 'yaml'): \Kirby\Cms\Files
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toFiles($separator);
        }
        /**
         * Converts the field value into a proper float
         *
         * @param float $default Default value if the field is empty
         */
        public function toFloat(float $default = 0.0): float
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toFloat($default);
        }
        /**
         * Converts the field value into a proper integer
         *
         * @param int $default Default value if the field is empty
         */
        public function toInt(int $default): int
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toInt($default);
        }
        /**
         * Parse layouts and turn them into Layout objects
         *
         * @return \Kirby\Cms\Layouts|\Kirby\Cms\Layout[]
         */
        public function toLayouts(): \Kirby\Cms\Layouts
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toLayouts();
        }
        /**
         * Wraps a link tag around the field value. The field value is used as the link text
         *
         * @param mixed $attr1 Can be an optional Url. If no Url is set, the Url of the Page, File or Site will be used. Can also be an array of link attributes
         * @param mixed $attr2 If `$attr1` is used to set the Url, you can use `$attr2` to pass an array of additional attributes.
         */
        public function toLink(array|string|null $attr1 = null, ?array $attr2 = null): string
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toLink($attr1, $attr2);
        }
        /**
         * Parse yaml data and convert it to a
         * content object
         */
        public function toObject(): \Kirby\Content\Content
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toObject();
        }
        /**
         * Returns a page object from a page id in the field
         */
        public function toPage(): ?\Kirby\Cms\Page
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toPage();
        }
        /**
         * Returns a pages collection from a yaml list of page ids in the field
         *
         * @param string $separator Can be any other separator to split the field value by
         * @return \Kirby\Cms\Pages|\Kirby\Cms\Page[]
         */
        public function toPages(string $separator = 'yaml'): \Kirby\Cms\Pages
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toPages($separator);
        }
        /**
         * Turns the field value into an QR code object
         */
        public function toQrCode(): ?\Kirby\Image\QrCode
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toQrCode();
        }
        /**
         * Converts a yaml field to a Structure object
         *
         * @return \Kirby\Cms\Structure|\Kirby\Cms\StructureObject[]
         */
        public function toStructure(): \Kirby\Cms\Structure
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toStructure();
        }
        /**
         * Converts the field value to a Unix timestamp
         */
        public function toTimestamp(): int|false
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toTimestamp();
        }
        /**
         * Turns the field value into an absolute Url
         */
        public function toUrl(): ?string
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toUrl();
        }
        /**
         * Converts a user email address to a user object
         */
        public function toUser(): ?\Kirby\Cms\User
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toUser();
        }
        /**
         * Returns a users collection from a yaml list
         * of user email addresses in the field
         *
         * @return \Kirby\Cms\Users|\Kirby\Cms\User[]
         */
        public function toUsers(string $separator = 'yaml'): \Kirby\Cms\Users
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toUsers($separator);
        }
        /**
         * Returns the length of the field content
         */
        public function length(): int
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->length();
        }
        /**
         * Returns the number of words in the text
         */
        public function words(): int
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->words();
        }
        /**
         * Applies the callback function to the field
         *
         * @since 3.4.0
         */
        public function callback(\Closure $callback): mixed
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->callback($callback);
        }
        /**
         * Escapes the field value to be safely used in HTML
         * templates without the risk of XSS attacks
         *
         * @param string $context Location of output (`html`, `attr`, `js`, `css`, `url` or `xml`)
         */
        public function escape(string $context = 'html'): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->escape($context);
        }
        /**
         * Creates an excerpt of the field value without html
         * or any other formatting.
         */
        public function excerpt(int $chars, bool $strip = true, string $rep = ' …'): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->excerpt($chars, $strip, $rep);
        }
        /**
         * Converts the field content to valid HTML
         */
        public function html(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->html();
        }
        /**
         * Strips all block-level HTML elements from the field value,
         * it can be safely placed inside of other inline elements
         * without the risk of breaking the HTML structure.
         *
         * @since 3.3.0
         */
        public function inline(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->inline();
        }
        /**
         * Converts the field content from Markdown/Kirbytext to valid HTML
         */
        public function kirbytext(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->kirbytext($options);
        }
        /**
         * Converts the field content from inline Markdown/Kirbytext
         * to valid HTML
         *
         * @since 3.1.0
         */
        public function kirbytextinline(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->kirbytextinline($options);
        }
        /**
         * Parses all KirbyTags without also parsing Markdown
         */
        public function kirbytags(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->kirbytags();
        }
        /**
         * Converts the field content to lowercase
         */
        public function lower(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->lower();
        }
        /**
         * Converts markdown to valid HTML
         */
        public function markdown(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->markdown($options);
        }
        /**
         * Converts all line breaks in the field content to `<br>` tags.
         *
         * @since 3.3.0
         */
        public function nl2br(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->nl2br();
        }
        /**
         * Parses the field value as DOM and replaces
         * any permalinks in href/src attributes with
         * the regular url
         *
         * This method is still experimental! You can use
         * it to solve potential problems with permalinks
         * already, but it might change in the future.
         */
        public function permalinksToUrls(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->permalinksToUrls();
        }
        /**
         * Uses the field value as Kirby query
         */
        public function query(?string $expect = null): mixed
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->query($expect);
        }
        /**
         * It parses any queries found in the field value.
         *
         * @param string|null $fallback Fallback for tokens in the template that cannot be replaced (`null` to keep the original token)
         */
        public function replace(array $data = [], ?string $fallback = ''): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->replace($data, $fallback);
        }
        /**
         * Cuts the string after the given length and
         * adds "…" if it is longer
         *
         * @param int $length The number of characters in the string
         * @param string $appendix An optional replacement for the missing rest
         */
        public function short(int $length, string $appendix = '…'): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->short($length, $appendix);
        }
        /**
         * Converts the field content to a slug
         */
        public function slug(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->slug();
        }
        /**
         * Applies SmartyPants to the field
         */
        public function smartypants(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->smartypants();
        }
        /**
         * Splits the field content into an array
         */
        public function split($separator = ','): array
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->split($separator);
        }
        /**
         * Converts the field content to uppercase
         */
        public function upper(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->upper();
        }
        /**
         * Avoids typographical widows in strings by replacing
         * the last space with `&nbsp;`
         */
        public function widont(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->widont();
        }
        /**
         * Converts the field content to valid XML
         */
        public function xml(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->xml();
        }
        /**
         * Parses yaml in the field content and returns an array
         */
        public function yaml(): array
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->yaml();
        }
        /**
         * Converts the field value into a proper boolean
         *
         * @param bool $default Default value if the field is empty
         */
        public function bool(bool $default = false): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toBool($default);
        }
        /**
         * Escapes the field value to be safely used in HTML
         * templates without the risk of XSS attacks
         *
         * @param string $context Location of output (`html`, `attr`, `js`, `css`, `url` or `xml`)
         */
        public function esc(string $context = 'html'): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->escape($context);
        }
        /**
         * Converts the field value into a proper float
         *
         * @param float $default Default value if the field is empty
         */
        public function float(float $default = 0.0): float
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toFloat($default);
        }
        /**
         * Converts the field content to valid HTML
         */
        public function h(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->html();
        }
        /**
         * Converts the field value into a proper integer
         *
         * @param int $default Default value if the field is empty
         */
        public function int(int $default): int
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toInt($default);
        }
        /**
         * Converts the field content from Markdown/Kirbytext to valid HTML
         */
        public function kt(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->kirbytext($options);
        }
        /**
         * Converts the field content from inline Markdown/Kirbytext
         * to valid HTML
         *
         * @since 3.1.0
         */
        public function kti(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->kirbytextinline($options);
        }
        /**
         * Wraps a link tag around the field value. The field value is used as the link text
         *
         * @param mixed $attr1 Can be an optional Url. If no Url is set, the Url of the Page, File or Site will be used. Can also be an array of link attributes
         * @param mixed $attr2 If `$attr1` is used to set the Url, you can use `$attr2` to pass an array of additional attributes.
         */
        public function link(array|string|null $attr1 = null, ?array $attr2 = null): string
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->toLink($attr1, $attr2);
        }
        /**
         * Converts markdown to valid HTML
         */
        public function md(array $options = []): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->markdown($options);
        }
        /**
         * Applies SmartyPants to the field
         */
        public function sp(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->smartypants();
        }
        /**
         * Validates the field content with the given validator and parameters
         *
         * @param mixed ...$arguments A list of optional validator arguments
         */
        public function v(string $validator, ...$arguments): bool
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->isValid($validator, ...$arguments);
        }
        /**
         * Converts the field content to valid XML
         */
        public function x(): \Kirby\Content\Field
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->xml();
        }
        public function log()
        {
            /** @var \Kirby\Content\Field $instance */
            return $instance->log();
        }
    }
    class Content
    {
        /**
         * Returns all registered field objects
         *
         * @return \Kirby\Content\Field[]
         */
        public function fields(): array
        {
            /** @var \Kirby\Content\Content $instance */
            return $instance->fields();
        }
    }
}

namespace Kirby\Toolkit
{
    class V
    {
        /**
         * Valid: `'yes' | true | 1 | 'on'`
         */
        public static function accepted($value): bool
        {
            return V::accepted($value);
        }
        /**
         * Valid: `a-z | A-Z`
         */
        public static function alpha($value, bool $unicode = false): bool
        {
            return V::alpha($value, $unicode);
        }
        /**
         * Valid: `a-z | A-Z | 0-9`
         */
        public static function alphanum($value, bool $unicode = false): bool
        {
            return V::alphanum($value, $unicode);
        }
        /**
         * Checks for numbers within the given range
         */
        public static function between($value, $min, $max): bool
        {
            return V::between($value, $min, $max);
        }
        /**
         * Checks with the callback sent by the user
         * It's ideal for one-time custom validations
         */
        public static function callback($value, callable $callback): bool
        {
            return V::callback($value, $callback);
        }
        /**
         * Checks if the given string contains the given value
         */
        public static function contains($value, $needle): bool
        {
            return V::contains($value, $needle);
        }
        /**
         * Checks for a valid date or compares two
         * dates with each other.
         *
         * Pass only the first argument to check for a valid date.
         * Pass an operator as second argument and another date as
         * third argument to compare them.
         */
        public static function date(?string $value, ?string $operator = null, ?string $test = null): bool
        {
            return V::date($value, $operator, $test);
        }
        /**
         * Valid: `'no' | false | 0 | 'off'`
         */
        public static function denied($value): bool
        {
            return V::denied($value);
        }
        /**
         * Checks for a value, which does not equal the given value
         */
        public static function different($value, $other, $strict = false): bool
        {
            return V::different($value, $other, $strict);
        }
        /**
         * Checks for valid email addresses
         */
        public static function email($value): bool
        {
            return V::email($value);
        }
        /**
         * Checks for empty values
         */
        public static function empty($value = null): bool
        {
            return V::empty($value);
        }
        /**
         * Checks if the given string ends with the given value
         */
        public static function endsWith(string $value, string $end): bool
        {
            return V::endsWith($value, $end);
        }
        /**
         * Checks for a valid filename
         */
        public static function filename($value): bool
        {
            return V::filename($value);
        }
        /**
         * Checks if the value exists in a list of given values
         */
        public static function in($value, array $in, bool $strict = false): bool
        {
            return V::in($value, $in, $strict);
        }
        /**
         * Checks for a valid integer
         */
        public static function integer($value, bool $strict = false): bool
        {
            return V::integer($value, $strict);
        }
        /**
         * Checks for a valid IP address
         */
        public static function ip($value): bool
        {
            return V::ip($value);
        }
        /**
         * Checks for valid json
         */
        public static function json($value): bool
        {
            return V::json($value);
        }
        /**
         * Checks if the value is lower than the second value
         */
        public static function less($value, float $max): bool
        {
            return V::less($value, $max);
        }
        /**
         * Checks if the value matches the given regular expression
         */
        public static function match($value, string $pattern): bool
        {
            return V::match($value, $pattern);
        }
        /**
         * Checks if the value does not exceed the maximum value
         */
        public static function max($value, float $max): bool
        {
            return V::max($value, $max);
        }
        /**
         * Checks if the value is higher than the minimum value
         */
        public static function min($value, float $min): bool
        {
            return V::min($value, $min);
        }
        /**
         * Checks if the number of characters in the value equals or is below the given maximum
         */
        public static function maxLength(?string $value, $max): bool
        {
            return V::maxLength($value, $max);
        }
        /**
         * Checks if the number of characters in the value equals or is greater than the given minimum
         */
        public static function minLength(?string $value, $min): bool
        {
            return V::minLength($value, $min);
        }
        /**
         * Checks if the number of words in the value equals or is below the given maximum
         */
        public static function maxWords(?string $value, $max): bool
        {
            return V::maxWords($value, $max);
        }
        /**
         * Checks if the number of words in the value equals or is below the given maximum
         */
        public static function minWords(?string $value, $min): bool
        {
            return V::minWords($value, $min);
        }
        /**
         * Checks if the first value is higher than the second value
         */
        public static function more($value, float $min): bool
        {
            return V::more($value, $min);
        }
        /**
         * Checks that the given string does not contain the second value
         */
        public static function notContains($value, $needle): bool
        {
            return V::notContains($value, $needle);
        }
        /**
         * Checks that the given value is not empty
         */
        public static function notEmpty($value): bool
        {
            return V::notEmpty($value);
        }
        /**
         * Checks that the given value is not in the given list of values
         */
        public static function notIn($value, $notIn): bool
        {
            return V::notIn($value, $notIn);
        }
        /**
         * Checks for a valid number / numeric value (float, int, double)
         */
        public static function num($value): bool
        {
            return V::num($value);
        }
        /**
         * Checks if the value is present
         */
        public static function required($value, $array = null): bool
        {
            return V::required($value, $array);
        }
        /**
         * Checks that the first value equals the second value
         */
        public static function same($value, $other, bool $strict = false): bool
        {
            return V::same($value, $other, $strict);
        }
        /**
         * Checks that the value has the given size
         */
        public static function size($value, $size, $operator = '=='): bool
        {
            return V::size($value, $size, $operator);
        }
        /**
         * Checks that the string starts with the given start value
         */
        public static function startsWith(string $value, string $start): bool
        {
            return V::startsWith($value, $start);
        }
        /**
         * Checks for a valid unformatted telephone number
         */
        public static function tel($value): bool
        {
            return V::tel($value);
        }
        /**
         * Checks for valid time
         */
        public static function time($value): bool
        {
            return V::time($value);
        }
        /**
         * Checks for a valid Url
         */
        public static function url($value): bool
        {
            return V::url($value);
        }
        /**
         * Checks for a valid Uuid, optionally for specific model type
         */
        public static function uuid(string $value, ?string $type = null): bool
        {
            return V::uuid($value, $type);
        }
    }
}

namespace 
{
    class Collection extends \Kirby\Cms\Collection {}
    class File extends \Kirby\Cms\File {}
    class Files extends \Kirby\Cms\Files {}
    class Find extends \Kirby\Cms\Find {}
    class Helpers extends \Kirby\Cms\Helpers {}
    class Html extends \Kirby\Cms\Html {}
    class kirby extends \Kirby\Cms\App {}
    class Page extends \Kirby\Cms\Page {}
    class Pages extends \Kirby\Cms\Pages {}
    class Pagination extends \Kirby\Cms\Pagination {}
    class R extends \Kirby\Cms\R {}
    class Response extends \Kirby\Cms\Response {}
    class S extends \Kirby\Cms\S {}
    class Sane extends \Kirby\Sane\Sane {}
    class Site extends \Kirby\Cms\Site {}
    class Structure extends \Kirby\Cms\Structure {}
    class Url extends \Kirby\Cms\Url {}
    class User extends \Kirby\Cms\User {}
    class Users extends \Kirby\Cms\Users {}
    class Visitor extends \Kirby\Cms\Visitor {}
    class Field extends \Kirby\Content\Field {}
    class Data extends \Kirby\Data\Data {}
    class Json extends \Kirby\Data\Json {}
    class Yaml extends \Kirby\Data\Yaml {}
    class Asset extends \Kirby\Filesystem\Asset {}
    class Dir extends \Kirby\Filesystem\Dir {}
    class F extends \Kirby\Filesystem\F {}
    class Mime extends \Kirby\Filesystem\Mime {}
    class Database extends \Kirby\Database\Database {}
    class Db extends \Kirby\Database\Db {}
    class ErrorPageException extends \Kirby\Exception\ErrorPageException {}
    class Cookie extends \Kirby\Http\Cookie {}
    class Header extends \Kirby\Http\Header {}
    class Remote extends \Kirby\Http\Remote {}
    class Dimensions extends \Kirby\Image\Dimensions {}
    class Panel extends \Kirby\Panel\Panel {}
    class Snippet extends \Kirby\Template\Snippet {}
    class Slot extends \Kirby\Template\Slot {}
    class A extends \Kirby\Toolkit\A {}
    class c extends \Kirby\Toolkit\Config {}
    class Config extends \Kirby\Toolkit\Config {}
    class Escape extends \Kirby\Toolkit\Escape {}
    class I18n extends \Kirby\Toolkit\I18n {}
    class Obj extends \Kirby\Toolkit\Obj {}
    class Str extends \Kirby\Toolkit\Str {}
    class Tpl extends \Kirby\Toolkit\Tpl {}
    class V extends \Kirby\Toolkit\V {}
    class Xml extends \Kirby\Toolkit\Xml {}
}
