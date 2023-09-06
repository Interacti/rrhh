<?php

/**
 * Create a Directory Map
 *
 * Reads the specified directory and builds an array
 * representation of it.  Sub-folders contained with the
 * directory will be mapped as well.
 *
 * @access	public
 * @param	string	path to source
 * @param	int		depth of directories to traverse (0 = fully recursive, 1 = current dir, etc)
 * @return	array
 */
if (!function_exists('fileinfo')) {

    function fileinfo($source_dir, $directory_depth = 0, $hidden = FALSE) {

        echo $source_dir;

        if ($fp = @opendir($source_dir)) {
            $filedata = array();
            $new_depth = $directory_depth - 1;
            $source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

            while (FALSE !== ($file = readdir($fp))) {
                // Remove '.', '..', and hidden files [optional]
                if (!trim($file, '.') OR ( $hidden == FALSE && $file[0] == '.')) {
                    continue;
                }

                if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir . $file)) {
                    $filedata[$file] = fileinfo($source_dir . $file . DIRECTORY_SEPARATOR, $new_depth, $hidden);
                } else {
                    $fn = explode('.', $file);
                    $fnm = explode('_', $fn[0]);
                    if (!empty($fn[1])) {
                        $filedata[] = array(
                            'name' => $file,
                            'serial' => md5($file),
                            'year' => $fnm[0],
                            'month' => $fnm[1],
                            'key' => $fnm[2],
                            'date_add' => date("Y-m-d H:i:s."),
                        );
                    }
                }
            }

            closedir($fp);
            return $filedata;
        }

        return FALSE;
    }

}

