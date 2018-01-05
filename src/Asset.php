<?php
/**
 * PHP library for handling styles and scripts; Add, minify, unify and print.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2018 (c) Josantonius - PHP-Assets
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Asset
 * @since     1.0.0
 */
namespace Josantonius\Asset;

use Josantonius\Json\Json;

/**
 * Load assets resources.
 *
 * @since 1.0.0
 */
class Asset
{
    /**
     * Settings to register styles or scripts.
     *
     * @since 1.1.5
     *
     * @var array
     */
    public static $data = [];
    /**
     * Unique identifier for unified file.
     *
     * @since 1.1.5
     *
     * @var string
     */
    protected static $id;

    /**
     * Files saved information.
     *
     * @since 1.1.5
     *
     * @var array
     */
    protected static $files;

    /**
     * True if file is outdated.
     *
     * @since 1.1.5
     *
     * @var bool
     */
    protected static $changes = false;

    /**
     * Unify files.
     *
     * @since 1.1.5
     *
     * @var string|bool
     */
    protected static $unify = false;

    /**
     * Minify files.
     *
     * @since 1.1.5
     *
     * @var bool
     */
    protected static $minify = false;

    /**
     * Asset templates.
     *
     * @var array → asset templates
     */
    protected static $templates = [
        'script' => "<script%s src='%s'></script>\n",
        'style' => "<link rel='stylesheet' href='%s'>\n",
    ];

    /**
     * Add scripts or styles.
     *
     * @since 1.1.5
     *
     * @param string $type → script|style
     * @param array  $data → settings
     *
     *        string $data['name']    → unique id        (required)
     *        string $data['url']     → url to file      (required)
     *        string $data['version'] → version          (optional)
     *        bool   $data['footer']  → attach in footer (optional-scripts)
     *        array  $data['attr']    → attribute        (optional-scripts)
     *
     * @return bool
     */
    public static function add($type, $data = [])
    {
        return self::setParams($type, $data);
    }

    /**
     * Output stylesheet.
     *
     * @since 1.1.5
     *
     * @param string $output → output for styles
     *
     * @return string|false → output or false
     */
    public static function outputStyles($output = '')
    {
        self::lookIfProcessFiles('style', 'header');

        $template = self::$templates['style'];
        $styles = self::$data['style']['header'];

        foreach ($styles as $value) {
            $output .= sprintf(
                $template,
                $value['url']
            );
        }

        self::$data['style']['header'] = [];

        return ! empty($output) ? $output : false;
    }

    /**
     * Output scripts.
     *
     * @since 1.1.5
     *
     * @param string $place  → header|footer
     * @param string $output → output for scripts
     *
     * @return string|false → output or false
     */
    public static function outputScripts($place, $output = '')
    {
        self::lookIfProcessFiles('script', $place);

        $template = self::$templates['script'];
        $scripts = self::$data['script'][$place];

        foreach ($scripts as $value) {
            $output .= sprintf(
                $template,
                $value['attr'],
                $value['url']
            );
        }

        self::$data['script'][$place] = [];

        return ! empty($output) ? $output : false;
    }

    /**
     * Check if a particular style or script has been added.
     *
     * @since 1.1.5
     *
     * @param string $type → script|style
     * @param string $name → script or style name
     *
     * @return bool
     */
    public static function isAdded($type, $name)
    {
        if (isset(self::$data[$type]['header'][$name])) {
            return true;
        } elseif (isset(self::$data[$type]['footer'][$name])) {
            return true;
        }

        return false;
    }

    /**
     * Sets whether to merge the content of files into a single file.
     *
     * @since 1.1.5
     *
     * @param string $uniqueID → unique identifier for unified file
     * @param mixed  $params   → path urls
     * @param bool   $minify   → minimize file content
     *
     * @return bool true
     */
    public static function unify($uniqueID, $params, $minify = false)
    {
        self::$id = $uniqueID;
        self::$unify = $params;
        self::$minify = $minify;

        return true;
    }

    /**
     * Remove before script or style have been registered.
     *
     * @since 1.0.1
     *
     * @param string $type → script|style
     * @param string $name → script or style name
     *
     * @return bool true
     */
    public static function remove($type, $name)
    {
        if (isset(self::$data[$type]['header'][$name])) {
            unset(self::$data[$type]['header'][$name]);

            return true;
        } elseif (isset(self::$data[$type]['footer'][$name])) {
            unset(self::$data[$type]['footer'][$name]);

            return true;
        }

        return false;
    }

    /**
     * Set parameters.
     *
     * @since 1.1.5
     *
     * @param string $type → script|style
     * @param array  $data → settings
     *
     * @return bool
     */
    protected static function setParams($type, $data)
    {
        if (! isset($data['name'], $data['url'])) {
            return false;
        }

        if ($type === 'script') {
            $data['attr'] = isset($data['attr']) ? " {$data['attr']}" : '';
        }

        $data['version'] = isset($data['version']) ? $data['version'] : '0';

        $place = (isset($data['footer']) && $data['footer']) ? 'F' : 'H';

        $place = ($place === 'F') ? 'footer' : 'header';

        self::$data[$type][$place][$data['name']] = $data;

        return true;
    }

    /**
     * Look whether to process files to minify or unify files.
     *
     * @since 1.1.5
     *
     * @param string $type  → script|style
     * @param string $place → header|footer
     *
     * @return bool true
     */
    protected static function lookIfProcessFiles($type, $place)
    {
        if (is_string(self::$unify) || isset(self::$unify[$type . 's'])) {
            return self::unifyFiles(
                self::prepareFiles($type, $place)
            );
        }
    }

    /**
     * Check files and prepare paths and urls.
     *
     * @since 1.1.5
     *
     * @param string $type  → script|style
     * @param string $place → header|footer
     *
     * @return array|false → paths, urls and outdated files
     */
    protected static function prepareFiles($type, $place)
    {
        self::getProcessedFiles();

        $params['type'] = $type;
        $params['place'] = $place;
        $params['routes'] = self::getRoutesToFolder($type);

        foreach (self::$data[$type][$place] as $id => $file) {
            $path = self::getPathFromUrl($file['url']);

            $params['urls'][$id] = $file['url'];
            $params['files'][$id] = basename($file['url']);
            $params['paths'][$id] = $path;

            if (is_file($path) && self::isModifiedFile($path)) {
                unset($params['urls'][$id]);
                continue;
            }

            $path = $params['routes']['path'] . $params['files'][$id];

            if (is_file($path)) {
                if (self::isModifiedHash($file['url'], $path)) {
                    continue;
                }
                $params['paths'][$id] = $path;
            } elseif (self::isExternalUrl($file['url'])) {
                continue;
            }

            unset($params['urls'][$id]);
        }

        return $params;
    }

    /**
     * Get path|url to the minimized file.
     *
     * @since 1.1.5
     *
     * @param string $type → scripts|styles
     *
     * @return array → url|path to minimized file
     */
    protected static function getRoutesToFolder($type)
    {
        $type = $type . 's';

        $url = isset(self::$unify[$type]) ? self::$unify[$type] : self::$unify;

        return ['url' => $url, 'path' => self::getPathFromUrl($url)];
    }

    /**
     * Obtain information from processed files.
     *
     * @since 1.1.5
     */
    protected static function getProcessedFiles()
    {
        self::$files = Json::fileToArray(__DIR__ . '/files.jsond');
    }

    /**
     * Get path from url.
     *
     * @since 1.1.5
     *
     * @param string $url → file url
     *
     * @return string → filepath
     */
    protected static function getPathFromUrl($url)
    {
        return $_SERVER['DOCUMENT_ROOT'] . parse_url($url, PHP_URL_PATH);
    }

    /**
     * Check if the file was modified.
     *
     * @since 1.1.5
     *
     * @param string $filepath → path of the file
     *
     * @return bool
     */
    protected static function isModifiedFile($filepath)
    {
        $actual = filemtime($filepath);
        $last = isset(self::$files[$filepath]) ? self::$files[$filepath] : 0;

        if ($actual !== $last) {
            self::$files[$filepath] = $actual;

            return self::$changes = true;
        }

        return false;
    }

    /**
     * Check if it matches the file hash.
     *
     * @since 1.1.5
     *
     * @param string $url  → external url
     * @param string $path → internal file path
     *
     * @return bool
     */
    protected static function isModifiedHash($url, $path)
    {
        if (self::isExternalUrl($url)) {
            if (sha1_file($url) !== sha1_file($path)) {
                return self::$changes = true;
            }
        }

        return false;
    }

    /**
     * Check if it's an external file.
     *
     * @since 1.1.5
     *
     * @param string $url → file url
     *
     * @return bool
     */
    protected static function isExternalUrl($url)
    {
        return strpos($url, $_SERVER['SERVER_NAME']) === false;
    }

    /**
     * Unify files.
     *
     * @since 1.1.5
     *
     * @param array  $params → paths and urls of files to unify
     * @param string $data   → initial string
     *
     * @return bool true
     */
    protected static function unifyFiles($params, $data = '')
    {
        $type = $params['type'];
        $place = $params['place'];
        $routes = $params['routes'];
        $ext = ($type == 'style') ? '.css' : '.js';
        $hash = sha1(implode('', $params['files']));
        $minFile = $routes['path'] . $hash . $ext;

        if (! is_file($minFile) || self::$changes == true) {
            foreach ($params['paths'] as $id => $path) {
                if (isset($params['urls'][$id])) {
                    $url = $params['urls'][$id];
                    $path = $routes['path'] . $params['files'][$id];
                    $data .= self::saveExternalFile($url, $path);
                }
                $data .= file_get_contents($path);
            }
            $data = (self::$minify) ? self::compressFiles($data) : $data;

            self::saveFile($minFile, $data);
        }

        self::setProcessedFiles();

        return self::setNewParams($type, $place, $hash, $routes['url'], $ext);
    }

    /**
     * Save external file.
     *
     * @since 1.1.5
     *
     * @param string $url  → external url
     * @param string $path → internal file path
     *
     * @return string → file content or empty
     */
    protected static function saveExternalFile($url, $path)
    {
        if ($data = file_get_contents($url)) {
            return (self::saveFile($path, $data)) ? $data : '';
        }

        return '';
    }

    /**
     * File minifier.
     *
     * @since 1.1.5
     *
     * @author powerbuoy (https://github.com/powerbuoy)
     *
     * @param string $content → file content
     *
     * @return array → unified parameters
     */
    protected static function compressFiles($content)
    {
        $var = ["\r\n", "\r", "\n", "\t", '  ', '    ', '    '];

        $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);

        $content = str_replace($var, '', $content);
        $content = str_replace('{ ', '{', $content);
        $content = str_replace(' }', '}', $content);
        $content = str_replace('; ', ';', $content);

        return $content;
    }

    /**
     * Save file.
     *
     * @since 1.1.5
     *
     * @param string $path → internal file path
     * @param string $data → file content
     *
     * @return bool
     */
    protected static function saveFile($path, $data)
    {
        self::createDirectoryFromFile($path);

        return file_put_contents($path, $data);
    }

    /**
     * Create directory where external/unified/minimized files will be saved.
     *
     * @since 1.1.5
     *
     * @param string $url → path of the file
     *
     * @return bool
     */
    protected static function createDirectoryFromFile($file)
    {
        $path = dirname($file);

        if (! is_dir($path)) {
            return mkdir($path, 0777, true);
        }

        return true;
    }

    /**
     * Set information from processed files.
     *
     * @since 1.1.5
     */
    protected static function setProcessedFiles()
    {
        if (self::$changes) {
            Json::arrayToFile(self::$files, __DIR__ . '/files.jsond');
        }
    }

    /**
     * Set new parameters for the unified file.
     *
     * @since 1.1.5
     *
     * @param string $type      → script|style
     * @param string $place     → header|footer
     * @param string $hash      → filename hash
     * @param string $url       → path url
     * @param string $extension → file extension
     *
     * @return bool true
     */
    protected static function setNewParams($type, $place, $hash, $url, $ext)
    {
        $data = [
            'name' => self::$id,
            'url' => $url . $hash . $ext,
            'attr' => self::unifyParams($type, 'attr'),
            'version' => self::unifyParams($type, 'version', '1.0.0'),
        ];

        if ($type === 'script') {
            $data['footer'] = self::unifyParams($type, 'footer', false);
        }

        self::$data[$type][$place] = [$data['name'] => $data];

        return true;
    }

    /**
     * Obtain all the parameters of a particular field and unify them.
     *
     * @since 1.1.5
     *
     * @param string $type    → script|style
     * @param string $field   → field to unify
     * @param string $default → default param
     *
     * @return array → unified parameters
     */
    protected static function unifyParams($type, $field, $default = '')
    {
        $data = array_column(self::$data[$type], $field);

        switch ($field) {
            case 'attr':
            case 'footer':
            case 'version':
                foreach ($data as $value) {
                    if ($data[0] !== $value) {
                        return $default;
                    }
                }
                return (isset($data[0]) && $data[0]) ? $data[0] : $default;
                
            default:
                $params = [];
                foreach ($data as $value) {
                    $params = array_merge($params, $value);
                }

                return array_unique($params);
        }
    }
}
