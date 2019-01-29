$(document).ready(function() {
    $(document).on("click", ".userchange", function(e){
        var userid = $(this).attr('id');
        setfield(userid,'voornaam');
        setfield(userid,'achternaam');
        setfield(userid,'email');
        setfield(userid,'geboortedatum');
        setfield(userid,'postcode');
        setfield(userid,'woonplaats');
        setfield(userid,'rolid');
        $(".wachtwoordarea ,.wachtwoordcheckarea").hide();
    });
    function setfield(userid,name){
        $("#"+name+"").val($("."+userid+name).text());

    }
});