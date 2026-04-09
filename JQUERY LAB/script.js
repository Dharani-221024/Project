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
    $("#clickBtn").click(function(){
        alert("Button Clicked!");
    });

    $("#text").hover(function(){
        $(this).css("color","red");
    });

    $("#keyInput").keypress(function(){
        console.log("Key Pressed");
    });

    $("#form").submit(function(e){
        e.preventDefault();
        alert("Form Submitted");
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