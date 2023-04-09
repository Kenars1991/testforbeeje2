<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
if($_SESSION['tip']=='')
{
$url = WEB_URL.'/admin';
$val = 'Войти';
}
elseif($_SESSION['tip']=='admin' || $_SESSION['tip'] == 'user')
{
$url = WEB_URL.'/admin/index.php?mod=index&f=logout';
$val = 'Выйти';

}
?>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
              <a class="dropdown-item" href="<?php echo $url; ?>">
                <i class="ti-power-off text-primary"></i>
                <?php echo $val; ?>
              </a>
          </li>
        </ul>