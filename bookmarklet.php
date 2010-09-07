<?php
   /**
Create a bookmarklet link.

Author:
         Mitsuteru Nakao PhD
Contact:
         mitsuteru.nakao@gmail.com
         mn@dbcls.jp
Usage:
         <bookmarklet title="This is a bookmarklet" href="javascript: ..."/>

         The bookmarklet itself in hte href attribute should be encoded.         
   **/


$wgExtensionCredits['parserhook'][] = array(
        'name'        => 'bookmarklet',
        'version'     => '0.1',
        'author'      => 'Mitsuteru Nakao',
        'url'         => 'http://www.mediawiki.org/wiki/Extension:bookmarklet',
        'description' => 'Create a javascript bookmarklet link',
                                            );

$wgExtensionFunctions[] = 'wfBookmarkletExtension';

function wfBookmarkletExtension() {
    global $wgParser;
    $wgParser->setHook( "bookmarklet", "renderBookmarklet" );
}

function renderBookmarklet( $input, $args, $parser ) {
  $href = trim($args['href']);
  if(!isset($args['title'])) {
    $title = 'Bookmarklet';
  } else {
    $title = trim($args['title']);
  }
  $html  = '<a href="' . $href . '">' . $title . "</a>";
  return $html;
}
?>
