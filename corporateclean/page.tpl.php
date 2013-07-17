<!-- #header -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css'>

<div id="wrapper">
<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="http://ashtech.gotdns.com/usermanagement/index.php">VODOAT</a></h1>
			</div>
			<div id="menu">
				
                  
					
			<?php if (module_exists('i18n_menu')) {
             
			 $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
            } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
            }
            print drupal_render($main_menu_tree);
			
             ?>
				
			</div><!-- EOF menu-->
			 <!-- #header-inside-right -->    
        
    
		</div><!-- EOF header-->
		<div id="search">
		<?php print render($page['search_area']); ?>
		</div>
		
</div>
</div>



<!-- #banner -->

<div id="banner">

	<?php print render($page['banner']); ?>
	
    <?php if (theme_get_setting('slideshow_display','corporateclean')): ?>
    
    <?php if ($is_front): ?>
    
    <!-- #slideshow -->
    <div id="slideshow">
    
        <!--slider-item-->
        <div class="slider-item">
            <div class="content container_12">
            	<div class="grid_12">
                
                <!--slider-item content-->
                <div style="float:left; padding:0 30px 0 0;">
                <img class="masked" src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/mockup/slide-1.jpg"/>
                </div>
                <h2>Sample product name</h2>
                <strong>General</strong><br/>
                <em>Client name</em><br/>
                <br/>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. What the fuck do you want to see? 
                <div style="display:block; padding:30px 0 10px 0;"><a class="more" href="#">Tell me more</a></div>
               
			   <!--EOF:slider-item content-->

                </div>
            </div>
        </div>
        <!--EOF:slider-item-->
        
        <!--slider-item-->
        <div class="slider-item">
            <div class="content container_12">
            	<div class="grid_12">
                
                <!--slider-item content-->
                <div style="float:right; padding:0 0 0 30px;">
                <img class="masked" src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/mockup/slide-2.jpg"/>
                </div>
                <h2>Sample service name</h2>
                <strong>General</strong><br/>
                <em>Client name</em><br/>
                <br/>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                <div style="display:block; padding:30px 0 10px 0;"><a class="more" href="#">Tell me more</a></div>
                <!--EOF:slider-item content-->
                
				</div>
            </div>
        </div>
        <!--EOF:slider-item-->
        
        <!--slider-item-->
        <div class="slider-item">
            <div class="content container_12">
            	<div class="grid_12">
                
                <!--slider-item content-->
                <h2>Sample product name</h2>
                <strong>General</strong><br/>
                <em>Client name</em><br/>
                <br/>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                <div style="display:block; padding:30px 0 10px 0;"><a class="more" href="#">Tell me more</a></div>
                <!--EOF:slider-item content-->
                
				</div>
            </div>
        </div>
        <!--EOF:slider-item-->
        
        <!--slider-item-->
        <div class="slider-item">
            <div class="content container_12">
            	<div class="grid_12">
                
                <!--slider-item content-->
                <img class="masked" src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/mockup/slide-3.jpg"/>
                <!--EOF:slider-item content-->
				</div>
            </div>
        </div>
        <!--EOF:slider-item-->
    
    </div>
    <!-- EOF: #slideshow -->
    
    <!-- #slider-controls-wrapper -->
    <div id="slider-controls-wrapper">
        <div id="slider-controls" class="container_12">
            <ul id="slider-navigation">
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        </div>
    </div>
    <!-- EOF: #slider-controls-wrapper -->
    
    <?php endif; ?>
    
	<?php endif; ?>  

</div><!-- EOF: #banner -->



    <div class="content container_12">
            	<div class="grid_12">
    
       
        
       
            <?php if (theme_get_setting('breadcrumb_display','corporateclean')): print $breadcrumb; endif; ?>
                     
            
			
            
            <?php print render($page['content']); ?>
            
            <?php print $feed_icons; ?>
            
       
        
        
    </div><!-- EOF: #content-inside -->
	</div>


<!-- #footer -->    
<div id="footer">
	<!-- #footer-inside -->
    <div id="footer-inside" class="container_12 clearfix">
    
        <div class="footer-area grid_4">
        <?php print render($page['footer_first']); ?>
        </div><!-- EOF: .footer-area -->
        
        <div class="footer-area grid_4">
        <?php print render($page['footer_second']); ?>
        </div><!-- EOF: .footer-area -->
        
        <div class="footer-area grid_4">
        <?php print render($page['footer_third']); ?>
        </div><!-- EOF: .footer-area -->
       
    </div><!-- EOF: #footer-inside -->

</div><!-- EOF: #footer -->

<!-- #footer-bottom -->    
<div id="footer-bottom">
	<!-- #footer-bottom-inside --> 
    <div id="footer-bottom-inside" class="container_12 clearfix">
    	<!-- #footer-bottom-left --> 
    	<div id="footer-bottom-left" class="grid_8">
        
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('secondary-menu', 'links', 'clearfix')))); ?>
            
            <?php print render($page['footer']); ?>
            
        </div>
    	<!-- #footer-bottom-right --> 
        <div id="footer-bottom-right" class="grid_4">
        
        	<?php print render($page['footer_bottom_right']); ?>
        
        </div><!-- EOF: #footer-bottom-right -->
       
    </div><!-- EOF: #footer-bottom-inside -->

</div><!-- EOF: #footer -->