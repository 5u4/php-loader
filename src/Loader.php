<?php

namespace Senhung\Loader;

class Loader
{
    /**
     * Load files in the given directory and the files under its folders with maximum depth
     *
     * @param string $dir initial directory to be included
     * @param int $depth depth of the maximum search
     * @param array $extensions array of file extensions that should be included
     */
    public function load(string $dir, int $depth = 6, array $extensions = ['php'])
    {
        /* Stop when search to maximum depth */
        if ($depth == 0) {
            return;
        }

        /* Get all files and folders under current directory */
        $filesAndFolders = glob($dir . DIRECTORY_SEPARATOR . "*");

        /* Go through each item */
        foreach ($filesAndFolders as $path) {
            /* If is directory, search files under its directory */
            if (is_dir($path)) {
                $this->load($path, $depth - 1);
            }

            /* If the file extension is in extensions list; require it */
            elseif (in_array(pathinfo($path, PATHINFO_EXTENSION), $extensions)) {
                require_once $path;
            }
        }
    }
}
