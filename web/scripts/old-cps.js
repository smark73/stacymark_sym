<script>
            $(document).ready(function(){
                    // content panel switcher
                    jcps.fader(300, '#switcher-panel');
                    //tabs and tab thumbs content
                    var TAB = {};
                    TAB.clickChange = function (_tabCont, _tabNum){
                            _tabCont.removeClass('invisible').addClass('visible');
                            //remove 2nd line below into 1 line here
                            _tabNum = parseInt(_tabNum);
                            switch (_tabNum) {
                                    case 1 :
                                            $('#tab2-content, #tab3-content, #tab4-content').removeClass('visible').addClass('invisible');
                                            $('#tab1 li').removeClass().addClass('tabON');
                                            $('#tab2 li, #tab3 li, #tab4 li').removeClass().addClass('tabHOV');
                                            break;
                                    case 2 :
                                            $('#tab1-content, #tab3-content, #tab4-content').removeClass('visible').addClass('invisible');
                                            $('#tab2 li').removeClass().addClass('tabON');
                                            $('#tab1 li, #tab3 li, #tab4 li').removeClass().addClass('tabHOV');
                                            break;
                                    case 3 :
                                            $('#tab1-content, #tab2-content, #tab4-content').removeClass('visible').addClass('invisible');
                                            $('#tab3 li').removeClass().addClass('tabON');
                                            $('#tab1 li, #tab2 li, #tab4 li').removeClass().addClass('tabHOV');
                                            break;
                                    case 4 :
                                            $('#tab1-content, #tab2-content, #tab3-content').removeClass('visible').addClass('invisible');
                                            $('#tab4 li').removeClass().addClass('tabON');
                                            $('#tab1 li, #tab2 li, #tab3 li').removeClass().addClass('tabHOV');
                                            break;
                            }
                            //_tabCont.toggleClass('visible invisible');
                    };
                    $('.tab1').click(function(){
                            var _tabNum = 1;
                            var _tabCont1 = $('#tab1-content');
                            TAB.clickChange(_tabCont1, _tabNum);
                    });
                    $('.tab2').click(function(){
                            var _tabNum = 2;
                            var _tabCont2 = $('#tab2-content');
                            TAB.clickChange(_tabCont2, _tabNum);
                    });
                    $('.tab3').click(function(){
                            var _tabNum = 3;
                            var _tabCont3 = $('#tab3-content');
                            TAB.clickChange(_tabCont3, _tabNum);
                    });
                    $('.tab4').click(function(){
                            var _tabNum = 4;
                            var _tabCont4 = $('#tab4-content');
                            TAB.clickChange(_tabCont4, _tabNum);
                    });
                    $('.contactBtn').click(function(){
                            var $box = $('#contactform');
                            if ($box.height() > 0) {
                                    $box.animate({ height : 0, opacity : 0, bottom : 0 });
                            } else {
                                    $box.animate({ height: 220, opacity : 100, bottom : 100 });
                            }
                    });
                    // bind submit button to ajax fn
                    $('#contactform').bind('submit');
                    //form validator
                    jQuery(function() {		
                            var v = jQuery("#contactform").validate({
                                    rules: {
                                            name: "required",
                                            email: {
                                                    required: true,
                                                    email: true
                                            },
                                            comments: "required"
                                    },
                                    messages: {
                                            name: "*",
                                            email: "*",
                                            comments: "*"
                                    },
                                    submitHandler: function(){
                                            //ajax submit
                                            $.ajax({
                                                    type: "post",
                                                    url:    'form-send.php',
                                                    data:   $('#contactform').serialize(),
                                                    success: function(){
                                                            $('#contactform').html('<p style="margin:20px 0 0 -15px;text-align:center;font-size:18px;">Thank You!</p>');
                                                            var $box = $('#contactform');
                                                            $box.delay(1000).animate({ height : 0, opacity : 0, bottom : 0});
                                                    }
                                            });
                                            return false;
                                    }
                            });
                    });

            });
    </script>