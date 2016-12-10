$(document).ready(function () {

    initBinds();

    function initBinds() {
        if ($('.remove_basket').length > 0) {
            $('.remove_basket').bind('click', removeFromBasket);
        }

        // if ($('.renew_btn').length > 0) {
        //     $('.renew_btn').bind('click', renewLoans);
        // }

        if ($(".update_basket").length > 0) {
            $(".update_basket").bind('click', updateBasket);
        }
        if ($('.fld_qty').length > 0) {
            $('.fld_qty').bind('keypress', function (e) {
                var code = e.keyCode ? e.keyCode : e.which;
                if (code == 13) {
                    updateBasket();
                }
            });
        }
    }

    function removeFromBasket() {
        var item = $(this).attr('rel');
        $.ajax({
            type: 'POST',
            url: '/mod/basket_remove.php',
            dataType: 'html',
            data: ({id: item}),
            success: function () {
                refreshBigBasket();
                refreshSmallBasket();
            },
            error: function () {
                alert("An error has occurred");
            }
        });
    }

    function refreshSmallBasket() {

        $.ajax({
            url: '/mod/basket_small_refresh.php',
            dataType: 'json',
            success: function (data) {

                $.each(data, function (k, v) {
                    $("#basket_left ." + k + " span").text(v);
                });
            },
            error: function (data) {
                alert("An error has occurred");
            }
        });
    }


    if ($(".add_to_basket").length > 0) {
        $(".add_to_basket").click(function () {

            var trigger = $(this);
            var param = trigger.attr("rel");
            var item = param.split("_");
            $.ajax({
                type: 'POST',
                url: '/mod/basket.php',
                dataType: 'json',
                data: ({id: item[0], job: item[1]}),
                success: function (data) {
                    var new_id = item[0] + '_' + data.job;
                    if (data.job != item[1]) {
                        if (data.job == 0) {
                            trigger.attr("rel", new_id);
                            trigger.text("Remove from basket");
                            trigger.addClass("red");
                        } else {
                            trigger.attr("rel", new_id);
                            trigger.text("Add to basket");
                            trigger.removeClass("red");
                        }
                        refreshSmallBasket();
                    }
                },
                error: function (data) {
                    alert("An error has occurred");
                }
            });
            return false;
        });
    }


    function refreshBigBasket() {
        $.ajax({
            url: '/mod/basket_view.php',
            dataType: 'html',
            success: function (data) {
                $('#big_basket').html(data);
                initBinds();
            },
            error: function (data) {
                alert('An error has occurred');
            }
        });

    }


    function updateBasket() {
        $('#frm_basket :input').each(function () {
            var sid = $(this).attr('id').split('-');
            var val = $(this).val();

            $.ajax({
                type: 'POST',
                url: '/mod/basket_qty.php',
                data: ({id: sid[1], qty: val}),
                success: function () {
                    refreshSmallBasket();
                    refreshBigBasket();
                },
                error: function () {
                    alert('An error has occurred');
                }
            });
        });

    }

    if ($(".renew_btn").length > 0) {
        $(".renew_btn").click(function () {

            renewLoans();

        });
    }

    function renewLoans() {

        // alert('renew');

        // if ($(".case").length > 0) {
        //     $(".case input:checked").each(function () {
        //
        //         var values = $(this).val();
        //         var item = values.split('_');
        //
        //         alert('loan: ' + item[0] + ' item:' + item[1]);
        //
        //     });
        // } else {
        //     alert("Nothing selected");
        alert($(".case").length);
        // }
    }


    // add multiple select / deselect functionality
    $("#selectall").click(function () {
        $('.case').attr('checked', this.checked);
    });

    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function () {

        if ($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }

    });


});
