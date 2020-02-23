
<?php
if (isset($_GET['page']))
{
    switch ($_GET['page']) {
        case 'about':
            include_once ('pages/about.php');
            break;

        case 'album':
            include_once ('pages/album.php');
            break;

        case 'album-item':
            include_once ('pages/album-item.php');
            break;
        
        case 'home':
        default:
            include_once ('pages/home.php');
            break;
    }
}