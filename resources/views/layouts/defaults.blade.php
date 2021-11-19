@include('layouts.partials._header')
@include('layouts.partials._navbar')
@include('layouts.partials._sidebar')


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        @yield('contents')
        @include('layouts.partials._footer')
    </div>
</div>
<script src="{{ URL::to('/') }}/vendors/scripts/defaults/core.js"></script>
<script src="{{ URL::to('/') }}/vendors/scripts/defaults/script.min.js"></script>
<script src="{{ URL::to('/') }}/vendors/scripts/defaults/process.js"></script>
<script src="{{ URL::to('/') }}/vendors/scripts/defaults/layout-settings.js"></script>
<script>
    // sidebar menu Active Class
    $('#accordion-menu').each(function(e) {
        // var vars = window.location.href.split("/").pop();
        var vars = window.location.href;
        var s = $(this).find('a[href="' + vars + '"]').addClass('active');
    });

    // sidebar menu accordion
    (function($) {
        $.fn.vmenuModule = function(option) {
            var obj,
                item;
            var options = $.extend({
                    Speed: 220,
                    autostart: true,
                    autohide: 1
                },
                option);
            obj = $(this);

            item = obj.find("ul").parent("li").children("a");
            item.attr("data-option", "off");

            item.unbind('click').on("click", function() {
                var a = $(this);
                if (options.autohide) {
                    a.parent().parent().find("a[data-option='on']").parent("li").children("ul").slideUp(
                        options.Speed / 1.2,
                        function() {
                            $(this).parent("li").children("a").attr("data-option", "off");
                            $(this).parent("li").removeClass("show");
                        })
                }
                if (a.attr("data-option") == "off") {
                    a.parent("li").children("ul").slideDown(options.Speed,
                        function() {
                            a.attr("data-option", "on");
                            a.parent('li').addClass("show");
                        });
                }
                if (a.attr("data-option") == "on") {
                    a.attr("data-option", "off");
                    a.parent("li").children("ul").slideUp(options.Speed)
                    a.parent('li').removeClass("show");
                }
            });
            if (options.autostart) {
                obj.find("a").each(function() {

                    $(this).parent("li").parent("ul").slideDown(options.Speed,
                        function() {
                            $(this).parent("li").children("a").attr("data-option", "on");
                        })
                })
            } else {
                obj.find("a.active").each(function() {

                    $(this).parent("li").parent("ul").slideDown(options.Speed,
                        function() {
                            $(this).parent("li").children("a").attr("data-option", "on");
                            $(this).parent('li').addClass("show");
                        })
                })
            }

        }
    })(window.jQuery || window.Zepto);
</script>
@yield('scripts')
</body>

</html>
