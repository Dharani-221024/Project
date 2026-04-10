$(document).ready(function(){

    // SELECTORS
    $("#btn").click(function(){
        $("p").css("color","blue");
        $(".para").css("font-weight","bold");
        $("#heading").hide();
    });

    // ATTRIBUTES
    $("#changeAttr").click(function(){
        $("#img").attr("src","https://via.placeholder.com/200");
        $("#input").val("Changed!");
        $("#check").prop("checked", true);
    });

    // EVENTS
    // Mouse Events
    $("#clickBtn").click(function(){
        alert("Button Clicked!");
    });
    
    $("#dblClickBtn").dblclick(function(){
        alert("Button Double Clicked!");
    });

    $("#mouseBox").mouseenter(function(){
        $(this).css("opacity", "0.7");
        $("#mouseStatus").text("Mouse status: Entered");
    });
    
    $("#mouseBox").mouseleave(function(){
        $(this).css("opacity", "1");
        $("#mouseStatus").text("Mouse status: Left");
    });

    $("#mouseBox").mousedown(function(){
        $("#mouseStatus").text("Mouse status: Mouse Down");
    });

    $("#mouseBox").mouseup(function(){
        $("#mouseStatus").text("Mouse status: Mouse Up");
    });

    $("#mouseBox").mousemove(function(e){
        $("#mouseCoords").text("Mouse coordinates: X: " + e.pageX + ", Y: " + e.pageY);
    });

    $("#mouseBox").contextmenu(function(e){
        e.preventDefault();
        $("#rightClickStatus").text("Right click status: Context Menu Triggered!");
    });

    // Window Events
    $(window).resize(function(){
        $("h1").first().text("jQuery Lab - Window Resized: " + $(window).width() + "x" + $(window).height());
    });

    // Keyboard Events
    $("#keyInput").keypress(function(){
        $("#keyStatus").text("Key status: Key Press");
    });

    $("#specialKeyInput").keydown(function(){
        $("#keyStatus").text("Key status: Key Down");
        $(this).css("background-color", "yellow");
    });

    $("#specialKeyInput").keyup(function(){
        $("#keyStatus").text("Key status: Key Up");
        $(this).css("background-color", "white");
    });

    // Form Events
    $("#focusInput").focus(function(){
        $(this).css("outline", "2px solid green");
    });

    $("#focusInput").blur(function(){
        $(this).css("outline", "none");
        $(this).val("Lost focus");
    });

    $("#changeSelect").change(function(){
        var selectedVal = $(this).val();
        $("#changeStatus").text("Change status: Selected Option " + selectedVal);
    });

    $("#form").submit(function(e){
        e.preventDefault();
        alert("Form Submitted Successfully!");
    });

    // The on() Method
    $("#onMethodText").on({
        mouseenter: function(){
            $(this).css("background-color", "lightgray");
        },
        mouseleave: function(){
            $(this).css("background-color", "white");
        },
        click: function(){
            $(this).css("background-color", "yellow");
        }
    });

    // STYLE
    $("#styleBtn").click(function(){
        $("#styleText").addClass("highlight");
    });

    // TRAVERSING
    $("#traverseBtn").click(function(){
        $("#parent").children().css("color","green");
        $(".child").parent().css("border","2px solid black");
    });

    // EFFECTS
    $("#hide").click(function(){
        $("#box").hide();
    });

    $("#show").click(function(){
        $("#box").show();
    });

    $("#toggle").click(function(){
        $("#box").toggle();
    });

    $("#animate").click(function(){
        $("#box").animate({
            left: '500px',
            opacity: '0.5',
            height: '500px',
            width: '500px'
        });
    });

});