<?php
ini_set( 'display_errors', '1' );
error_reporting( E_ALL ); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Download List!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center">Download List!</h1>

<div class="container">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">File Name</th>
            <th scope="col">File Size</th>
            <th scope="col">File Extension</th>
            <th scope="col">Last updated</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ( scandir( '.', SCANDIR_SORT_NONE ) as $key => $dir ): ?>
			<?php if ( $dir === '.' || $dir === '..' ): ?>
			<?php else: ?>
                <tr>
                    <th scope="row"><?= $key; ?></th>
                    <td><a href="/<?= $dir; ?>" download><?= $dir; ?> <img download style="cursor:pointer;" width="20"
                                                                           src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Download-Icon.png"></a>
                    </td>
                    <td><?= formatSizeUnits( filesize( $dir ) ); ?></td>


					<?php if ( get_file_extension( $dir ) === 'exe' ): ?>
                        <td><img width="20"
                                 src="https://maxcdn.icons8.com/office/PNG/512/Files/exe-512.png"><?= get_file_extension( $dir ); ?>
                        </td>
					<?php elseif ( get_file_extension( $dir ) === 'png' ): ?>
                        <td><img width="20"
                                 src="http://www.iconhot.com/icon/png/file-icons-vs-2/256/png-36.png"><?= get_file_extension( $dir ); ?>
                        </td>

					<?php elseif ( get_file_extension( $dir ) === 'php' ): ?>
                        <td><img width="20"
                                 src="http://anques.com/wp-content/uploads/2017/03/icon-php1-1.png"><?= get_file_extension( $dir ); ?>
                        </td>

					<?php elseif ( get_file_extension( $dir ) === 'msi' ): ?>
                        <td><img width="20" src="https://i.stack.imgur.com/ZE6c2.png"><?= get_file_extension( $dir ); ?>
                        </td>

					<?php elseif ( get_file_extension( $dir ) === 'zip' ): ?>
                        <td><img width="20"
                                 src="http://www.freeiconspng.com/uploads/file-zip-icon-png-17.png"><?= get_file_extension( $dir ); ?>
                        </td>

					<?php elseif ( get_file_extension( $dir ) === 'jpg' ): ?>
                        <td><img width="20"
                                 src="http://icons.iconarchive.com/icons/zerode/plump/256/Filetype-jpg-icon.png"><?= get_file_extension( $dir ); ?>
                        </td>
					<?php elseif ( get_file_extension( $dir ) === 'ini' ): ?>
                        <td><img width="20"
                                 src="http://downloadicons.net/sites/default/files/ini-file-icon-96066.png"><?= get_file_extension( $dir ); ?>
                        </td>
					<?php else: ?>
                        <td><img width="20" src=""><?= get_file_extension( $dir ); ?></td>
					<?php endif; ?>
                    <td><?= gmdate( 'M d, D Y, h:m	:s a', filemtime( $dir ) ); ?></td>
                </tr>
			<?php endif; ?>
		<?php endforeach; ?>
        </tbody>
    </table>

	<?php
	function formatSizeUnits( $bytes ) {
		if ( $bytes >= 1073741824 ) {
			$bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
		} elseif ( $bytes >= 1048576 ) {
			$bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
		} elseif ( $bytes >= 1024 ) {
			$bytes = number_format( $bytes / 1024, 2 ) . ' KB';
		} elseif ( $bytes > 1 ) {
			$bytes .= ' bytes';
		} elseif ( $bytes === 1 ) {
			$bytes .= ' byte';
		} else {
			$bytes = '0 bytes';
		}
		return $bytes;
	}


	function get_file_extension( $fileName ) {
		/*
		 * "." for extension should be available and not be the first character
		 * so position should not be false or 0.
		 */
		$lastDotPos = strrpos( $fileName, '.' );
		if ( ! $lastDotPos ) {
			return false;
		}
		return substr( $fileName, $lastDotPos + 1 );
	}

	?>
    <footer class="text-center">
       Nerd mode: On<input type="radio" value="true" name="nerd">
       Off<input type="radio" checked value="false" name="nerd"> |
        <small>Made by <a target="_blank" href="//github.com/gopalindians">@gopalindians</a></small>
    </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>