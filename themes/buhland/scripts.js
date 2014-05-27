/**
 * Created with JetBrains PhpStorm.
 * User: Pasha
 * Date: 15.05.14
 * Time: 9:37
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
    $('.edit_link_account').on('click', function() {
        var link_id = $(this).attr('id');
        var account_id = link_id.substr(18);
        $('#account_row_' + account_id).hide();
        $('#account_edit_row_' + account_id).show();
        //console.log(account_id);
        return false;
    });


    $('.drop_down_select_head').selectBox();
    $('.drop_down_list').selectBox();
    $('.form_select').selectBox();


    $('#events-form-filter .input_filter_prognoz').on('change', function() {
        $('#events-form-filter').submit();
    });

    $('#reports-form-filter .input_filter_report').on('change', function() {
        $('#reports-form-filter').submit();
    });

    $('#Reports_status').on('change', function() {
        $('#reports-form-filter').submit();
    });

    $('#accounting-form-filter .input_filter_report').on('change', function() {
        $('#accounting-form-filter').submit();
    });

    $('#accounting-form-filter #Accounting_type').on('change', function() {
        $('#accounting-form-filter').submit();
    });





    $(".littleBlock .button").click(function(){
        $(".blackbg").fadeIn(500);
        $(".enterForm").fadeOut(500);
        $(".regForm").fadeOut(500);
        $(".recoverForm").fadeOut(500);
    });

    $(".blackbg .close").click(function(){
        $(".blackbg").fadeOut(500);
    });

//    $(".regBlock .enter").click(function(){
//        $(".recoverForm").fadeOut(500);
//        if (!$(this).attr("open"))            {
//            $(".enterForm").fadeIn(500);
//            $(this).attr("open","on");
//        } else {
//            $(".enterForm").fadeOut(500);
//            $(this).removeAttr("open");
//        }
//        //return false;
//    });

    $(".little .right").click(function(){
        $(".recoverForm").fadeIn(500);
        $(".enterForm").fadeOut(500);
    });

    $(".regBlock li:first").click(function(){
        if (!$(this).attr("open")) {
            $(".regForm").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".regForm").fadeOut(500);
            $(this).removeAttr("open");
        }
    });


    $(".tarifBlock .selector").click(function(){
        if (!$(this).attr("open")) {
            $(this).find(".checkme").css("display","block");
            $(this).attr("open","on");
        } else {
            $(this).find(".checkme").css("display","none");
            $(this).removeAttr("open");
        }
    });

    $(".tarifBlock .selector .checkme li").click(function(){
        var current = $(this).html();
        $(this).parents(".selector").find("input").val(current);
        $(this).find(".checkme").css("display","none");
        $(this).removeAttr("open");
    });

    $(".carousel").jCarouselLite({
        btnNext: ".right",
        btnPrev: ".left"
    });

    $(".carousel ul li a").lightbox();

    $(".tarifBlock .filds .button").click(function(){
        $(".tarifBg").fadeIn(500);
    });

    $(".tarifBg .close").click(function(){
        $(".tarifBg").fadeOut(500);
    });


    $(".buttonAim4").click(function(){
        if (!$(this).attr("open")) {
            $(".scanLoad").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".scanLoad").fadeOut(500);
            $(this).removeAttr("open");
        }
    });

    $(".tableBlock .load").click(function(){
        if (!$(this).attr("open")) {
            $(".loadForm").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".loadForm").fadeOut(500);
            $(this).removeAttr("open");
        }
    });

    $(".loadForm .little .right").click(function(){
        $(".loadForm .little .left:last").after('<span class="left"><img src="images/skrep.png"><span>Загрузить докумет</span><input type="file" class="hidden" name="file"></span>');
    });

    $(".loadForm .little .left span").live("click", function(){
        $(this).closest(".left").find("input").click();
    });


    $(".calendar input").datepicker();

    $(".calendar img").click(function(){
        $(this).closest(".calendar").find("input").focus();
    });

    /******************
     скрипты с верстки со страницы account2.html  start
     *****************/

    $(".buttonAim3").click(function(){
        if (!$(this).attr("open")) {
            $(".mission3").fadeIn(500);
            $(".scanLoad_event").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".mission3").fadeOut(500);
            $(".scanLoad_event").fadeOut(500);
            $(this).removeAttr("open");
        }
    });

    $(".controlPanel .open").click(function(){
        if (!$(this).attr("open")) {
            $(".controlPanel .checkme").css("display","block");
            $(this).attr("open","on");
        } else {
            $(".controlPanel .checkme").css("display","none");
            $(this).removeAttr("open");
        }
    });

    $(".calendar_input").datepicker();

    $(".mission3 .input img").click(function(){
        $(this).closest(".input").find(".calendar").focus();
    });

    $(".controlPanel .checkme li").click(function(){
        var choosen = $(this).html();
        $(this).closest(".controlPanel").find(".choosen").val(choosen);
        $(".controlPanel .checkme").css("display","none");
    });

    $(".date input").datepicker();

    $("div.input img").click(function(){
        $(this).closest(".input").find("input").focus();
    });

    /******************
     скрипты с верстки со страницы account2.html  end
     *****************/

    /******скрипты со страницы account1.html start**/
    $(".buttonAim2").click(function(){
        if (!$(this).attr("open")) {
            $(".mission2").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".mission2").fadeOut(500);
            $(this).removeAttr("open");
        }
    });

    $(".mission2 .checkbox").click(function(){
        if (!$(this).attr("open")) {
            $(".mission2 .checkbox").css("background-position","0px -11px");
            $(this).attr("open","on");
        } else {
            $(".mission2 .checkbox").css("background-position","0px 0px");
            $(this).removeAttr("open");
        }
    });

    $(".selector img").click(function(){
        if (!$(this).attr("open")) {
            $(".mission2 .checkme").css("display","block");
            $(this).attr("open","on");
        } else {
            $(".mission2 .checkme").css("display","none");
            $(this).removeAttr("open");
        }
    });

    $(".selector .checkme li").click(function(){
        var choosen_val = $(this).data('value');
        var choosen_text = $(this).html();
        $(this).closest(".selector").find("input#status_text").val(choosen_text);
        $(this).closest(".selector").find("input#Reports_status").val(choosen_val);
        $(".mission2 .checkme").css("display","none");
        $(".selector img").removeAttr("open");
    });

    $("div.input img").click(function(){
        $(this).closest(".input").find("input").focus();
    });

    $(".infoTable .checkbox").click(function() {
        if (!$(this).attr("open")) {
            $(this).css("background-position","0px -11px");
            $(this).attr("open","on");
        } else {
            $(this).css("background-position","0px 0px");
            $(this).removeAttr("open");
        }
    });

    $(".mission2 .little .right").click(function(){
        $('#uploadFile input[type="file"]').click();
    });

    $(".mission2 .little .left span").live("click", function(){
        $('#uploadFile input[type="file"]').click();
    });


    $(".mission .little .right").click(function(){
        $('#uploadFile input[type="file"]').click();
    });

    $(".mission .little .left span").live("click", function(){
        $('#uploadFile input[type="file"]').click();
    });

    $(".span_load_doc").on("click", function(){
        $(this).parent().parent().next().find('input[type="file"]').click();
    });


    /******скрипты со страницы account1.html end**/


    /******скрипты со страницы account.html start**/

    $(".buttonAim").click(function(){
        if (!$(this).attr("open")) {
            $(".mission").fadeIn(500);
            $(this).attr("open","on");
        } else {
            $(".mission").fadeOut(500);
            $(this).removeAttr("open");
        }
    });


    /******скрипты со страницы account.html end**/



});
$.datepicker.regional['ru'] = {
    closeText: 'Закрыть',
    prevText: '&#x3c;Пред',
    nextText: 'След&#x3e;',
    currentText: 'Сегодня',
    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
        'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
        'Июл','Авг','Сен','Окт','Ноя','Дек'],
    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    dateFormat: 'dd.mm.yy',
    firstDay: 1,
    isRTL: false
};
$.datepicker.setDefaults($.datepicker.regional['ru']);


$(".gender div .radio").click(function(){
    $(".gender div .radio").css("background-position","0px 0px");
    $(this).css("background-position","0px -11px");
});