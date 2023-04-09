<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$s_tip = $promoverum->session('tip','no');
if($s_tip=='')
{
$url = WEB_URL.'/admin';
$val = 'Войти';
}
elseif($s_tip=='admin' || $s_tip == 'user')
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