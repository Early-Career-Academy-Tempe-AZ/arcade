<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$CI = & get_instance();
function __is_selected($href)
{
    
    return base_url($href) == get_url();
}
function __parse_array($menu_item)
{
        $count = 0;
        foreach ($menu_item as $title => $href)
        {
            switch (is_array($href))
            {
            case TRUE:
                __parse_array($href);
                break;
            case FALSE:
                switch ($count)
                {
                    case 0:
                        echo "<li class='has-sub ".($count == (count($menu_item)-1)? ' last':'' ). (__is_selected($href)? ' active':'')   ."'>". anchor($href, $title);
                        break;
                    case 1:
                        echo "<ul><li class ='". ($count == (count($menu_item)-1)? ' last':'' ). (__is_selected($href)? ' active':'')  . "'>" .anchor($href, $title) . '</li>';
                        break;
                     default:
                        echo "<li class='". ($count == (count($menu_item)-1)? ' last':'' ). (__is_selected($href)? ' active':'') ."'>" . anchor($href,$title). '</li>';
                }
                $count++;
            }
        }
        
        echo '</ul></li>';
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <base href='<?php echo base_url(); ?>'>
        <meta name='application-name' content='<?php echo $application_name; ?>' />
        <meta name='keywords' content='<?php echo $keywords; ?>'/>
        <meta name='description' content='<?php echo $description; ?>'/>
        <meta name='author' content='Taylor M. Hicks'/>
        <meta charset="UTF-8"/>
            <?php 
              if( isset($stylesheets)) 
              {
                foreach($stylesheets as $stylesheet)
                {
                    echo "<link rel='stylesheet' type='text/css' href='$stylesheet'/>";
                }
              }
              if( isset($javascript_head))
              {
                  foreach ($javascript_head as $javascript)
                  {
                      echo "<script type='text/javascript' src='$javascript'/>";
                  }
              }
              if( isset($javascript_ajax))
              {
                  foreach ($javascript_ajax as $javascript)
                  {
                      echo "<script type='text/javascript' src='$javascript' async='true'/>";
                  }
              }
            ?>
    </head>
    <body>
        <div id='page-wrapper'>
        <header>
        </header>
        <?php if (isset($menu)): ?>
        <nav id="cssmenu">
            <ul>
                <?php
                $major_count = 0; 
                foreach($menu as $title => $href)
                    {
                        switch (is_array($href))
                        {
                            case FALSE:
                                echo "<li class='". (__is_selected($href)? ' active':'').($major_count == count($menu)-1? ' last':'' )."'>". anchor($href, $title) .'</li>';
                              break;
                            case TRUE:
                                __parse_array($href);
                                break;
                        }
                    }
                ?>
            </ul>
        </nav>
        <?php endif; ?>
        <main id='main wrapper'>
            <section class='main <?php if(isset($sidebar)) echo'with-sidebar';?>'>
                <?php if(isset($main)) $CI->load->view($main);?>
            </section>
            <?php
            if(isset($sidebar))
            {
                echo '<aside>';
                $CI->load->view($sidebar);
                echo '</aside>';
            }
            ?>
            <div class='clearfix'></div>
        </main>
        <footer>

        </footer>
    </div>
    </body>
</html>