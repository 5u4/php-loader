<?php

namespace Senhung\Loader;

class Loader
{
    /**
     * Load files in the given directory and the files under its folders with maximum depth
     *
     * @param string $dir initial directory to be included
     * @param int $depth depth of the maximum search
     * @param array $priority priority files needs to be loaded
     * @param array $extensions array of file extensions that should be included
     */
    public static function load(string $dir, int $depth = 6, array $priority = [], array $extensions = ['php'])
    {
        /* Stop when search to maximum depth */
        if ($depth == 0) {
            return;
        }

        /* Load Priority Files */
        foreach ($priority as $file) {
            self::load($file, 1, [], $extensions);
        }

        /* Get all files and folders under current directory */
        $filesAndFolders = glob($dir . DIRECTORY_SEPARATOR . "*");

        /* Go through each item */
        foreach ($filesAndFolders as $path) {
            /* If is directory, search files under its directory */
            if (is_dir($path)) {
                self::load($path, $depth - 1, [], $extensions);
            }

            /* If the file extension is in extensions list; require it */
            elseif (in_array(pathinfo($path, PATHINFO_EXTENSION), $extensions)) {
                require_once $path;
            }
        }
    }

    /**
     * Get all child classes of a class
     *
     * @param string|object $class
     * @return array
     */
    public static function getAllChildClasses($class): array
    {
        $type = gettype($class);
        $className = '';

        /* If input an object */
        if ($type == 'object') {
            $className = get_class($class);
        }

        /* If input a string */
        elseif ($type == 'string') {
            $className = $class;
        }

        $classes = [];

        /* Go through all classes */
        foreach (get_declared_classes() as $class) {
            if (is_subclass_of($class, $className)) {
                $classes[] = $class;
            }
        }

        return $classes;
    }
}
