<?php

namespace Roots\Sage;

use Roots\Sage\Config;
use Roots\Sage\Wrapper;
?>

<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<?php
do_action('get_header');
get_template_part('templates/header');
get_template_part('templates/page-header');
?>
<div class="wrap container-fluid" role="document">
    <div class="content row">
        <main class="main fullwidth" role="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
    </div><!-- /.content -->
</div><!-- /.wrap -->
<?php get_template_part('templates/footer'); ?>
</body>
</html>
