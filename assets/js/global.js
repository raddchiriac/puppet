require.config({
  paths: {
    "jquery": "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min"
  }
});

require(['jquery', 'lib/jQuery.ajaxForm'],
    function   ($, ajaxForm) {
    //jQuery, canvas and the app/sub module are all
    //loaded and can be used here now.
});