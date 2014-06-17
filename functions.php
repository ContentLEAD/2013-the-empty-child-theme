<?php
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentythirteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on blog and blog posts in the sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header', 'twentythirteen' ),
		'id'            => 'sidebar-3',
		'description'   => 'This is located in the header area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'twentythirteen' ),
		'id'            => 'sidebar-4',
		'description'   => 'Appears on pages in the sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
?>